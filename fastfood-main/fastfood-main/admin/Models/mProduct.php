<?php
class Product extends DB_business {
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
        return $this->get_list("SELECT `products`.*, `category`.`Name` AS 'Category' FROM `products`,`category` WHERE `products`.`IDCategory` = `category`.`ID` AND `products`.`IsDelete` = 0");
    }

    public function getProductByID($IDProduct){
        return $this->get_list("SELECT `products`.*, `category`.`ID` AS 'Category' FROM `products`,`category` WHERE `products`.`IDCategory` = `category`.`ID` AND `products`.`ID` = {$IDProduct}")[0]??[];
    }

    public function getAllCategory(){
        return $this->get_list("SELECT `category`.`ID`,`category`.`Name` FROM `category` WHERE `IsDelete` = 0");
    }

    public function insertProduct($name,$price,$image,$category){
        return $this->add_new(array(
                'Name' => $name,
                'Price' => $price,
                'Image' => $image,
                'IDCategory' => $category,
            ));
    }

    public function UpdateProduct($IDProduct,$name,$price,$image,$category){
        return $this->update_by_id(array(
                'Name' => $name,
                'Price' => $price,
                'Image' => $image,
                'IDCategory' => $category,
        ), $IDProduct);
    }

    public function DeleteProduct($IDProduct){
        return $this->update_by_id(array(
                'IsDelete' => 1,
        ), $IDProduct);
    }

    public function showHideProduct($IDProduct,$value)
    {
        return $this->update_by_id(array(
            'IsShow' => $value,
    ), $IDProduct);
    }
}
$product = new Product();