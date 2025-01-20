<?php 

namespace App\controllers;

use App\models\Users;
require_once __DIR__.'/../config/init.php';


class TeacherController extends Users{



    public function getTeacherById(){
        // session_start();
        $id= $_SESSION['id'];
         $result = $this->getUserById($id);
         return $result;
    }

    

    // public static function updateUserProfile(){
        
    //     if(isset($_POST['updateProfile'])){

               
    //            $userName = $_POST['username'];
    //            $email = $_POST['email'];
    //            $bio = $_POST['bio'];
    //            $password = $_POST['password'];
    //            $id = $_SESSION['id'];

    //            $profileImage = $_FILES['profileImage']['name'];
    //            $temp_file = $_FILES['profileImage']['tmp_name'];
    //            $folder = __DIR__ . "/../asset/uploads/users/$profileImage";

    //            $result = Users::updateProfile($userName, $email, $password, $profileImage ,$bio ,$id);
    //            var_dump($result);

    //            return $result;
    //            if($result){
    //             header("Location : ../view/pages/Profile/profile.php");
    //            }
    //     }
    // }


    public function checkRole() {
        // session_start();
        if (!isset($_SESSION["role"]) === 'Teacher') {
            header("Location: ../Dashboard/Error404.php");
            exit;
        }
    }
    
}