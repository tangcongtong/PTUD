<?php
class Checkout extends DB_business {
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'category';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }

    public function getAll(){
        return $this->get_list("SELECT * FROM `category`");
    }
}
$checkout = new Checkout();