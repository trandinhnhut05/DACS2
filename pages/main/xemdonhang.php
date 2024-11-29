<?php
$con = mysqli_connect("localhost", "root", "", "web_dulich");

if (!$con) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

if (!isset($_SESSION['dangky'])) {
    header("Location: index.php?dream=dangky");
    exit;
}

if (isset($_SESSION['khachhang_id'])) {
    $id_khachhang = $_SESSION['khachhang_id'];
} else {
    die("Lỗi: Không tìm thấy ID khách hàng. Vui lòng đăng nhập lại.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    color: #333;
}

h3.tittle-w3l {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 2rem;
    text-transform: uppercase;
    position: relative;
}

h3.tittle-w3l::after {
    content: "";
    width: 50px;
    height: 3px;
    background-color: #007bff;
    display: block;
    margin: 10px auto;
}

.table {
    width: 100%;
    margin: 20px 0;
    border-collapse: collapse;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.table th, .table td {
    text-align: center;
    padding: 12px;
    border: 1px solid #ddd;
}

.table th {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tr:hover {
    background-color: #f1f1f1;
}

a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

p {
    font-size: 1rem;
    line-height: 1.6;
    margin: 15px 0;
}

.ads-grid {
    padding: 20px 0;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

.wrapper {
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.row {
    display: flex;
    flex-wrap: wrap;
    margin: -10px;
}

.col-md-12 {
    flex: 1 1 100%;
    padding: 10px;
}

@media (max-width: 768px) {
    h3.tittle-w3l {
        font-size: 1.5rem;
    }

    .table th, .table td {
        padding: 8px;
        font-size: 0.9rem;
    }
}

    </style>
</head>
<body>

<?php
	$con = mysqli_connect("localhost", "root", "", "web_dulich");
	if (isset($_GET['huydon']) && isset($_GET['magiaodich'])) {
		$huydon = $_GET['huydon'];
		$magiaodich = $_GET['magiaodich'];
	} else {
		$huydon = '';
		$magiaodich = '';
	}
	$sql_update_donhang = mysqli_query($con, "UPDATE donhang SET huydon='$huydon' WHERE mahang='$magiaodich'");
	$sql_update_giaodich = mysqli_query($con, "UPDATE giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
?>
<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem đơn hàng</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						
							<div class="row">
								<?php
								if(isset($_SESSION['dangnhap'])){
									echo 'Đơn hàng : '.$_SESSION['dangnhap'];
								} 
								?>
							<div class="col-md-12">
								
								<?php
								if(isset($_GET['khachhang'])){
									$id_khachhang = $_GET['khachhang'];
								}else{
									$id_khachhang = '';
								}
								$sql_select = mysqli_query($con,"SELECT * FROM giaodich WHERE giaodich.khachhang_id='$id_khachhang' GROUP BY giaodich.magiaodich"); 
								?> 
								<table class="table table-bordered ">
									<tr>
										<th>Thứ tự</th>
										<th>Mã giao dịch</th>
									
										<th>Ngày đặt</th>
										<th>Quản lý</th>
										<th>Tình trạng</th>
										<th>Yêu cầu</th>
									</tr>
									<?php
									$i = 0;
									while($row_donhang = mysqli_fetch_array($sql_select)){ 
										$i++;
									?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['magiaodich']; ?></td>
									
										
										<td><?php echo $row_donhang['ngaythang'] ?></td>
										<td><a href="index.php?dream=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>">Xem chi tiết</a></td>
										<td><?php 
										if($row_donhang['tinhtrangdon']==0){
											echo 'Đã đặt hàng';
										}else{
											echo 'Đã xử lý | Đang giao hàng';
										}
										?></td>
										<td>
											<?php
											if($row_donhang['huydon']==0){ 
											?>
											<a href="index.php?dream=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>&huydon=1">Yêu cầu hủy</a>
											<?php
										}elseif($row_donhang['huydon']==1){											
											?>
											<p>Đang chờ hủy...</p>
											<?php
											}else{
												echo 'Đã hủy';
											}
											?>
										</td>
									</tr>
									 <?php
									} 
									?> 
								</table>
							</div>


							<div class="col-md-12">
    <p>Chi tiết đơn hàng</p><br>
    <?php
    if (isset($_GET['magiaodich'])) {
        $magiaodich = $_GET['magiaodich'];
    } else {
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

						
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				
			</div>
		</div>
	</div>
	<!-- //top products -->
    </body>
    </html>