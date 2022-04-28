
<?php
    include_once("controller/cDanhsachnha.php");
    if(isset($_REQUEST["btnsubmit"])){
        // Lấy dữ liệu được nhập từ form
        $diachi = $_REQUEST["txtdiachi"];
        $idql = $_REQUEST["txtidql"];
      
        $p = new ControllerDanhsachnha();
        // Gọi hàm thêm dữ liệu vào DB từ controller
        $kq = $p->Addnha($diachi, $idql);
   
        // Hiển thị các thông báo cần thiết

        if($kq==1){
             echo "<script> alert('Thêm dữ liệu thành công')</script>";
             echo header("refresh: 0; url='admin2.php?dsn'");
        }   elseif($kq==0){
                echo "<script> alert('Không thể insert')</script>";
        }else{
            echo "Lỗi";
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>THÊM NHÀ</h2>
    <form action="#" enctype="multipart/form-data" method="post">
        <table style="margin: auto; text-align: left">
            <tr>
                <td>Địa Chỉ</td>
                <td>
                <input type="text" name="txtdiachi" id="" required >
                </td>
            </tr>
            <tr>
                <td>ID Quản Lý</td>
                <td>
                <input type="text" name="txtidql" id="" required >
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnsubmit" value="Thêm" id="">
                    <input type="reset" name="" value="Nhập lại" id="">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
