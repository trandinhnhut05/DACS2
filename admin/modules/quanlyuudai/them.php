<p>Thêm sản phẩm</p>

<table border="1px" width="100%" style="border-collapse: collapse;">
 <form action="modules/quanlykhachsan/xuly.php" method="POST" enctype="multipart/form-data">
  <tr>
    <td>Tên Khách sạn</td>
   <td><input type="text" name="tenKhachSan"></td>
  </tr>
  <tr>
    <td>Địa chỉ</td>
   <td><input type="text" name="diaChi"></td>
  </tr>
  <tr>
    <td>Giá</td>
   <td><input type="text" name="gia"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
   <td><input type="file" name="hinhanh"></td>
  </tr>
  <tr>
    <td>Danh mục sản phẩm</td>
   <td><select name="danhmuc" id="">
   <?php
      $mysqli = mysqli_connect("localhost","root","","my_sqli");
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
          ?>
    <option value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['tendanhmu'] ?></option>
    <?php
  }
  ?>
   </select></td>
  </tr>
  <tr>
    <td>Tình trạng</td>
   <td><select name="tinhtrang" id="">
    <option value="1">Kích hoạt</option>
    <option value="0">Ẩn</option>
   </select></td>
  </tr>
  <tr>
    
   <td><input type="submit" name="themkhachsan" value="Thêm sản phẩm"></td>
  </tr>
  </form> 
</table>

