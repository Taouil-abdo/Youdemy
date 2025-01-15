<?php

namespace App\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use App\models\Tags;

class TagsController extends Tags {


public function show(){

    $tags = $this->showTags();
    return $tags;

}

public function create(){

    if(isset($_POST['tag_name'])){
        $this->tagName = $_POST['tag_name'];
        $create=$this->addTags($this->tagName);
        return $create;
        var_dump($create);
    }

}





}




