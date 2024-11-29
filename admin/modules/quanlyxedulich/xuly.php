<?php

$tenxedulich = $_POST['tenxedulich'];
$diachi = $_POST['diachigiao'];
$gia = $_POST['gia'];
$loaixe = $_POST['loaixe'];
//xử lý hình ảnh
$hinhanh =$_FILES['hinhanh']['name'];
$hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];
$hinhanh =time().'_'.$hinhanh;
if(isset($_POST['themxedulich'])){
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
        $sql_them ="INSERT INTO `web_dulich`.`xedulich` (`tenxedulich`, `diachigiao`,`hinhanh`,`gia`,`loaixe`) VALUES
         ('".$tenxedulich."','".$diachi."','".$hinhanh."','".$gia."','".$loaixe."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlyxedulich&query=them');
}elseif(isset($_POST['suathongtinxedulich'])){
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
    //sua
    if($hinhanh!==''){
       
    $sql_update ="UPDATE  `web_dulich`.`xedulich` SET tenxedulich='".$tenxedulich."' ,diachigiao='".$diachi."',
   hinhanh='".$hinhanh."',gia='".$gia."',loaixe='".$loaixe."' WHERE id_xedulich='$_GET[idxedulich]'";
    $sql = "SELECT * FROM `web_dulich`.`xedulich` WHERE id_xedulich ='$_GET[idxedulich]' LIMIT 1";
    //xoaanhcu
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    }else{
        $sql_update ="UPDATE  `web_dulich`.`xedulich` SET tenxedulich='".$tenxedulich."' ,diachigiao='".$diachi."',
        hinhanh='".$hinhanh."',gia='".$gia."',loaixe='".$loaixe."' WHERE id_xedulich='$_GET[idxedulich]'";
    }
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlyxedulich&query=them');
}else{
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
    $id=$_GET['idxedulich'];
    $sql = "SELECT * FROM `web_dulich`.`xedulich` WHERE id_xedulich ='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    
   $sql_xoa= "DELETE FROM xedulich WHERE id_xedulich = '".$id."'" ;
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlyxedulich&query=them');
}
?>