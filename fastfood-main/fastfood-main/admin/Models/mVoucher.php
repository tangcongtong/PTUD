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
        return $this->get_list("SELECT * FROM `voucher` WHERE `ID` != 0");
    }

    public function getVoucherByCode($code){
        return $this->get_list("SELECT * FROM `voucher` WHERE `Code` = {$code}")[0]??[];
    }

    public function insertVoucher($code,$percent){
        return $this->add_new(array(
            'Code' => $code,
            'Percent' => $percent,
        ));
    }

    public function getVoucherByID($ID){
        return $this->get_list("SELECT * FROM `voucher` WHERE `ID` = {$ID}")[0]??[];
    }

    public function editVoucher($id,$code,$percent){
        return $this->update_by_id(array(
            'Code' => $code,
            'Percent' => $percent,
        ), $id);
    }

    public function onOffVoucher($id,$isUse)
    {
        return $this->update_by_id(array(
            'isUse' => $isUse,
        ), $id);
    }
}
$voucher = new Vourcher();