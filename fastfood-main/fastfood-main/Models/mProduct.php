<?php

// Lớp khách hàng
class Product extends DB_business 
{
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'products';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }

    public function getAll(){
        return $this->get_list("SELECT pr.*,ca.Url FROM `products` as pr,category as ca WHERE ca.`ID` = pr.`IDCategory` AND pr.`IsDelete` = 0 AND pr.`IsShow` = 0");
    }

    public function getProductByCategory($IDCategory){
        return $this->get_list("SELECT pr.*,ca.Name as 'nameCategory' FROM `products` as pr,category as ca WHERE ca.`ID` = pr.`IDCategory` AND pr.`IDCategory` = {$IDCategory}");
    }

    public function getProductByID($ID){
        return $this->get_list("SELECT `products`.*,`category`.`IsDelete` as 'CategoryIsDelete',`category`.`IsShow` as 'CategoryIsShow' FROM `products`,`category` WHERE `products`.`IDCategory` = `category`.`ID` AND `products`.`ID` in ($ID)");
    }

    function getTotalProduct($products){
        return $this->getCount($products);
    }

    public function getProductByCategoryWithPage($IDCategory,$from,$limit){
        return $this->get_list("SELECT pr.*,ca.Name as 'nameCategory' FROM `products` as pr,category as ca WHERE ca.`ID` = pr.`IDCategory` AND pr.`IsDelete` = 0 AND pr.`IsShow` = 0 AND pr.`IDCategory` = {$IDCategory} limit {$from},{$limit}");
    }

    public function getAllStore(){
        return $this->get_list("SELECT * FROM `stores` WHERE `IsDelete` = 0");
    }
}
$product = new Product();
// // Khởi tạo lớp khách hàng
// $customer = new Customer();
 
// // Thêm khách hàng
// $customer->add_new(array(
//     'name' => 'Nguyễn Văn Cường',
//     'phone' => '0970 306 603'
// ));
 
// // Xóa khách hàng
// $customer->delete_by_id(1);
 
// // Update khách hàng
// $customer->update_by_id(array(
//     'name' => 'thehalfheart'
// ), 2);
 
// // Lấy chi tiết khách hàng
// var_dump($customer->select_by_id('*', 2));