<?php
include_once("ketnoi.php");
class mDanhsachnha{
    function SelectDanhsachnha(){
        $ketnoi = new clsketnoi();
        if ($ketnoi->ketnoidb($con)) {
            $query = "SELECT * FROM nha";
            $table = mysqli_query($con, $query);
            $ketnoi->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function Insertnha( $diachi, $idql){
        $con;
        $p = new clsketnoi();
        if($p->ketnoidb($con)){
            $string = "INSERT INTO nha(DiaChi , id_QuanLi ) VALUES ('$diachi', '$idql')";
            $kq = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $kq;
        }else {
            return false;
        }
    }

    function Deletenha($idnha)
    {
        $ketnoi = new clsketnoi();

        if ($ketnoi->ketnoidb($connect)) {
            $query = "DELETE FROM `nha` WHERE `Id_Nha` = '$idnha'";
            $table = mysqli_query($connect, $query);
            $ketnoi->dongketnoi($connect);
            return $table;
        } else {
            return false;
        }
    }

    
}
?>
