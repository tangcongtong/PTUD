<?php
class Login extends DB_business {
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'users';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }

    public function verifyLogin(){
        $user = $_POST["username"];
        $pass = md5($_POST["pass"]);
        return $this->get_list("SELECT u.*,r.`RoleName`,r.`ID` as 'IDRole' FROM `users` as u,`roles` as r WHERE u.`Role` = r.ID AND u.`UserName`='{$user}' AND u.`Password`='{$pass}' AND u.`IsDelete` = 0")[0]??[];
    }
}
$login = new Login();