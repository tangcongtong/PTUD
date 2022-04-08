<?php
class Bill extends DB_business {
    function __construct() 
    {
        // Khai báo tên bảng
        $this->_table_name = 'bills';
         
        // Khai báo tên field id
        $this->_key = 'ID';
         
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }

    public function getAll(){
        return $this->get_list("SELECT * FROM `bills`");
    }

    public function insertBill($name,$address,$numberPhone,$voucher,$IDStore){
        $this->_table_name = 'bills';
        return $this->add_new(array(
            'Name' => $name,
            'Address' => $address,
            'NumberPhone' => $numberPhone,
            'Voucher' => $voucher,
            'IDStore' => $IDStore,
        ));
    }

    public function insertDetail($IDBill,$IDProduct,$number){
        $this->_table_name = 'detailbill';
        return $this->add_new(array(
            'IDBill' => $IDBill,
            'IDProduct' => $IDProduct,
            'Number' => $number,
        ));
    }
}
$bill = new Bill();