<?php
session_start();

// Kết nối cơ sở dữ liệu
$mysqli = mysqli_connect("localhost", "root", "", "web_dulich");
if (!$mysqli) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['themgiohang'])) {
    $id = $_POST['hotel_id'];
    $soluong = 1;

    // Lấy thông tin khách sạn từ DB
    $sql = "SELECT * FROM khachsan WHERE idKhachSan='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = array(
            array(
                'tenKhachSan' => $row['tenKhachSan'],
                'id' => $id,
                'soluong' => $soluong,
                'gia' => $row['gia'],
                'hinhanh' => $row['hinhanh'],
                'diaChi' => $row['diaChi']
            )
        );

        // Kiểm tra Session giỏ hàng
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    $product[] = array(
                        'tenKhachSan' => $cart_item['tenKhachSan'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'] + 1,
                        'gia' => $cart_item['gia'],
                        'hinhanh' => $cart_item['hinhanh'],
                        'diaChi' => $cart_item['diaChi']
                    );
                    $found = true;
                } else {
                    $product[] = $cart_item;
                }
            }

            if (!$found) {
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
