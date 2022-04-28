<?php 
	include_once("model/mquanli.php");
	class controlql{
		//lấy tất cả sản phẩm
		function layquanli(){
			$p = new modelsp();
			$tblPro = $p->chonquanli();
			return ($tblPro);
		}
	}
?>