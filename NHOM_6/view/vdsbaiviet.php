<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php 
	include_once("Controller/cbaiviet.php");
	$p = new controlbv();
	$table = $p -> laybaiviet();
		if($table){
			if(mysqli_num_rows($table)>0){
				echo "<h1 text-align=center style='color: black;'>THÔNG TIN BÀI VIẾT</h1>";
				echo "<table style='width:95%; margin: 10px;' border = '1'>";
				echo "<tr>";
				echo "<td>Id bài viết</td>";
				echo "<td>Tiêu đề</td>";
				echo "<td>ID phòng</td>";
				echo "<td>ID người đăng</td>";   
				echo "<td>Ảnh chính</td>";
				echo "<td>Ngày đăng</td>";
                echo "<td>Nội dung</td>";
                echo "<td>Cập nhật</td>";
				echo "</tr>";
				while($row=mysqli_fetch_assoc($table)){
					echo "<tr>";
						echo "<td>";echo $row["Id_BaiViet"];echo "</td>";
						echo "<td>";echo $row["TieuDe"];echo "</td>";
						echo "<td>";echo $row["Id_Phong"];echo "</td>";
						echo "<td>";echo $row["Id_Quanly"];echo "</td>";
                        echo "<td>";echo $row["AnhChinh"];echo "</td>";
						echo "<td>";echo $row["NgayDang"];echo "</td>";
						echo "<td>";echo substr($row['NoiDung'], 0, 100); echo"...";echo "</td>";
						echo "<td>";echo "<a href='admin2.php?udbv=".$row["Id_BaiViet"]."'>Sửa</a>";echo "</td>";
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