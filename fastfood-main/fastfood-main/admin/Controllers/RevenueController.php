<?php

namespace Controllers;

class RevenueController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $arrRoleAccess = [1];
        $currenRole = $_SESSION['user']['IDRole'];
        if(!in_array($currenRole,$arrRoleAccess)){
            include("./Views/error/accessDenied.php");
            parent::__destruct();
            exit();
        }
    }
    function __destruct()
    {   
        parent::__destruct();
    }
    function payload()
    {
        //echo "cho1";
    }

    public function index()
    {
        require PATH_ROOT ."/Models/mRevenue.php";
        $revenue = $revenue->getRevenue();
        include("./Views/revenue/index.php");
    }
}
