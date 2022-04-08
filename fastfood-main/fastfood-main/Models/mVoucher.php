<?php
class Vourcher extends DB_business {
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'voucher';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }

    public function getAll(){
        return $this->get_list("SELECT * FROM `voucher`");
    }

    public function getVoucherByCode($code){
        return $this->get_list("SELECT * FROM `voucher` WHERE `Code` = {$code} AND `isUse` = 0")[0]??[];
    }

}
$voucher = new Vourcher();