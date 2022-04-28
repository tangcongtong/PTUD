<?php 
	include_once("ketnoi.php");
	class modelsp{
		//chọn tất cả sản phẩm
		function chonquanli(){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="select * from quanly";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
	}
?>