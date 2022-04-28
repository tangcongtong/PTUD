<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php 
	include_once("controller/cDanhsachphong.php");
	$p = new ControllerDanhsachphong();
	$table = $p -> getDanhsachphong();
		if($table){
			if(mysqli_num_rows($table)>0){
				echo "<h3  style='color: black; text-align:center;'>DANH SÁCH PHÒNG</h3>";
				echo "<table style='width:800px; margin-left: 200px;' >";
				echo "<tr style='border: 1px solid white;'>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>ID Phòng</td>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>Số Phòng</td>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>Số Giường</td>";
                echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>Diện tích</td>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>Mô Tả</td>";
				echo "<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'>ID Nhà</td>";
                echo"<td style='color: white; text-align:center;border: 1px solid white;  background: #015f95;'></td>";
				echo "</tr>";
				while($row=mysqli_fetch_assoc($table)){
					echo "<tr>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["Id_Phong"];echo "</td>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["SoPhong"];echo "</td>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["SoGiuong"];echo "</td>";
                        echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["DienTichPhong"];echo "</td>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo substr( $row["MoTa"],0,30);echo "</td>";
						echo "<td style='border: 1px solid white; background: #ebecd0;'>";echo $row["Id_Nha"];echo "</td>";
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