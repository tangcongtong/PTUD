<?php 
	include_once("ketnoi.php");
	class modelsp{
		//chọn tất cả sản phẩm
		function chonphong(){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="select * from phong";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
		function chon1phong($ma){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="select * from phong where Id_Phong='".$ma."'";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
		function chonupdatephong($ma, $sophong, $sogiuong, $dientich, $mota, $id_nha){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="update phong set SoPhong ='$sophong', SoGiuong ='$sogiuong', DienTichPhong ='$dientich', 
				MoTa ='$mota', Id_Nha ='$id_nha'
                where Id_Phong='$ma'";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
	}
?>