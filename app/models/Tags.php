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

    public function deletTag($id){

        $deletTag = OrmMethodes::DeleteItem($this->table,$id);
        return $deletTag;
    } 

    public function findTagById($id){

        $findTagById=OrmMethodes::findById($this->table,$id);
        return $findTagById;
    }

    public function updateTag($tagName,$id){

        $columns = "tag_name = '$tagName'";
        $update = OrmMethodes::update($this->table,$columns,$id);
        return $update;
    }

    public function countTags(){

        $countTags=OrmMethodes::countItems($this->table);
        return $countTags;

    }






}