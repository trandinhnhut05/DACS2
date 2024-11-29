<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<?php
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
    $sql_sua_xe = "SELECT * FROM xedulich WHERE id_xedulich = '$_GET[idxedulich]' LIMIT 1";
    $query_sua_xe = mysqli_query($mysqli,$sql_sua_xe);
?>
<p>Sửa Thông tin xe du lịch</p>


<table border="1px" width="100%" style="border-collapse: collapse;">
  <?php
  while($row = mysqli_fetch_array($query_sua_xe)){

  ?>
 <form action="modules/quanlyxedulich/xuly.php?idxedulich=<?php echo $row['id_xedulich'] ?>" method="POST" enctype="multipart/form-data">
  <tr>
    <td>Tên xe</td>
   <td><input type="text" value="<?php echo $row['tenxedulich'] ?>"  name="tenxedulich"></td>
  </tr>
  <tr>
    <td>Địa chỉ giao xe</td>
   <td><input type="text" value="<?php echo $row['diachigiao'] ?>" name="diachigiao"></td>
  </tr>
  <tr>
    <td>Giá</td>
   <td><input type="text" value="<?php echo $row['gia'] ?>" name="gia"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
   <td>
    <input type="file" name="hinhanh">
    <img src="modules/quanlykhachsan/uploads/<?php echo $row['hinhanh']?>" width="100" height="100">
  </td>
  </tr>
  <tr>
    <td>Mẫu xe</td>
   <td><input type="text" value="<?php echo $row['loaixe'] ?>" name="loaixe"></td>
  </tr>
  </tr>
  <tr>
    
   <td><input type="submit" name="suathongtinxedulich" value="Sửa thông tin xe du lịch"></td>
  </tr>
  </form> 
  <?php
  }
  ?>
</table>

