<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php 
	include_once("Controller/chopdong.php");
	$p = new controlsp();
	$table = $p -> layhopdong();
		if($table){
			if(mysqli_num_rows($table)>0){
				echo "<h1 text-align=center style='color: black;'>THÔNG TIN HỢP ĐỒNG</h1>";
				echo "<table style='width:95%; margin: 10px;' border = '1'>";
				echo "<tr>";
				echo "<td>Id hợp đồng</td>";
				echo "<td>Tên hợp đồng</td>";
				echo "<td>Ngày lập</td>";
				echo "<td>Id người lập</td>";   
				echo "<td>Họ và tên bên A</td>";
                echo "<td>Id khách hàng</td>";   
				echo "<td>Họ và tên bên B</td>";
                echo "<td>Thời hạn</td>";   
				echo "<td>Tiền cọc</td>";
				echo "<td>Cập nhật</td>";
				echo "</tr>";
				while($row=mysqli_fetch_assoc($table)){
					echo "<tr>";
						echo "<td>";echo $row["Id_HopDong"];echo "</td>";
						echo "<td>";echo $row["TenHopDong"];echo "</td>";
						echo "<td>";echo $row["NgayLap"];echo "</td>";
                        echo "<td>";echo $row["Id_QuanLy"];echo "</td>";
						echo "<td>";echo $row["HoTenBenA"];echo "</td>";
						echo "<td>";echo $row["Id_KhachThuePhong"];echo "</td>";
						echo "<td>";echo $row["HoTenBenB"];echo "</td>";
                        echo "<td>";echo $row["ThoiHan"];echo "</td>";
						echo "<td>";echo $row["Tiencoc"];echo "</td>";
						echo "<td>";echo "<a href='admin2.php?uhd=".$row["Id_HopDong"]."'>Sửa</a>";echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}else{
				echo "0 result";
			}
		}else{
			echo "Erro";
		}
?>
<body>
</table>
</body>
</html>