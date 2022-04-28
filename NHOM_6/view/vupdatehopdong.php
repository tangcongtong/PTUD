<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <title>Document</title>
</head>
<?php 
	include_once("Controller/chopdong.php");
	$p = new controlsp();
	$table = $p -> lay1hopdong($_REQUEST["uhd"]);
	$row = mysqli_fetch_assoc($table);
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="ml-sm-auto col-lg-1"></div>
        
            <main role="main" class="ml-sm-auto col-lg-10">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2" style="padding-left: 100px;">Cập nhật hợp đồng Hợp Đồng</h1>
                </div>
                
                <form class="js-form-submit-data" action="#" method="POST">
                <div class="form-group row">
                        <label for="tenhopdong" class="col-md-2 offset-md-2 col-form-label"  >Tên hợp đồng</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " id="tenhopdong" name="tenhopdong" value="<?php echo $row["TenHopDong"] ?>"  >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-md-2 offset-md-2 col-form-label"  >Ngày lập</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control " id="date" name="date" value="<?php echo $row["NgayLap"] ?>"  >
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label for="id_a" class="col-md-2 offset-md-2 col-form-label">Id người lập hóa đơn</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="id_a" name="id_a" value="<?php echo $row["Id_QuanLy"] ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label for="name_a" class="col-md-2 offset-md-2 col-form-label">Họ tên bên A</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name_a" name="name_a" value="<?php echo $row["HoTenBenA"] ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label for="id_b" class="col-md-2 offset-md-2 col-form-label">ID khách thuê</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="id_b" name="id_b" value="<?php echo $row["Id_KhachThuePhong"] ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label for="name_b" class="col-md-2 offset-md-2 col-form-label">Họ tên bên B</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name_b" name="name_b" value="<?php echo $row["HoTenBenB"] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="coc" class="col-md-2 offset-md-2 col-form-label">Tiền cọc</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="coc" name="coc" value="<?php echo $row["Tiencoc"] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thoihan" class="col-md-2 offset-md-2 col-form-label">Thời hạn</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="thoihan" name="thoihan" value="<?php echo $row["ThoiHan"] ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label for="user_email" class="col-md-2 col-form-label"></label>
                        <div class="col-md-8">
                            <button type="submit" name="btnsubmit" class="btn btn-primary btn-lg mb-2 btn-block">Cập nhật hợp đồng</button>
                        </div>
                    </div>
                    
                </form>

                <br><br>

            </main>
            <div class="ml-sm-auto col-lg-1"></div>
        </div>
    </div>
<?php 
	if(isset($_REQUEST["btnsubmit"])){
        $ma=$_REQUEST["uhd"];
		$ten=$_REQUEST["tenhopdong"];
		$ngay=$_REQUEST["date"];
		$tena=$_REQUEST["name_a"];
		$tenb=$_REQUEST["name_b"];
		$maa=$_REQUEST["id_a"];
        $mab=$_REQUEST["id_b"];
		$tg=$_REQUEST["thoihan"];
		$tien=$_REQUEST["coc"];
		
        $kq=$p->layupdatethemhopdong($ma, $ten, $ngay, $tena, $tenb, $mab, $maa, $tg, $tien);
		if($kq==1){
			echo "<script>alert('cập nhật dữ liệu thành công')</script>";
			echo header ("refresh:0; url='admin2.php?xhd'");
		}elseif($kq==0){
			echo "<script>alert('Không thể cập nhật')</script>";
		}
	}
	?>
</body>

</html>