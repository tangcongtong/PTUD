<?php
class Revenue extends DB_business {
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'users';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }

    public function getRevenue(){
        return $this->get_list("SELECT SUM((`detailbill`.`Number`*`products`.`Price`)*((100-`voucher`.`Percent`)/100)) as 'Sum',`stores`.`StoreName`,`stores`.`Address` FROM `bills`,`detailbill`,`products`,`stores`,`voucher` WHERE `bills`.`Status` = 6 AND `detailbill`.`IDBill` = `bills`.`ID` AND `products`.`ID` = `detailbill`.`IDProduct` AND `stores`.`ID` = `bills`.`IDStore` AND `voucher`.`ID` = `bills`.`Voucher` GROUP BY `stores`.`StoreName`")??[];
    }
}
$revenue = new Revenue();