<?php

namespace App\models;

use App\config\Database;
use App\config\OrmMethodes;

use PDO;

class Courses {


    private string $title;
    private string $slug;
    private string $contentType;
    private ?string $videoContent = null;
    private ?string $documentContent = null;
    private static $table = 'courses';




    public function create_by_document($data) {
        $conn = Database::getInstanse()->getConnection();

        try {
            
            $stmt = $conn->prepare("
                INSERT INTO courses 
                (title, slug, description, featured_image,content, contentTypeVideo, contentTypeDocument, Totalhours , scheduled_date, level ,price, category_id, teacher_id)
                VALUES (:title,:slug, :description, :featured_image , :content, :contentTypeVideo , :contentTypeDocument ,:Totalhours,:scheduled_date,:level,:price,:category_id, :teacher_id)
            ");
            $stmt->execute([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'description' => $data['description'],
                'featured_image' => $data['featured_image'],
                'content' => 'document',
                'contentTypeDocument' => $data['contentTypeDocument'],
                'contentTypeVideo' => $data['contentTypeVideo'],
                'Totalhours' => $data['Totalhours'],
                'scheduled_date' => $data['scheduled_date'],
                'level' => $data['level'],
                'price' => $data['price'],
                'category_id' => $data['category_id'],
                'teacher_id' => $data['teacher_id'],
            ]);
    
            $courseId = $conn->lastInsertId();
    
            if (!empty($data['tags'])) {
                $this->addTags($courseId, $data['tags']);
            }
    
            return $courseId;
        } catch (PDOException $e) {
            echo "Error creating course (document): " . $e->getMessage();
            return false;
        }
    }
    
    public function create_by_video($data, $type) {
        $conn = Database::getInstanse()->getConnection();

        try {
            $stmt = $conn->prepare("
            INSERT INTO courses 
            (title, slug, description, featured_image,content, contentTypeVideo, contentTypeDocument, Totalhours , scheduled_date, level ,price, category_id, teacher_id)
            VALUES (:title,:slug, :description, :featured_image , :content, :contentTypeVideo , :contentTypeDocument ,:Totalhours,:scheduled_date,:level,:price,:category_id, :teacher_id)
        ");
         $result =  $stmt->execute([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'featured_image' => $data['featured_image'],
            'content' => $type,
            'contentTypeDocument' => $data['contentTypeDocument'],
            'contentTypeVideo' => $data['contentTypeVideo'],
            'Totalhours' => $data['Totalhours'],
            'scheduled_date' => $data['scheduled_date'],
            'level' => $data['level'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'teacher_id' => $data['teacher_id'],
        ]);
        var_dump($result);
            $courseId = $conn->lastInsertId();
            var_dump($courseId);

            if (!empty($data['tags'])) {
                $this->addTags($courseId, $data['tags']);
            }
    
            return $courseId;
        } catch (PDOException $e) {
            echo "Error creating course (video): " . $e->getMessage();
            return false;
        }
    }
    
    public function __call($name, $args) {
        if ($name === "create") {
            if (count($args) === 1) {
                return $this->create_by_document($args[0]);
            } elseif (count($args) === 2) {
                return $this->create_by_video($args[0], $args[1]);
            } else {
                throw new Exception("Invalid number of arguments for create method.");
            }
        } elseif ($name === "readAll") {
            if (count($args) === 0) {
                return $this->readAll_by_document();
            } elseif (count($args) === 1) {
                return $this->readAll_by_video($args[0]);
            } else {
                throw new Exception("Invalid number of arguments for readAll method.");
            }
        }elseif($name === "update"){
            
        }
    }
    
    public function readAll_by_document() {
        $conn = Database::getInstanse()->getConnection();

        try {
            $stmt = $conn->query("
            SELECT c.*,
                ca.categorie_name AS categorie_name,
                u.username AS teacher,
                GROUP_CONCAT(t.tag_name) AS tags,
                DATE(c.scheduled_date) AS scheduled_date_only
            FROM courses c
            LEFT JOIN categories ca ON c.category_id = ca.id
            LEFT JOIN users u ON c.teacher_id = u.id
            LEFT JOIN course_tags ct ON c.id = ct.course_id
            LEFT JOIN tags t ON ct.tag_id = t.id
            WHERE (c.contentTypeDocument IS NOT NULL AND c.contentTypeDocument != '')
              AND (c.contentTypeVideo IS NULL OR c.contentTypeVideo = '')
            GROUP BY c.id
            ORDER BY c.created_at DESC
        ");
    
             $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //  var_dump($result);
        return $result;
        } catch (PDOException $e) {
            error_log("Error fetching document-based courses: " . $e->getMessage());
            return [];
        }
    }
    
    public function readAll_by_video($type) {
        $conn = Database::getInstanse()->getConnection();

        try {
            $stmt = $conn->query("
             SELECT c.*,
                ca.categorie_name AS category_name,
                u.username AS enseignant_name,
                GROUP_CONCAT(t.tag_name) AS tags,
                DATE(c.scheduled_date) AS scheduled_date_only
             FROM courses c
             LEFT JOIN categories ca ON c.category_id = ca.id
             LEFT JOIN users u ON c.teacher_id = u.id
             LEFT JOIN course_tags ct ON c.id = ct.course_id
             LEFT JOIN tags t ON ct.tag_id = t.id
             WHERE (c.contentTypeVideo IS NOT NULL AND c.contentTypeVideo != '')
              AND (c.contentTypeDocument IS NULL OR c.contentTypeDocument = '')
             GROUP BY c.id
             ORDER BY c.created_at DESC
        ");
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching video-based courses: " . $e->getMessage());
            return [];
        }
    }

    public function read($id) {
        $conn = Database::getInstanse()->getConnection();

        try {
            $stmt = $conn->query("
                SELECT c.*, ca.categorie_name, u.username, GROUP_CONCAT(t.tag_name) AS tags 
            FROM courses c JOIN categories ca ON c.category_id = ca.id JOIN users u ON c.teacher_id = u.id 
            LEFT JOIN course_tags ct ON c.id = ct.course_id LEFT JOIN 
            tags t ON ct.tag_id = t.id WHERE c.id = $id GROUP BY c.id ORDER BY
             c.created_at DESC
            ");
            
            $stmt->execute();
            $course = $stmt->fetch(PDO::FETCH_ASSOC);
            return $course ?: null;
        } catch (PDOException $e) {
            error_log("Error fetching document-based courses: " . $e->getMessage());
            return [];
        }
    }

    private function addTags($courseId, $tags) {
        $conn = Database::getInstanse()->getConnection();

        try {
            foreach ($tags as $tagId) {
                $stmt = $conn->prepare("INSERT INTO course_tags (course_id, tag_id) VALUES (:course_id, :tag_id)");
                $stmt->execute(['course_id' => $courseId, 'tag_id' => $tagId]);
            }
        } catch (PDOException $e) {
            error_log("Error adding tags: " . $e->getMessage());
        }
    }

    public function lastThreeCourses(){
        $conn = Database::getInstanse()->getConnection();

          try {
            $query = "SELECT c.*, ca.categorie_name, u.username, GROUP_CONCAT(t.tag_name) AS tags 
            FROM courses c JOIN categories ca ON c.category_id = ca.id JOIN users u ON c.teacher_id = u.id 
            LEFT JOIN course_tags ct ON c.id = ct.course_id LEFT JOIN 
            tags t ON ct.tag_id = t.id where c.status = 'accepted' GROUP BY c.id ORDER BY
             c.created_at DESC Limit 3";
                
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll();
                // var_dump($result);

                return $result;

          }catch(PDOException $e){
            error_log("Error adding tags: " . $e->getMessage());
          }


    }

    public function getTotalCourses() {
        $conn = Database::getInstanse()->getConnection();
        $stmt = $conn->query("SELECT COUNT(*) as total FROM courses WHERE status = 'accepted'");
        return $stmt->fetchColumn();
    }
    
    public function getAllCours($limit, $offset) {
        $conn = Database::getInstanse()->getConnection();
    
        try {
            $query = "
                SELECT c.*, ca.categorie_name, u.username, GROUP_CONCAT(t.tag_name) AS tags 
                FROM courses c JOIN categories ca ON c.category_id = ca.id 
                JOIN users u ON c.teacher_id = u.id LEFT JOIN course_tags ct ON c.id = ct.course_id 
                LEFT JOIN tags t ON ct.tag_id = t.id WHERE c.status = 'accepted' 
                GROUP BY c.id ORDER BY c.created_at DESC LIMIT :limit OFFSET :offset
            ";

            $stmt = $conn->prepare($query);
            $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching courses: " . $e->getMessage());
            return [];
        }
    }

    public function getAll() {
        $conn = Database::getInstanse()->getConnection();
    
        try {
            $query = "
                SELECT c.*, ca.categorie_name, u.username as teacher, GROUP_CONCAT(t.tag_name) AS tags 
            FROM courses c JOIN categories ca ON c.category_id = ca.id JOIN users u ON c.teacher_id = u.id 
            LEFT JOIN course_tags ct ON c.id = ct.course_id LEFT JOIN 
            tags t ON ct.tag_id = t.id GROUP BY c.id ORDER BY
             c.created_at DESC 
            ";

            $stmt = $conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching courses: " . $e->getMessage());
            return [];
        }
    }

    public function searchForCourses($q) {
        $conn = Database::getInstanse()->getConnection();
    
        try {
            $query = "
                SELECT c.*, ca.categorie_name, u.username, GROUP_CONCAT(t.tag_name) AS tags 
                FROM courses c JOIN categories ca ON c.category_id = ca.id JOIN users u ON c.teacher_id = u.id 
                LEFT JOIN course_tags ct ON c.id = ct.course_id LEFT JOIN tags t ON ct.tag_id = t.id 
                WHERE c.status = 'accepted' AND c.title LIKE :q GROUP BY c.id ORDER BY c.created_at DESC;
            ";
            $q = "%$q%";
    
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':q', $q, PDO::PARAM_STR); 
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching courses: " . $e->getMessage());
            return [];
        }
    }
    
    public function updateCourseStatus($status,$id){

        $columns = "status='$status'";
        $result = OrmMethodes::update(self::$table,$columns,$id);
        return $result; 
    
    }

    public function getAllByTeacher($id) {
        $conn = Database::getInstanse()->getConnection();
    
        try {
            $query = "
                SELECT c.*, ca.categorie_name, GROUP_CONCAT(t.tag_name) AS tags 
            FROM courses c JOIN categories ca ON c.category_id = ca.id JOIN users u ON c.teacher_id = u.id 
            LEFT JOIN course_tags ct ON c.id = ct.course_id LEFT JOIN 
            tags t ON ct.tag_id = t.id WHERE u.id = :id GROUP BY c.id ORDER BY
             c.created_at DESC 
            ";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id',$id , PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching courses: " . $e->getMessage());
            return [];
        }
    }

    public function delete($id){

             $delteCours = new Courses();
            $delteCours = OrmMethodes::DeleteItem(self::$table,$id);
            return $delteCours;

    }

    public function updateCours($data, $id)
    {
        $conn = Database::getInstanse()->getConnection();

            $query = "UPDATE courses SET title = :title, slug = :slug, description = :description,
                featured_image = :featured_image, content = :content, contentTypeVideo = :contentTypeVideo,
                contentTypeDocument = :contentTypeDocument,
                Totalhours = :Totalhours, scheduled_date = :scheduled_date, level = :level,
                price = :price, category_id = :category_id, teacher_id = :teacher_id WHERE id = :id";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':slug', $data['slug']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':featured_image', $data['featured_image']);
            $stmt->bindParam(':content', $data['content']);
            $stmt->bindParam(':contentTypeVideo', $data['contentTypeVideo']);
            $stmt->bindParam(':contentTypeDocument', $data['contentTypeDocument']);
            $stmt->bindParam(':Totalhours', $data['Totalhours']);
            $stmt->bindParam(':scheduled_date', $data['scheduled_date']);
            $stmt->bindParam(':level', $data['level']);
            $stmt->bindParam(':price', $data['price']);
            $stmt->bindParam(':category_id', $data['category_id']);
            $stmt->bindParam(':teacher_id', $data['teacher_id']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();

            return $result;

            if (isset($data['tags']) && is_array($data['tags'])) {
                $this->detachAllTags($id);

                foreach ($data['tags'] as $tagId) {
                    $this->attachTag($id, $tagId);
                }
            }

    }

    private function detachAllTags($courseId)
    {
        $conn = Database::getInstanse()->getConnection();

        $query = "DELETE FROM course_tag WHERE course_id = :course_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':course_id', $courseId, PDO::PARAM_INT);
        $r = $stmt->execute();
        // var_dump($r);
        return $r;
    }

    private function attachTag($courseId, $tagId)
    {
        $conn = Database::getInstanse()->getConnection();

        $query = "INSERT INTO course_tag (course_id, tag_id) VALUES (:course_id, :tag_id)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':course_id', $courseId, PDO::PARAM_INT);
        $stmt->bindParam(':tag_id', $tagId, PDO::PARAM_INT);
        $ss = $stmt->execute();
        // var_dump($ss);
        return $ss;
    }

    public function CountCourse(){

        $result = OrmMethodes::countItems(self::$table);
        return $result;

    }



}