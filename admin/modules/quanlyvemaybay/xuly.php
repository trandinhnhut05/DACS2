<?php

$diadiemdi = $_POST['diadiemdi'];
$diadiemden = $_POST['diadiemden'];
$gia = $_POST['giave'];
//xử lý hình ảnh
$hinhanh =$_FILES['hinhanh']['name'];
$hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];
$hinhanh =time().'_'.$hinhanh;
if(isset($_POST['themvemaybay'])){
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
        $sql_them ="INSERT INTO `web_dulich`.`vemaybay` (`diadiemdi`, `diadiemden`,`giave`,`hinhanh`) VALUES
         ('".$diadiemdi."','".$diadiemden."','".$gia."','".$hinhanh."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlyvemaybay&query=them');
}elseif(isset($_POST['suavemaybay'])){
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
    //sua
    if($hinhanh!==''){
       
    $sql_update ="UPDATE  `web_dulich`.`vemaybay` SET diadiemdi='".$diadiemdi."' ,diadiemden='".$diadiemden."',giave='".$gia."',
   hinhanh='".$hinhanh."' WHERE id_vemaybay='$_GET[idvemaybay]'";
    $sql = "SELECT * FROM `web_dulich`.`vemaybay` WHERE id_vemaybay ='$_GET[idvemaybay]' LIMIT 1";
    //xoaanhcu
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    }else{
        $sql_update ="UPDATE  `web_dulich`.`vemaybay` SET diadiemdi='".$diadiemdi."' ,diadiemden='".$diadiemden."',giave='".$gia."',
        hinhanh='".$hinhanh."' WHERE id_vemaybay='$_GET[idvemaybay]'";
    }
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlyvemaybay&query=them');
}else{
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
    $id=$_GET['idvemaybay'];
    $sql = "SELECT * FROM `web_dulich`.`vemaybay` WHERE id_vemaybay ='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    
   $sql_xoa= "DELETE FROM vemaybay WHERE id_vemaybay = '".$id."'" ;
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlyvemaybay&query=them');
}
?>