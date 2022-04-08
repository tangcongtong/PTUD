<?php
class Category extends DB_business {
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
        return $this->get_list("SELECT * FROM `category` WHERE `IsDelete` = 0")??[];
    }

    public function getCategoryByID($id){       
        return $this->get_list("SELECT * FROM `category` WHERE `IsDelete` = 0 AND `ID`={$id}")[0]??[];
    }

    public function updateCategory($id,$name,$url)
    {
        return $this->update_by_id(array(
            'Name' => $name,
            'Url' => $url,
        ), $id);
    }

    public function insertCategory($name,$url)
    {
        return $this->add_new(array(
            'Name' => $name,
            'Url' => $url,
        ));
    }

    public function deleteCategory($id)
    {
        return $this->update_by_id(array(
            'IsDelete' => 1,
        ),$id);
    }

    public function showHideCategory($id,$value)
    {
        return $this->update_by_id(array(
            'IsShow' => $value,
        ),$id);
    }
}
$category = new Category();