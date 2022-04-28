<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php 
	include_once("Controller/cthanhtoan.php");
	$p = new controlsp();
	$table = $p -> laythanhtoan();
		if($table){
			if(mysql_num_rows($table)>0){
				echo "<h1 text-align=center style='color: black;'>THÔNG TIN THANH TOÁN</h1>";
				echo "<table style='width:95%; margin: 10px;' border = '1'>";
				echo "<tr>";
				echo "<td>Mã hóa đơn</td>";
				echo "<td>Số giường</td>";
				echo "<td>Tháng thuê</td>";
				echo "<td>Thời gian thanh toán</td>";
				echo "<td>Số tiền</td>";
                echo "<td>Tình trạng</td>";
				echo "<td>Cập nhật</td>";
				echo "</tr>";
				while($row=mysql_fetch_assoc($table)){
					echo "<tr>";
						echo "<td>";echo $row["Id_HoaDon"];echo "</td>";
						echo "<td>";echo $row["SoGiuong"];echo "</td>";
						echo "<td>";echo $row["ThangThue"];echo "</td>";
						echo "<td>";echo $row["NgayLap"];echo "</td>";
                        echo "<td>";echo $row["Gia"];echo "</td>";
                        echo "<td>";echo $row["TrangThaiTT"];echo "</td>";
						echo "<td>";echo "<a href='admin2.php?updatehoadon=".$row["Id_HoaDon"]."'>Sửa</a>";echo "</td>";
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