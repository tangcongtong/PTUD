<?php 
	include_once("ketnoi.php");
	class modelsp{
		//chọn tất cả sản phẩm
		function chongiuong(){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="select * from giuong";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
        function chon1giuong($ma){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="select * from giuong where Id_Giuong='".$ma."'";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
        function chonupdategiuong($ma, $sogiuong, $tien, $idkhach, $trangthai){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="update giuong set SoGiuong =".$sogiuong.",  Id_KhachThuePhong= ".$idkhach.", GiaTien =".$tien.", TrangThai =".$trangthai." 
                where Id_Giuong='".$ma."'";
                //update giuong set SoGiuong = 1013,Id_KhachThuePhong=, GiaTien = 500000, TrangThai = 0 where Id_Giuong='12'
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
        function chonupdategiuong1($ma, $sogiuong, $tien, $trangthai){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="update giuong set SoGiuong =".$sogiuong.", GiaTien =".$tien.", TrangThai =".$trangthai." 
                where Id_Giuong='".$ma."'";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
	}
?>