<?php 
	include_once("ketnoi.php");
	class modelthanhtoan{
		//chọn tất cả sản phẩm
		function chonthanhtoan(){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="SELECT * FROM `hoadon` join hopdong on hoadon.Id_HopDong=hopdong.Id_HopDong 
                                            join khachthuephong on khachthuephong.Id_KhachThuePhong=hopdong.Id_KhachThuePhong 
                                            join giuong on giuong.Id_KhachThuePhong=khachthuephong.Id_KhachThuePhong
                                            GROUP BY Id_HoaDon";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
		function chon1thanhtoan($ma){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="SELECT * FROM `hoadon` join hopdong on hoadon.Id_HopDong=hopdong.Id_HopDong 
                                            join khachthuephong on khachthuephong.Id_KhachThuePhong=hopdong.Id_KhachThuePhong 
                                            join giuong on giuong.Id_KhachThuePhong=khachthuephong.Id_KhachThuePhong  
											WHERE hoadon.Id_HopDong = '".$ma."'
                                            GROUP BY Id_HoaDon";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
		function chonthemthanhtoan($gia, $ngay, $trangthai, $id_hopdong, $thangthue){
			$con;
			$p = new clsketnoi();
			if ($p->ketnoidb($con)){
				$chuoi="INSERT INTO hoadon(Gia, NgayLap, TrangThaiTT, Id_HopDong, ThangThue)
				 VALUES ('$gia', '$ngay', '$trangthai', '$id_hopdong', '$thangthue')";
				$table =  mysqli_query($con,$chuoi);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;
			}
		}
	}
?>