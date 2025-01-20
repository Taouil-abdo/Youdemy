<?php

namespace App\models;

use App\config\OrmMethodes;

abstract class Users{

    protected string $username;
    protected string $email;
    protected string $password;
    protected string $bio;
    protected string $profile_picture;
    protected string $role;
    protected string $status; 
    protected static $table = "users";

    public function __construct(){
    
    }

    public function loginUser($email, $password){
        session_start();
    
        $row = OrmMethodes::findByEmail($email);
        if($row){
    
            $_SESSION["role"] = $row['role'];
            $_SESSION["id"] = $row['id'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["email"] = $row['email'];
            
            if(password_verify($password,$row['password'])){
    
                    if($_SESSION['role'] == 'Admin'){
                        header("Location: ../../views/Admin/dashboard/dashboard.php");
                        exit;
                    }elseif($_SESSION['role'] == 'Student'){
                        header("Location: ../../../index.php");
                        exit;
                    }elseif($_SESSION['role'] == 'Teacher'){
                        header("Location: ../../views/Teacher/profile/profile.php");
                        exit;        
                    }else{
                        header("Location: signUp.php");
                        exit;
                    }
            }else{
                die("Incorrect password.");
            }
        }else{
            die("Incorrect email or password.");
        }
    }

    public function register($userName, $email, $password, $bio ,$role)
     {
     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

     $columns = "username, email, password, bio ,role";
     $values = [$userName, $email, $hashedPassword, $bio ,$role];

     $result= OrmMethodes::AddUser(self::$table, $columns, $values);
     return $result; 
     var_dump($result);
     
   }

    

   public function showUsers(){
    $con="where role = 'Teacher'";
    $query = OrmMethodes::getData(self::$table,$con);
    return $query;
}

public function countUsesItems(){

    $query = OrmMethodes::countItems(self::$table);
    return $query;
    var_dump($query);
}


public function updateTeacherStatus($status,$id){

    $columns = "status='$status'";
    $result = OrmMethodes::update(self::$table,$columns,$id);
    // var_dump($result);
    return $result; 

}


public function delete($id){

    $result = OrmMethodes::DeleteItem(self::$table,$id);
    return $result;

}

public function getUserById($id){

    $result = OrmMethodes::findById(self::$table,$id);
    return $result;
    
}

abstract public function checkRole();



}