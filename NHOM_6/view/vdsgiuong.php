<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php 
	include_once("Controller/cgiuong.php");
	$p = new controlsp();
	$table = $p -> laygiuong();
		if($table){
			if(mysqli_num_rows($table)>0){
				echo "<h1 text-align=center style='color: black;'>THÔNG TIN GIƯỜNG</h1>";
				echo "<table style='width:95%; margin: 10px;' border = '1'>";
				echo "<tr>";
				echo "<td>Id giường</td>";
				echo "<td>Số giường</td>";
				echo "<td>Giá thuê</td>";
				echo "<td>Mã khách thuê</td>";   
				echo "<td>Trạng thái</td>";
				echo "<td>Cập nhật</td>";
				echo "</tr>";
				while($row=mysqli_fetch_assoc($table)){
					echo "<tr>";
						echo "<td>";echo $row["Id_Giuong"];echo "</td>";
						echo "<td>";echo $row["SoGiuong"];echo "</td>";
						echo "<td>";echo $row["GiaTien"];echo "</td>";
						echo "<td>";echo $row["Id_KhachThuePhong"];echo "</td>";
                        echo "<td>";
							if($row["TrangThai"]==0){
								echo "Trống";
							}else{
								echo "Đã cho thuê";
							}
							
						echo "</td>";
						echo "<td>";echo "<a href='admin2.php?udg=".$row["Id_Giuong"]."'>Sửa</a>";echo "</td>";
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