<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<?php
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
    $sql_sua_ve = "SELECT * FROM vemaybay WHERE id_vemaybay = '$_GET[idvemaybay]' LIMIT 1";
    $query_sua_ve = mysqli_query($mysqli,$sql_sua_ve);
?>
<p>Sửa Thông tin vé máy bay</p>


<table border="1px" width="100%" style="border-collapse: collapse;">
  <?php
  while($row = mysqli_fetch_array($query_sua_ve)){

  ?>
 <form action="modules/quanlyvemaybay/xuly.php?idvemaybay=<?php echo $row['id_vemaybay'] ?>" method="POST" enctype="multipart/form-data">
  <tr>
    <td>Địa điểm đi</td>
   <td><input type="text" value="<?php echo $row['diadiemdi'] ?>"  name="diadiemdi"></td>
  </tr>
  <tr>
    <td>Địa điểm đến</td>
   <td><input type="text" value="<?php echo $row['diadiemden'] ?>" name="diadiemden"></td>
  </tr>
  <tr>
    <td>Giá vé</td>
   <td><input type="text" value="<?php echo $row['giave'] ?>" name="giave"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
   <td>
    <input type="file" name="hinhanh">
    <img src="modules/quanlyvemaybay/uploads/<?php echo $row['hinhanh']?>" width="100" height="100">
  </td>
  </tr>
   
  </tr>
  <tr>
    
   <td><input type="submit" name="suavemaybay" value="Sửa thông tin vé máy bay"></td>
  </tr>
  </form> 
  <?php
  }
  ?>
</table>

