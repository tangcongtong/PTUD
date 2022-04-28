<?php 
	include_once("../model/mtaikhoan.php");
	class controlsp{
		//lấy tất cả sản phẩm
		function laytaikhoan(){
			$p = new modelsp();
			$tblPro = $p->chontaikhoan();
			return ($tblPro);
		}
	}
?>