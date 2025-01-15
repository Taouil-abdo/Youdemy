<?php

namespace App\models;

use App\config\OrmMethodes;


class Tags{

    private string $tagName;
    private $table = "tags";
    private $column = "tag_name";


    public function showTags(){

        $showTags = OrmMethodes::getData($this->table);
        return $showTags;
    }

    public function addTags($values){

        $addTags=OrmMethodes::Add($this->table,$this->column,$values);
        if($addTags){
            header("refresh:0");
        }

    }

    








}