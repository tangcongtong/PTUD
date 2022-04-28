<?php
include_once("Controller/cgiuong.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php 
	$p = new controlsp();
	$table = $p -> lay1giuong($_REQUEST["udg"]);
	$ttkh = mysqli_fetch_assoc($table);
	//echo "<script> alert ('".$ttkh["TenKh"]."')</script>";
?>
<body>
	<form action="#" method="post" enctype="multipart/form-data">
	<table style="margin: auto; text-align: left; background-color:antiquewhite; width: 400px">
		<tr style="background-color: red;">
			<td colspan="2"><h2 style="color: white; text-align: center">SỬA THÔNG TIN GIƯỜNG</h2></td>
		</tr>
		<tr>
			<td>Số giường</td>
			<td><input type="text" name="sogiuong" value="<?php echo $ttkh["SoGiuong"] ?>"></td>
		</tr>
        <tr>
			<td>Giá thuê</td>
			<td><input type="text" name=giathue value="<?php echo $ttkh['GiaTien'] ?>"></td>
		</tr>
		<tr>
			<td>Mã khách thuê</td>
			<td><input type="text" name="idkhach" value="<?php echo $ttkh['Id_KhachThuePhong'] ?>"></td>
		</tr>
		<tr>
			<td>Trạng thái</td>
			<td>
				<?php 
					if($ttkh['TrangThai']==0){
						echo "Trống<input type='radio' name='tt' value='0' checked />";
						echo "Đã có khách thuê<input type='radio' name='tt' value='1' />";
					}else{
						echo "Trống<input type='radio' name='tt' value='0' />";
						echo "Đã có khách thuê<input type='radio' name='tt' value='1' checked />";
					}
				?>
			</td>
		</tr>
		
		
		<tr>
			<td></td>
			<td>
				<input type="submit" name="btnsubmit" value="Sửa">
				<input type="reset" value="Nhập lại">
			</td>
		</tr>
	</table>
	</form>
	<?php 
	if(isset($_REQUEST["btnsubmit"])){
        $sogiuong=$_REQUEST["sogiuong"];
        $tt=$_REQUEST["tt"];
        $giathue=$_REQUEST["giathue"];
        $idkhach=$_REQUEST["idkhach"];
        $ma=$_REQUEST["udg"];
        if($idkhach==null){
            $kq=$p->layupdategiuong1($ma, $sogiuong,$giathue,$tt);
            if($kq==1){
                echo "<script>alert('sửa dữ liệu thành công')</script>";
			    echo header ("refresh:0; url='admin2.php?dsg'");
            }elseif($kq==0){
                echo "<script>alert('Không thể insert lỗi 2')</script>";
            }
        }else{
            $kq=$p->layupdategiuong($ma, $sogiuong,$giathue,$idkhach,$tt);
            //layupdategiuong($ma, $sogiuong, $tien, $idkhach, $trangthai){
            if($kq==1){
                echo "<script>alert('Sửa dữ liệu thành công')</script>";
                echo header ("refresh:0; url='admin2.php?dsg'");
            }elseif($kq==0){
                echo "<script>alert('Không thể insert lỗi 1')</script>";
            }
        }
		
	}
	?>
</body>
</html>