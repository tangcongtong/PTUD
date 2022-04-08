<?php
namespace Controllers;

class BaseController{
    protected function __construct() {
        if(!isset($_SESSION['user'])){
          header("Location: ./login");
        }
        $this->payload();
        include("./Views/template/header.php");
      }

    protected function __destruct() {
      include("./Views/template/footer.php");
    }

    protected function payload(){
    }

}