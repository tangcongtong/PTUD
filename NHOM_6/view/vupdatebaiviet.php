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
	include_once("Controller/cbaiviet.php");
	$p = new controlbv();
	$table = $p -> lay1baiviet($_REQUEST["udbv"]);
	$row = mysqli_fetch_assoc($table);
	//echo "<script> alert ('".$ttkh["TenKh"]."')</script>";
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="ml-sm-auto col-lg-1"></div>
        
            <main role="main" class="ml-sm-auto col-lg-10">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2" style="padding-left: 100px;">Cập nhật bài viết</h1>
                </div>
                
                <form class="js-form-submit-data" action="#" method="POST">
                    <div class="form-group row mt-5">
                        <label for="tieude" class="col-md-2 offset-md-2 col-form-label" >Tiêu đề</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="tieude" id="tieude" value="<?php echo $row["TieuDe"] ?>" >
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label for="id_ql" class="col-md-2 offset-md-2 col-form-label" >Tên người tạo</label>
                        <div class="col-md-6">
                            <select name="id_ql">
                            <?php
                                include_once("Controller/cquanli.php");
                                $comp= new controlql();
                            $table1 = $comp ->layquanli();
                            if(mysqli_num_rows($table1)){
                                while($row1 = mysqli_fetch_assoc($table1)){
                                    if($row1["Id_QuanLy"]==$row["Id_QuanLy"]){
                                        echo "<option selected value='".$row1["Id_QuanLy"]."'>".$row1["HoVaTen"]."</option>";
                                    }else{
                                        echo "<option value='".$row1["Id_QuanLy"]."'>".$row1["HoVaTen"]."</option>";
                                    }
                                }
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label for="sophong" class="col-md-2 offset-md-2 col-form-label" >ID phòng</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " id="sophong" name="sophong" value="<?php echo $row["Id_Phong"] ?>" >
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label for="anh" class="col-md-2 offset-md-2 col-form-label" >Chọn ảnh chính</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control " id="anh" name="anh" value="<?php echo $row["AnhChinh"] ?>" >
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label for="ngay" class="col-md-2 offset-md-2 col-form-label" >Ngày đăng</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control " id="ngay" name="ngay" value="<?php echo $row["NgayDang"] ?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mota" class="col-md-2 offset-md-2 col-form-label"  >Mô tả</label>
                        <div class="col-md-6">
                            <textarea name="mota" class="form-control " id="mota" cols="79" rows="5" value="<?php echo $row["NoiDung"] ?>" ></textarea><br>
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                            <button type="submit" name="btnsubmit" id="btn1" style=" height: 50px; width: 100px; float: left; margin-left: 500px;" >Tạo</button>
                            <button type="submit" id="btn" style=" width: 100px; margin-left: 100px; ">Hủy</button>
                    </div>
                    <input type="hidden" name="user_id" value="116526">
                </form>


                <br><br>

            </main>
            <div class="ml-sm-auto col-lg-1"></div>
        </div>
    </div>
    <?php 
	
	?>
</body>

</html>