<?php 
	include_once("model/mgiuong.php");
	class controlsp{
		//lấy tất cả sản phẩm
		function laygiuong(){
			$p = new modelsp();
			$tblPro = $p->chongiuong();
			return ($tblPro);
		}
        function lay1giuong($ma){
			$p = new modelsp();
			$table = $p -> chon1giuong($ma);
			return $table;
		}
        function layupdategiuong($ma, $sogiuong, $tien, $idkhach, $trangthai){
			$p = new modelsp();
			$table = $p -> chonupdategiuong($ma, $sogiuong, $tien, $idkhach, $trangthai);
            if($table){
                return 1;
            }else{
                return 0; //không thể chèn
            }
		}
        function layupdategiuong1($ma, $sogiuong, $tien, $trangthai){
			$p = new modelsp();
			$table = $p -> chonupdategiuong1($ma, $sogiuong, $tien, $trangthai);
            if($table){
                return 1;
            }else{
                return 0; //không thể chèn
            }
		}
	}
?>