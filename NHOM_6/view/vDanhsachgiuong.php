<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php 
	include_once("controller/cDanhsachgiuong.php");
	$p = new ControllerDanhsachgiuong();
	$table = $p -> getDanhsachgiuong();
		if($table){
			if(mysqli_num_rows($table)>0){
				echo "<h3  style='color: black; text-align:center;'>DANH SÁCH GIƯỜNG</h3>";
				echo "<table style='width:800px; margin-left: 200px;' >";
				echo "<tr style='border: 1px solid white;'>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>ID Giường</td>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>Trạng Thái</td>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>Giá Tiền</td>";
                echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>ID Khách Thuê</td>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>ID Phòng</td>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>Số Giường</td>";
                echo"<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'></td>";
				echo "</tr>";
				while($row=mysqli_fetch_assoc($table)){
					echo "<tr>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["Id_Giuong"];echo "</td>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["TrangThai"];echo "</td>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["GiaTien"];echo "</td>";
                        echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["Id_KhachThuePhong"];echo "</td>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["Id_Phong"];echo "</td>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["SoGiuong"];echo "</td>";
                        echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo"<a href='#' >Sửa</a>";
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