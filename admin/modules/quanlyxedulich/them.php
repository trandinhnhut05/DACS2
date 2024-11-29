<p>Thêm thông tin xe du lịch</p>

<form action="modules/quanlyxedulich/xuly.php" method="POST" enctype="multipart/form-data">
  <table border="1px" width="100%" style="border-collapse: collapse;">
    <tr>
      <td>Tên xe du lịch</td>
      <td><input type="text" name="tenxedulich"></td>
    </tr>
    <tr>
      <td>Địa chỉ giao</td>
      <td><input type="text" name="diachigiao"></td>
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
      <td>Mẫu xe</td>
      <td><input type="text" name="loaixe"></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center;">
        <input type="submit" name="themxedulich" value="Thêm xe du lịch">
      </td>
    </tr>
   
  </table>
</form>
