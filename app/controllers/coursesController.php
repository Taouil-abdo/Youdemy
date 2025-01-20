<?php

namespace App\controllers;

use App\models\courses;
require_once __DIR__.'/../config/init.php';


class CoursesController {

    public function showCourses() {
        $coursesModel = new Courses();
        $courses = $coursesModel->readAll();
        return $courses;
    }

    public function addCourse() {
        $coursesModel = new Courses();

        if (isset($_POST['AddCourse']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => htmlspecialchars(strip_tags($_POST['title'])),
                'slug' => htmlspecialchars(strip_tags($_POST['slug'])),
                'description' => htmlspecialchars(strip_tags($_POST['description'])),
                'featured_image' => $_FILES['featured_image']['name'],
                'content' => htmlspecialchars(strip_tags($_POST['content_type'])),
                'contentTypeVideo' => htmlspecialchars(strip_tags($_POST['contentTypeVideo'])) ?? null,
                'contentTypeDocument' => htmlspecialchars(strip_tags($_POST['contentTypeDocument'])) ?? null,
                'Totalhours' => $_POST['Totalhours'],
                'scheduled_date' => $_POST['scheduled_date'],
                'level' => htmlspecialchars(strip_tags($_POST['level'])),
                'price' => $_POST['price'],
                'category_id' => $_POST['category_id'],
                'teacher_id' => $_SESSION['id'],
                'tags' => $_POST['tag_id'] ?? [],
            ];



            if($data['content'] === 'video'){
                $type = "video"; 
                $result = $coursesModel->create($data, $type);
                var_dump($result);

            }elseif($data['content'] === 'document'){
                $result = $coursesModel->create($data);
            }else {
                    throw new Exception("Content type not specified. Please provide a valid document or video.");
                }
        }
    }

    public function index(){
        $coursesModel = new Courses();
        $result = $coursesModel->lastThreeCourses();
        return $result;
        var_dump($result);

    }

public function CoursDetails(){

    $coursesModel = new Courses();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $coursesModel->read($id);
        return $result;
        var_dump($result);
    }
}


public function coursByAcceptedStatus($page, $perPage) {
    $coursesModel = new Courses();
    $totalCourses = $coursesModel->getTotalCourses(); 
    $totalPages = ceil($totalCourses / $perPage);

    $offset = ($page - 1) * $perPage;
    $courses = $coursesModel->getAllCours($perPage, $offset);

    return [
        'courses' => $courses,
        'totalPages' => $totalPages,
        'currentPage' => $page,
    ];
}


public function searchBytitle(){

    if(isset($_GET['search'])){
        $q = $_GET['search'];

        $coursesModel = new Courses();
        $totalCourses = $coursesModel->searchForCourses($q); 
        return $totalCourses; 

    }
    
}

public function accepteCourseByAdmin(){

if(isset($_POST['updateStatus'])){

    $coursId = $_POST['Cours_id'];
    $status = $_POST['status'];
    var_dump($coursId);
    var_dump($status);
    $coursesModel = new Courses();

    $ss = $coursesModel->updateCourseStatus($status,$coursId);
    return $ss;


}


}

public function ShowAllCourses(){

    $coursesModel = new Courses();
        $result = $coursesModel->getAll();
        return $result;
        var_dump($result);

}

public function showCourseByTeacher(){

    $coursesModel = new Courses();
    if(isset($_SESSION['id']))
    {
        $id= $_SESSION['id'];
        $result = $coursesModel->getAllByTeacher($id);
        return $result;
    }
    
}

public function updateCourse(){
    $coursesModel = new Courses();

    if (isset($_POST['updateCourse']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $coursId = $_GET['id'];
        $data = [
            'title' => htmlspecialchars(strip_tags($_POST['title'])),
            'slug' => htmlspecialchars(strip_tags($_POST['slug'])),
            'description' => htmlspecialchars(strip_tags($_POST['description'])),
            'featured_image' => $_FILES['featured_image']['name'],
            'content' => htmlspecialchars(strip_tags($_POST['content_type'])),
            'contentTypeVideo' => htmlspecialchars(strip_tags($_POST['contentTypeVideo'])) ?? null,
            'contentTypeDocument' => htmlspecialchars(strip_tags($_POST['contentTypeDocument'])) ?? null,
            'Totalhours' => $_POST['Totalhours'],
            'scheduled_date' => $_POST['scheduled_date'],
            'level' => htmlspecialchars(strip_tags($_POST['level'])),
            'price' => $_POST['price'],
            'category_id' => $_POST['category_id'],
            'teacher_id' => $_SESSION['id'],
            'tags' => $_POST['tag_id'] ?? [],
        ];
            $result = $coursesModel->updateCours($data,$coursId);
            var_dump($result);

            return $result;
        
    }
}



public function deleteCourse(){

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $deleteCours = new Courses();
        $dltCours = $deleteCours->delete($id);
        return $dltCours;
    }

}



public function CountCourse(){

        $CountCourse = new Courses();
        $CountCrs = $CountCourse->CountCourse();
        return $CountCrs;

}


}
