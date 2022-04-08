<?php
class Order extends DB_business {
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'bills';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }

    public function getAll(){
        return $this->get_list("SELECT `bills`.*,`orderstatus`.`Name`, as 'Status',`orderstatus`.`ID` as 'orID' FROM `bills`,`orderstatus` WHERE `bills`.`Status` = `orderstatus`.`ID` AND `orderstatus`.`ID` NOT IN (6,7) ")??[];
    }

    public function getBillByIDStore($IDStore){
        return $this->get_list("SELECT `bills`.*,`orderstatus`.`Name` as 'Status', `orderstatus`.`ID` as 'orID' FROM `bills`,`orderstatus` WHERE `bills`.`Status` = `orderstatus`.`ID` AND `bills`.`IDStore` = {$IDStore} AND `orderstatus`.`ID` NOT IN (6,7)")??[];
    }

    public function getBillByID($ID){
        return $this->get_list("SELECT `bills`.*,`orderstatus`.`ID` as 'Status' FROM `bills`,`orderstatus` WHERE `bills`.`Status` = `orderstatus`.`ID` AND `orderstatus`.`ID` AND `bills`.`ID` = {$ID}")[0]??[];
    }

    public function getDetailBill($id){
        return $this->get_list("SELECT `detailbill`.`Number`,`products`.`Name`,`products`.`Price`,`voucher`.`Percent` FROM `detailbill`,`bills`,`products`,`voucher` WHERE `detailbill`.`IDBill` = `bills`.`ID` AND `detailbill`.`IDProduct` = `products`.`ID` AND `voucher`.`ID` = `bills`.`Voucher` AND `detailbill`.`IDBill` = {$id}")??[];
    }

    public function getAllStatus()
    {
        return $this->get_list("SELECT * FROM `orderstatus`")??[];
    }

    public function UpdateStatusBill($IDBill,$IDStatus)
    {
        return $this->update_by_id(array(
            'Status' => $IDStatus,
        ), $IDBill);
    }
}
$order = new Order();