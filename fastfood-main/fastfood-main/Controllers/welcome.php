<?php
namespace Controllers;
class welcome{
    public function index(){
        include("./Views/index.php");
    }

    public function test($id,$id2){
        echo "test".$id."".$id2;
    }
}