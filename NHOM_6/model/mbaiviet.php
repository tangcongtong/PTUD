<?php 
	include_once("ketnoi.php");
	class modelbv{
		//chọn tất cả sản phẩm
		function chonbaiviet(){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="SELECT * FROM `baiviet` INNER JOIN phong ON phong.Id_Phong = baiviet.Id_Phong 
                                                INNER join anh on anh.id_phong = phong.Id_Phong 
                                                INNER join nha on nha.Id_Nha=phong.Id_Nha
												INNER join giuong on giuong.Id_Phong=phong.Id_Phong
												GROUP BY Id_BaiViet";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
		function chon1baiviet($mahang){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="SELECT * FROM `baiviet` INNER JOIN phong ON phong.Id_Phong = baiviet.Id_Phong 
                                                INNER join nha on nha.Id_Nha=phong.Id_Nha
												INNER join giuong on giuong.Id_Phong=phong.Id_Phong
												WHERE Id_BaiViet = '".$mahang."'
												GROUP BY Id_BaiViet";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
		function chonthembaiviet($tieude, $id_ql, $id_p, $anh, $ngay, $nd){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="INSERT INTO baiviet( TieuDe, Id_Quanly, Id_Phong, AnhChinh, NgayDang, NoiDung )
                VALUES ( '$tieude', '$id_ql', '$id_p', '$anh', '$ngay', '$nd')";

				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
	}
?>