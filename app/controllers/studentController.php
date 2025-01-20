<?php


namespace App\controllers;


use App\models\Users;
require_once __DIR__.'/../config/init.php';



class StudentController extends Users{





    public function checkRole() {
        session_start();
        if (!isset($_SESSION["role"]) === 'Admin') {
            header("Location: ../Dashboard/Error404.php");
            exit;
        }
    }
}