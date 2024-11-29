<?php
// Kết nối cơ sở dữ liệu
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'web_dulich'; // Thay bằng tên cơ sở dữ liệu của bạn

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn danh sách đơn hàng
$sql = "SELECT donhang.donhang_id, donhang.mahang, khachhang.name, donhang.ngaythang, donhang.tinhtrang 
        FROM donhang 
        JOIN khachhang ON donhang.khachhang_id = khachhang.khachhang_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Danh sách đơn hàng</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Ngày đặt</th>
                <th>Tình trạng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['donhang_id'] ?></td>
                        <td><?= $row['mahang'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['ngaythang'] ?></td>
                        <td><?= $row['tinhtrang'] == 0 ? 'Chờ xử lý' : 'Hoàn thành' ?></td>
                        <td>
                            <a href="order_details.php?id=<?= $row['donhang_id'] ?>">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Không có đơn hàng nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
