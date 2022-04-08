<?php

namespace Controllers;

class HomeController extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }
    function __destruct()
    {   
    }
    function payload()
    {
        //echo "cho1";
    }

    public function index()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        require PATH_ROOT ."/Models/mHome.php";
        $billCurrnetData = $home->getBillCurrentDate();
        $venenueCurrentStore = $home->getVenenueByIDStore($_SESSION['user']['IDStore'],date("Ymd"));
        $venenueCurentCategory = $home->getVenenueByCategory($_SESSION['user']['IDStore']);
        include("./Views/home/index.php");
        include("./Views/template/footer.php");
    }

    public function getVenenue()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        require PATH_ROOT ."/Models/mHome.php";
        $inputDate = $_POST['inputDate']??date("Ymd");
        $venenueCurrentStore = $home->getVenenueByIDStore($_SESSION['user']['IDStore'],$inputDate);
        echo json_encode($venenueCurrentStore);
    }
}
