<?php

namespace App\models;

use App\config\OrmMethodes;
use App\config\Database;
use PDO;



class Enroll{

    private $table = "enrollments";

    
    public function addEnroll($idcours,$userId){
     
     $conn = Database::getInstanse()->getConnection();
     $query ="INSERT INTO enrollments (user_id,course_id) values(:users_id,:course_id)";
     $stmt = $conn->prepare($query);
     $stmt->bindParam(':users_id', $userId ,PDO::PARAM_INT);
     $stmt->bindParam(':course_id', $idcours,PDO::PARAM_INT);
     $result = $stmt->execute();
     var_dump($result);
     return $result;
    }


    public function getAllEnroll(){

       



    }

}

