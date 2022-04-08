<?php
class User extends DB_business {
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'users';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }

    public function getUserAll(){
        return $this->get_list("SELECT `users`.*,`roles`.RoleName,`roles`.ID as 'IDROLE' FROM `users`,`roles` WHERE `users`.`role` = `roles`.`ID` AND `users`.`IsDelete` = 0");
    }

    public function getUser($id){
        return $this->get_list("SELECT `users`.*,`roles`.RoleName FROM `users`,`roles` WHERE `users`.`role` = `roles`.`ID` AND `users`.`ID` = {$id}")[0]??[];
    }

    public function getRoles(){
        return $this->get_list("SELECT * FROM `roles`")??[];
    }

    public function getAllStore(){
        return $this->get_list("SELECT * FROM `stores` WHERE `IsDelete` = 0")??[];
    }

    public function insertUser($userName,$name,$password,$IDRole,$IDStore){
        return $this->add_new(array(
            'Name' => $name,
            'UserName' => $userName,
            'Password' => md5($password),
            'Role' => $IDRole,
            'IDStore' => $IDStore,
        ));
    }

    public function updateUser($IDuser,$userName,$name,$password,$IDRole){
        if($password == ""){
            return $this->update_by_id(array(
                'Name' => $name,
                'UserName' => $userName,
                'Role' => $IDRole,
            ), $IDuser);
        }else
        {
            return $this->update_by_id(array(
                'Name' => $name,
                'UserName' => $userName,
                'Password' => md5($password),
                'Role' => $IDRole,
            ), $IDuser);
        }
        
    }

    public function deleteUser($IDuser){
            return $this->update_by_id(array(
                'IsDelete' => 1,
            ), $IDuser);       
    }
}
$user = new User();