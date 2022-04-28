<?php 
	include_once("model/mbaiviet.php");
	class controlbv{
		//lấy tất cả sản phẩm
		function laybaiviet(){
			$p = new modelbv();
			$tblPro = $p->chonbaiviet();
			return ($tblPro);
		}
		function lay1baiviet($tenhang){
			$p = new modelbv();
			$ten = $p -> chon1baiviet($tenhang);
			return $ten;
		}
		function addPro($tieude, $id_ql, $id_p,	$nd,$ngay,$file,$loaianh,$anh,$sizeanh ){
			//echo "<script>alert('".$loaianh."')</script>";
			//if($loaianh == "image/jpeg" || $loaianh=="image/png"){
			if($loaianh == "image/jpeg" || $loaianh=="image/png"){
				if($sizeanh<=2*1014*1024){
					$create= move_uploaded_file($file,"./anh/".$anh);
					if($create){
						$p = new modelbv();
						$ins= $p->chonthembaiviet($tieude, $id_ql, $id_p, $anh, $ngay, $nd);
						if($ins){
							return 1;
						}else{
							return 0; //không thể chèn
						}
					}else{
						return -1; //không thể upload
					}
				}else{
					return -2; //Kích thước không được quá 2mb
				}
			}else{
				return -3; //Không đúng loại file
			}
		}
	}

?>