<?php

namespace App\controllers;

use App\models\Enroll;
require_once __DIR__.'/../config/init.php';


class EnrollController extends Enroll{



public function addEnrollement(){

    if(isset($_POST['Enrollemnt'])){

        $idcours = $_POST['CoursId'];
        $userId = $_SESSION['id'];

        $r = $this->addEnroll($idcours,$userId);
        return $r;


    }

}

public function getEnroll(){

    
}



}