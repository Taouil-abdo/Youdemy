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
    
    public function destroy(){
        if(isset($_GET['id'])){
              $id = $_GET['id'];
              $destroy=$this->deleteCategory($id);
              return $destroy;
              var_dump($destroy);
        }
      }
      
      public function edite(){
      
          if(isset($_GET['id'])){
              $id = $_GET['id'];
              $edite=$this->findCategoryById($id);
              return $edite;
          }
      }
      
      
      public function update(){
      
          if(isset($_POST['UpadateCategory'])){
              $id = $_GET['id'];
              $this->categoryName = $_POST['category_name'];
              $update = $this->updateCategory($this->categoryName,$id);
              return $update;
              if($update){
                  header("Location: ../views/Admin/dashboard/category.php");
              }
          }
      }
    
    
    
    }


