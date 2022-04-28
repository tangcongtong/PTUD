<?php 
	include_once("model/mhopdong.php");
	class controlsp{
		//lấy tất cả sản phẩm
		function laythemhopdong($ten, $ngay, $tena, $tenb, $mab, $maa, $tg, $tien){
			$p = new modelsp();
			$tblPro = $p->chonthemhopdong($ten, $ngay, $tena, $tenb, $mab, $maa, $tg, $tien);
			if($tblPro){
                return 1;
            }else{
                return 0; //không thể chèn
            }
		}
		function layhopdong(){
			$p = new modelsp();
			$tblPro = $p->chonhopdong();
			return ($tblPro);
		}
		function lay1hopdong($ma){
			$p = new modelsp();
			$tblPro = $p->chon1hopdong($ma);
			return ($tblPro);
		}
		function layupdatethemhopdong($ma, $ten, $ngay, $tena, $tenb, $mab, $maa, $tg, $tien){
			$p = new modelsp();
			$tblPro = $p->chonupdatehopdong($ma, $ten, $ngay, $tena, $tenb, $mab, $maa, $tg, $tien);
			if($tblPro){
                return 1;
            }else{
                return 0; //không thể chèn
            }
		}
	}
?>