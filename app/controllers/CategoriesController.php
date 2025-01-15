<?php
namespace App\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';

use App\models\Categories;


class CategoriesController extends Categories {


    public function show(){
    
        $Categories = $this->showCategory();
        return $Categories;
    
    }
    
    public function create(){
    
        if(isset($_POST['category_name'])){
            $this->CategoryName = $_POST['category_name'];
            $create=$this->addCategory($this->CategoryName);
            return $create;
            var_dump($create);
        }
    
    }
    
    
    
    
    
    }


