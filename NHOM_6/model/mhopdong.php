<?php 
	include_once("ketnoi.php");
	class modelsp{
		//chọn tất cả sản phẩm
		function chonhopdong(){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="select * from hopdong INNER JOIN khachthuephong on khachthuephong.Id_KhachThuePhong=hopdong.Id_KhachThuePhong
												INNER JOIN giuong on giuong.Id_KhachThuePhong=khachthuephong.Id_KhachThuePhong
												GROUP BY Id_HopDong";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
		function chon1hopdong($ma){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="select * from hopdong where Id_HopDong='".$ma."'";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}

		function chonupdatehopdong($ma, $ten, $ngay, $tena, $tenb, $mab, $maa, $tg, $tien){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="update hopdong set TenHopDong ='$ten', NgayLap ='$ngay', HoTenBenA ='$tena', HoTenBenB ='$tenb', Id_KhachThuePhong ='$mab', Id_QuanLy ='$maa', ThoiHan ='$tg', Tiencoc ='$tien' where Id_HopDong='$ma';";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}

		function chonthemhopdong($ten, $ngay, $tena, $tenb, $mab, $maa, $tg, $tien){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="INSERT INTO hopdong( TenHopDong, NgayLap, HoTenBenA, HoTenBenB, Id_KhachThuePhong, Id_QuanLy, ThoiHan, Tiencoc )
                VALUES ( '".$ten."', '".$ngay."', '".$tena."', '".$tenb."', ".$mab.", ".$maa.", '".$tg."', ".$tien.")";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
		
	}
?>