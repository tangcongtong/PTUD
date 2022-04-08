<?php

namespace Controllers;

class ApiController
{
    public function getVenenue()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        require PATH_ROOT ."/Models/mHome.php";
        $inputDate = $_POST['inputDate']??date("Ymd");
        $venenueCurrentStore = $home->getVenenueByIDStore($_SESSION['user']['IDStore'],$inputDate);
        echo json_encode($venenueCurrentStore);
    }
}
