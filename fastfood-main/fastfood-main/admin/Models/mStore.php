<?php
class Store extends DB_business {
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'stores';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }
    public function getAll()
    {
        return $this->get_list("SELECT `stores`.*,`users`.`UserName` FROM `stores`,`users` WHERE `stores`.`IDManager` = `users`.`ID` AND `stores`.`IsDelete` = 0")??[];
    }

    public function getStoreByID($IDStore)
    {
        return $this->get_list("SELECT `stores`.*,`users`.`UserName` FROM `stores`,`users` WHERE `stores`.`IDManager` = `users`.`ID` AND `stores`.`ID` = {$IDStore}")[0]??[];
    }

    public function getUserByUserName($userName){       
        return $this->get_list("SELECT `ID` FROM `users` WHERE `UserName`='{$userName}'")[0]??[];
    }

    public function insertStore($storeName,$address,$idManager){
        return $this->add_new(array(
            'StoreName' => $storeName,
            'Address' => $address,
            'IDManager' => $idManager,
        ));
    }

    public function updateStore($IDStore,$storeName,$address,$idManager){
        return $this->update_by_id(array(
            'StoreName' => $storeName,
            'Address' => $address,
            'IDManager' => $idManager,
        ), $IDStore);
    }

    public function deleteStore($IDStore){
        return $this->update_by_id(array(
            'IsDelete' => 1,
        ), $IDStore);
    }
}
$store = new Store();