
<?php 
$con=mysqli_connect("localhost","root","","web_dulich");
if(isset($_POST['capnhatdonhang'])){
	$xuly = $_POST['xuly'];
	$mahang = $_POST['mahang_xuly'];
	$sql_update_donhang = mysqli_query($con,"UPDATE donhang SET tinhtrang='$xuly' WHERE mahang='$mahang'");
	$sql_update_giaodich = mysqli_query($con,"UPDATE giaodich SET tinhtrangdon='$xuly' WHERE magiaodich='$mahang'");
}

?>
<?php
	if(isset($_GET['xoadonhang'])){
		$mahang = $_GET['xoadonhang'];
		$sql_delete = mysqli_query($con,"DELETE FROM donhang WHERE mahang='$mahang'");
		header('Location:xulydonhang.php');
	} 
	if(isset($_GET['xacnhanhuy'])&& isset($_GET['mahang'])){
		$huydon = $_GET['xacnhanhuy'];
		$magiaodich = $_GET['mahang'];
	}else{
		$huydon = '';
		$magiaodich = '';
	}
	$sql_update_donhang = mysqli_query($con,"UPDATE donhang SET huydon='$huydon' WHERE mahang='$magiaodich'");
	$sql_update_giaodich = mysqli_query($con,"UPDATE giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đơn hàng</title>
<style>/* Reset cơ bản */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Thiết lập cho body */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 20px;
}

/* Bố cục container */
.container-fluid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

/* Các cột */
.col-md-7, .col-md-5 {
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

/* Tiêu đề */
h4, p {
    color: #333;
    font-size: 18px;
    margin-bottom: 15px;
}

/* Table Style */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

.table th {
    background-color: #f1f1f1;
    font-weight: bold;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #f1f1f1;
}

/* Button Style */
button, .btn {
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover, .btn:hover {
    background-color: #218838;
}

/* Form Styles */
select, input[type="text"], input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

/* Link Styles */
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Xử lý việc hover ở các cột */
.table a {
    color: #007bff;
}

.table a:hover {
    color: #0056b3;
}

/* Tạo sự rõ ràng cho các trạng thái đơn hàng */
.tinhtrang {
    font-weight: bold;
}

.tinhtrang.chuaxuly {
    color: red;
}

.tinhtrang.daxuly {
    color: green;
}

/* Xử lý khoảng cách cho các phần tử */
.row {
    margin-bottom: 30px;
}

/* Thiết lập cho các thiết bị nhỏ */
@media (max-width: 768px) {
    .container-fluid {
        flex-direction: column;
    }

    .col-md-7, .col-md-5 {
        width: 100%;
        margin-bottom: 20px;
    }
}
</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			 <?php
				if (isset($_GET['mahang'])) {
					$mahang = $_GET['mahang'] ?? '';
					$sql_chitiet = "
						SELECT g.mahang, v.diadiemdi AS ten, g.soluong, g.ngaythang, 'Vé máy bay' AS loai, v.giave AS gia
						FROM donhang g
						JOIN vemaybay v ON g.sanpham_id = v.id_vemaybay
						WHERE g.mahang = '$mahang'
						UNION
						SELECT g.mahang, x.tenxedulich AS ten, g.soluong, g.ngaythang, 'Xe du lịch' AS loai, x.gia AS gia
						FROM donhang g	
						JOIN xedulich x ON g.sanpham_id = x.id_xedulich
						WHERE g.mahang = '$mahang'
						UNION
						SELECT g.mahang, k.tenKhachSan AS ten, g.soluong, g.ngaythang, 'Khách sạn' AS loai, k.gia AS gia
						FROM donhang g
						JOIN khachsan k ON g.sanpham_id = k.idKhachSan
						WHERE g.mahang = '$mahang'
					";
				
					$result_chitiet = mysqli_query($con, $sql_chitiet);
			?>
					<div class="col-md-7">
						<p>Xem chi tiết đơn hàng</p>
						<table class="table table-bordered">
							<tr>
								<th>Thứ tự</th>
								<th>Loại sản phẩm</th>
								<th>Tên sản phẩm</th>
								<th>Số lượng</th>
								<th>Giá</th>
								<th>Tổng tiền</th>
								<th>Ngày đặt</th>
							</tr>
							<?php
							$i = 0;
							while($row = mysqli_fetch_assoc($result_chitiet)) {
								$i++;
								$tongtien = $row['gia'] * $row['soluong'];
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $row['loai']; ?></td>
								<td><?php echo $row['ten']; ?></td>
								<td><?php echo $row['soluong']; ?></td>
								<td><?php echo number_format($row['gia']).' VNĐ'; ?></td>
								<td><?php echo number_format($tongtien).' VNĐ'; ?></td>
								<td><?php echo $row['ngaythang']; ?></td>
							</tr>
							<?php
							}
							?>
						</table>
					</div>
					<?php

				?>

				<select class="form-control" name="xuly">
					<option value="1">Đã xử lý | Giao hàng</option>
					<option value="0">Chưa xử lý</option>
				</select><br>

				<input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
			</form>
				</div>  
			<?php
			}else{
				?> 
				
				<div class="col-md-7">
					<p>Đơn hàng</p>
				</div>  
				<?php
			} 
			
				?> 
			<div class="col-md-5">
				<h4>Liệt kê đơn hàng</h4>
				<?php
				
				$sql_select = mysqli_query($con, "
					SELECT dh.mahang, dh.tinhtrang, kh.name, dh.ngaythang, dh.huydon
					FROM donhang dh
					JOIN khachhang kh ON dh.khachhang_id = kh.khachhang_id
					GROUP BY dh.mahang
				");
				
				
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã hàng</th>
						<th>Tình trạng đơn hàng</th>
						<th>Tên khách hàng</th>
						<th>Ngày đặt</th>
						<!-- <th>Ghi chú</th> -->
						<th>Hủy đơn</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_donhang = mysqli_fetch_array($sql_select)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						
						<td><?php echo $row_donhang['mahang']; ?></td>
						<td><?php
							if($row_donhang['tinhtrang']==0){
								echo 'Chưa xử lý';
							}else{
								echo 'Đã xử lý';
							}
						?></td>
						<td><?php echo $row_donhang['name']; ?></td>
						
						<td><?php echo $row_donhang['ngaythang'] ?></td>
						<!-- <td><?php echo $row_donhang['note'] ?></td> -->
						<td><?php if($row_donhang['huydon']==0){ }elseif($row_donhang['huydon']==1){
							echo '<a href="xulydonhang.php?action=xemdonhang&mahang='.$row_donhang['mahang'].'&xacnhanhuy=2">Xác nhận hủy đơn</a>';
						}else{
							echo 'Đã hủy';
						} 
						?></td>

						<td><a href="?xoadonhang=<?php echo $row_donhang['mahang'] ?>">Xóa</a> || <a href="?action=quanlydonhang&query=donhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem </a></td>
					</tr>
					 <?php
					} 
					?> 
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>