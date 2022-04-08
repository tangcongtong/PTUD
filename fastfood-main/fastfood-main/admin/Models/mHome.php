<?php
class Home extends DB_business {
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'none';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }

    public function getBillCurrentDate(){       
        return $this->get_list("SELECT COUNT(*) as 'Number',HOUR(`DateCreate`) as 'Hour' FROM `bills` WHERE DATE(`DateCreate`)=CURRENT_DATE() GROUP BY HOUR(`DateCreate`)")??[];
    }

    public function getVenenueByIDStore($IDStore,$date){
        $sql = "SELECT SUM((`detailbill`.`Number`*`products`.`Price`)*((100-`voucher`.`Percent`)/100)) as 'Sum',HOUR(`bills`.`DateCreate`) as 'Hour' FROM `bills`,`detailbill`,`products`,`stores`,`voucher` WHERE `bills`.`Status` = 6 AND `detailbill`.`IDBill` = `bills`.`ID` AND `products`.`ID` = `detailbill`.`IDProduct` AND `stores`.`ID` = `bills`.`IDStore` AND `voucher`.`ID`=`bills`.`Voucher` AND DATE(`bills`.`DateCreate`) = '{$date}'  AND `bills`.`IDStore` = {$IDStore} GROUP BY HOUR(`bills`.`DateCreate`)";
        return $this->get_list($sql)??[];
    }

    public function getVenenueByCategory($IDStore){
        $sql = "SELECT SUM((`detailbill`.`Number`*`products`.`Price`)*((100-`voucher`.`Percent`)/100)) as 'Sum',`products`.`Name` FROM `bills`,`detailbill`,`products`,`stores`,`voucher` WHERE `bills`.`Status` = 6 AND `detailbill`.`IDBill` = `bills`.`ID` AND `products`.`ID` = `detailbill`.`IDProduct` AND `stores`.`ID` = `bills`.`IDStore` AND `voucher`.`ID` = `bills`.`Voucher` AND DATE(`bills`.`DateCreate`) = CURRENT_DATE()  AND `bills`.`IDStore` = {$IDStore} GROUP BY `products`.`Name`";
        return $this->get_list($sql)??[];
    }
}
$home = new Home();