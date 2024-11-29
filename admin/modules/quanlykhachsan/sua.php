<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<?php
    $mysqli = mysqli_connect("localhost","root","","web_dulich");
    $sql_sua_ks = "SELECT * FROM khachsan WHERE idKhachSan = '$_GET[idkhachsan]' LIMIT 1";
    $query_sua_ks = mysqli_query($mysqli,$sql_sua_ks);
?>
<p>Sửa Thông tin khách sạn</p>


<table border="1px" width="100%" style="border-collapse: collapse;">
  <?php
  while($row = mysqli_fetch_array($query_sua_ks)){

  ?>
 <form action="modules/quanlykhachsan/xuly.php?idkhachsan=<?php echo $row['idKhachSan'] ?>" method="POST" enctype="multipart/form-data">
  <tr>
    <td>Tên Khách sạn</td>
   <td><input type="text" value="<?php echo $row['tenKhachSan'] ?>"  name="tenKhachSan"></td>
  </tr>
  <tr>
    <td>Địa chỉ</td>
   <td><input type="text" value="<?php echo $row['diaChi'] ?>" name="diaChi"></td>
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
   
  </tr>
  <tr>
    
   <td><input type="submit" name="suakhachsan" value="Sửa sản phẩm"></td>
  </tr>
  </form> 
  <?php
  }
  ?>
</table>

