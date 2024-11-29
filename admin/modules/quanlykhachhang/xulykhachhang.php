
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Khách hàng</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-12">
				<h4>Khách hàng</h4>
				<?php
				$con = mysqli_connect("localhost","root","","web_dulich");
				$sql_select_khachhang = mysqli_query($con,"SELECT * FROM khachhang,giaodich WHERE khachhang.khachhang_id=giaodich.khachhang_id GROUP BY giaodich.magiaodich ORDER BY khachhang.khachhang_id DESC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên khách hàng</th>
						<th>Số điện thoại</th>
						<th>Địa chỉ</th>
						<th>Email</th>
						<th>Ngày mua</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_khachhang = mysqli_fetch_array($sql_select_khachhang)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						
						<td><?php echo $row_khachhang['name']; ?></td>
						<td><?php echo $row_khachhang['phone']; ?></td>
						<td><?php echo $row_khachhang['address']; ?></td>
						
						<td><?php echo $row_khachhang['email'] ?></td>
						<td><?php echo $row_khachhang['ngaythang'] ?></td>
						<td><a href="?action=quanlykhachhang&query=xemgiaodich&khachhang=<?php echo $row_khachhang['magiaodich'] ?>">Xem giao dịch</a> || <a href="">Xóa</a></td>
					</tr>
					 <?php
					} 
					?> 
				</table>
			</div>
    

			<div class="col-md-12">
				<h4>Liệt kê lịch sử đơn hàng</h4>
				<?php
				if(isset($_GET['khachhang'])){
					$magiaodich = $_GET['khachhang'];
				}else{
					$magiaodich = '';
				}
				$sql_select = "
					SELECT g.magiaodich, v.diadiemdi AS ten, g.soluong, g.ngaythang, 'Vé máy bay' AS loai
					FROM giaodich g
					JOIN vemaybay v ON g.sanpham_id = v.id_vemaybay
					WHERE g.magiaodich = '$magiaodich'
					UNION
					SELECT g.magiaodich, x.tenxedulich AS ten, g.soluong, g.ngaythang, 'Xe du lịch' AS loai
					FROM giaodich g	
					JOIN xedulich x ON g.sanpham_id = x.id_xedulich
					WHERE g.magiaodich = '$magiaodich'
					UNION
					SELECT g.magiaodich, k.tenKhachSan AS ten, g.soluong, g.ngaythang, 'Khách sạn' AS loai
					FROM giaodich g
					JOIN khachsan k ON g.sanpham_id = k.idKhachSan
					WHERE g.magiaodich = '$magiaodich'
					ORDER BY ngaythang DESC";
					$result = mysqli_query($con, $sql_select);
				?> 
				<table class="table table-bordered">
        <tr>
            <th>Thứ tự</th>
            <th>Mã giao dịch</th>
            <th>Tên sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Số lượng</th>
            <th>Ngày đặt</th>
        </tr>
        <?php
        $i = 0;
        while ($row_donhang = mysqli_fetch_array($result)) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row_donhang['magiaodich']; ?></td>
                <td><?php echo $row_donhang['ten']; ?></td>
                <td><?php echo $row_donhang['loai']; ?></td>
                <td><?php echo $row_donhang['soluong']; ?></td>
                <td><?php echo $row_donhang['ngaythang']; ?></td>
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