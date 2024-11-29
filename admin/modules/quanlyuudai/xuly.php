<?php

$tenkhachsan = $_POST['tenKhachSan'];
$diachi = $_POST['diaChi'];
$gia = $_POST['gia'];
//xử lý hình ảnh
$hinhanh =$_FILES['hinhanh']['name'];
$hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];
$hinhanh =time().'_'.$hinhanh;
if(isset($_POST['themkhachsan'])){
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
        $sql_them ="INSERT INTO `web_dulich`.`khachsan` (`tenKhachSan`, `diaChi`,`gia`,`hinhanh`) VALUES
         ('".$tenkhachsan."','".$diachi."','".$gia."','".$hinhanh."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlykhachsan&query=them');
}elseif(isset($_POST['suakhachsan'])){
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
    //sua
    if($hinhanh!==''){
       
    $sql_update ="UPDATE  `web_dulich`.`khachsan` SET tenKhachSan='".$tenkhachsan."' ,diaChi='".$diachi."',gia='".$gia."',
   hinhanh='".$hinhanh."' WHERE idKhachsan='$_GET[idkhachsan]'";
    $sql = "SELECT * FROM `web_dulich`.`khachsan` WHERE idKhachsan ='$_GET[idkhachsan]' LIMIT 1";
    //xoaanhcu
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    }else{
        $sql_update ="UPDATE  `web_dulich`.`khachsan` SET tenKhachSan='".$tenkhachsan."' ,diaChi='".$diachi."',gia='".$gia."',
        hinhanh='".$hinhanh."' WHERE idKhachsan='$_GET[idkhachsan]'";
    }
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlykhachsan&query=them');
}else{
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
    $id=$_GET['idkhachsan'];
    $sql = "SELECT * FROM `web_dulich`.`khachsan` WHERE idKhachSan ='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    
   $sql_xoa= "DELETE FROM khachsan WHERE idKhachSan = '".$id."'" ;
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlykhachsan&query=them');
}
?>