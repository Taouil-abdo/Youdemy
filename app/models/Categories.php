<?php

namespace App\models;

use App\config\OrmMethodes;


class Categories{


    private $table = "categories";
    private $column = "categorie_name";
    private $CategoryName;


    public function showCategory(){

        $category = OrmMethodes::getData($this->table);
        return $category;
    }

    public function addCategory($values){

        $category=OrmMethodes::Add($this->table,$this->column,$values);
        if($category){
            header("refresh:0");
        }    
    }

    








}