<?php 
	include_once("model/mphong.php");
	class controlsp{
		//lấy tất cả sản phẩm
		function laygiuong(){
			$p = new modelsp();
			$tblPro = $p->chonphong();
			return ($tblPro);
		}
		function lay1phong($ma){
			$p = new modelsp();
			$tblPro = $p->chon1phong($ma);
			return ($tblPro);
		}
		function layupdatephong($ma, $sophong, $sogiuong, $dientich, $mota, $id_nha){
			$p = new modelsp();
			$table = $p -> chonupdatephong($ma, $sophong, $sogiuong, $dientich, $mota, $id_nha);
            if($table){
                return 1;
            }else{
                return 0; //không thể chèn
            }
		}
	}
	
?>