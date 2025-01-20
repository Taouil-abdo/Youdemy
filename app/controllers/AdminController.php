<?php

namespace App\controllers;

use App\models\Users;
require_once __DIR__.'/../config/init.php';


class AdminController extends Users{




public function show(){
    $UsersModel = $this->showUsers();
    return $UsersModel;
}

public function CountUsers(){
    $Users = $this->countUsesItems();
    return $Users;
}

public function accepteTeacher() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateUser'])) {

        $id = $_POST['UserId'] ;
        $status = $_POST['status'] ;
        // var_dump($id);
        // var_dump($status);

        // if ($id && $status) {
            $result = $this->updateTeacherStatus($status, $id);
            return $result;
            var_dump($result);
            // header("refresh:0");
        // } else {
        //     echo "Error: Missing UserId or status data.";
        // }
    }
}


public function getAdminById(){
    session_start();
    $id= $_SESSION['id'];
    $result = $this->getUserById($id);
    return $result;

}


public function deleteUser(){

    if (isset($_POST['deleteUser']) ) {
        $UserId = $_POST["UserId"];
        $result=$this->delete($UserId);
        return $result;
        if($result){
        header("refresh:1");
        }else{
            echo "Sorry Somthing Wrong";
        }

    }


    
}



public function checkRole() {
    session_start();
    if (!isset($_SESSION["role"]) === 'Admin') {
        header("Location: ../Dashboard/Error404.php");
        exit;
    }
}
















}