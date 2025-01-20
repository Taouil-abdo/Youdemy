<?php

namespace App\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use App\models\Tags;
require_once __DIR__.'/../config/init.php';


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

public function destroy(){
    if(isset($_GET['id'])){
          $id = $_GET['id'];
          $destroy=$this->deletTag($id);
          return $destroy;
          var_dump($destroy);
    }
  }
  
  public function edite(){
  
      if(isset($_GET['id'])){
          $id = $_GET['id'];
          $edite=$this->findTagById($id);
          return $edite;
      }
  }
  
  
  public function update(){
  
      if(isset($_POST['updateTag'])){
          $id = $_GET['id'];
          $this->tagName = $_POST['tag_name'];
          $update = $this->updateTag($this->tagName,$id);
          return $update;
          if($update){
              header("tags.php");
          }
      }
  }


public function TotalTags(){
        $tags = $this->countTags();
        return $tags;
}
}




