<?php 
	include_once("ketnoi.php");
	class modelsp{
		//chọn tất cả sản phẩm
		function chontaikhoan(){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="select * from taikhoan INNER JOIN roletaikhoan on taikhoan.Id_TaiKhoan=roletaikhoan.Id_TaiKhoan
                GROUP BY taikhoan.Id_TaiKhoan";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
	}
?>