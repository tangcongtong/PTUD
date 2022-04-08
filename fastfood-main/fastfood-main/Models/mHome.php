<?php

// Lớp khách hàng
class Home extends DB_business 
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
        return $this->get_list("SELECT pr.*,ca.Url FROM `products` as pr,category as ca WHERE ca.`ID` = pr.`IDCategory` AND pr.`IsShow` = 0 AND pr.`IsDelete` = 0");
    }

    public function getTop8(){
        return $this->get_list("SELECT pr.*,ca.Url FROM `products` as pr,category as ca WHERE ca.`ID` = pr.`IDCategory` AND pr.`IsShow` = 0 AND pr.`IsDelete` = 0 AND ca.`IsDelete` = 0 AND ca.`IsShow`=0 ORDER BY pr.`ID` DESC LIMIT 20");
    }

    public function getProductByCategory($IDCategory){
        return $this->get_list("SELECT pr.*,ca.Name as 'nameCategory' FROM `products` as pr,category as ca WHERE ca.`ID` = pr.`IDCategory`AND pr.`IsShow` = 0 AND pr.`IsDelete` = 0 AND pr.`IDCategory` = {$IDCategory}");
    }

    public function getProductByID($ID){
        return $this->get_list("SELECT `ID`,`Name`,`Price`,`Image` FROM `products` WHERE `ID` in ($ID)");
    }

    public function getCategoryTop8(){
        return $this->get_list("SELECT DISTINCT ca.Name,ca.Url FROM `products` as pr,category as ca WHERE ca.`ID` = pr.`IDCategory` AND pr.`IsShow` = 0 AND pr.`IsDelete` = 0 AND ca.`IsDelete` = 0 AND ca.`IsShow`=0 ORDER BY pr.`ID` DESC LIMIT 20");
    }
}
$home = new Home();
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