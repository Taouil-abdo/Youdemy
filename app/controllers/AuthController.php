<?php
namespace App\controllers;
use App\models\Users;
require_once __DIR__.'/../config/init.php';


class AuthController extends Users{



    public function SingUp(){

        if (isset($_POST['signUp']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $userName = $_POST['username'];
            $bio = $_POST['bio'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            
            $result = $this->register($userName, $email, $password, $bio ,$role);
            return $result;
            if ($result) {
                header("Location: ../views/Auth/Login.php");
            } else {
            echo "Error registering user.";
            }
        }
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitLogin"])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->loginUser($email, $password);
            if(!$result){
                echo "the user not found";
            }
        }

    }

    public function logoutview()
    {
          if(isset($_POST['logout'])){
              session_start();
              session_destroy();
              header("Location: ../../index.php");
              exit;
          }
          
    }

    public function checkRole() {}


}