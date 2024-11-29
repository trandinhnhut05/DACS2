<?php

$con = mysqli_connect("localhost", "root", "", "web_dulich");

// Kiểm tra kết nối cơ sở dữ liệu
if (!$con) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Kiểm tra đăng nhập
if (!isset($_SESSION['dangky'])) {
    $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id']; // Đảm bảo giá trị được gán đúng.

    header("Location: index.php?dream=dangky");
    exit;
}

// Lấy ID khách hàng
$id_khachhang = $_SESSION['khachhang_id'];

// Tạo mã giao dịch duy nhất
$magiaodich = 'GD' . time();

// Lưu thông tin đơn hàng vào bảng `donhang`
if (isset($_SESSION['cartmb'])) {
    foreach ($_SESSION['cartmb'] as $item) {
        $id = $item['id'];
        $soluong = $item['soluong'];
        $sql_donhang = "INSERT INTO donhang (sanpham_id, soluong, mahang, khachhang_id, ngaythang, tinhtrang, huydon) 
                        VALUES ('$id', '$soluong', '$magiaodich', '$id_khachhang', NOW(), '$tinhtrang', '$huydon')";
        if (!mysqli_query($con, $sql_donhang)) {
            die("Lỗi lưu đơn hàng: " . mysqli_error($con));
        }
    }
}
// Lặp tương tự cho cartks và cartxe

// Lưu chi tiết giao dịch vào bảng `giaodich`
if (isset($_SESSION['cartmb'])) {
    foreach ($_SESSION['cartmb'] as $item) {
        $id = $item['id'];
        $soluong = $item['soluong'];
        $sql = "INSERT INTO giaodich (magiaodich, khachhang_id, sanpham_id, soluong, ngaythang, loai) 
                VALUES ('$magiaodich', '$id_khachhang', '$id', '$soluong', NOW(), 'vé máy bay')";
        if (!mysqli_query($con, $sql)) {
            die("Lỗi lưu giao dịch vé máy bay: " . mysqli_error($con));
        }
    }
}
if (isset($_SESSION['cartks'])) {
    foreach ($_SESSION['cartks'] as $item) {
        $id = $item['id'];
        $soluong = $item['soluong'];
        $sql = "INSERT INTO giaodich (magiaodich, khachhang_id, sanpham_id, soluong, ngaythang, loai) 
                VALUES ('$magiaodich', '$id_khachhang', '$id', '$soluong', NOW(), 'khách sạn')";
        if (!mysqli_query($con, $sql)) {
            die("Lỗi lưu giao dịch khách sạn: " . mysqli_error($con));
        }
    }
}
if (isset($_SESSION['cartxe'])) {
    foreach ($_SESSION['cartxe'] as $item) {
        $id = $item['id'];
        $soluong = $item['soluong'];
        $sql = "INSERT INTO giaodich (magiaodich, khachhang_id, sanpham_id, soluong, ngaythang, loai) 
                VALUES ('$magiaodich', '$id_khachhang', '$id', '$soluong', NOW(), 'xe du lịch')";
        if (!mysqli_query($con, $sql)) {
            die("Lỗi lưu giao dịch xe du lịch: " . mysqli_error($con));
        }
    }
}

// Xóa giỏ hàng
unset($_SESSION['cartmb']);
unset($_SESSION['cartks']);
unset($_SESSION['cartxe']);

// Điều hướng người dùng đến trang đơn hàng
header("Location: index.php?dream=xemdonhang&khachhang=$id_khachhang");
?>
