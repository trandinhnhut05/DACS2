<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_dulich";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra tham số GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Truy vấn lấy dữ liệu chi tiết
$sql = "SELECT tieude, noidung, hinhanh FROM uudai WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Ưu Đãi</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .promotion-detail { max-width: 600px; margin: auto; text-align: center; }
        .promotion-detail img { width: 100%; border-radius: 10px; }
        .promotion-detail h2 { font-size: 24px; margin-top: 20px; color: #333; }
        .promotion-detail p { font-size: 16px; color: #555; margin-top: 10px; }
        .btn-back { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #007BFF; color: #fff; text-decoration: none; border-radius: 5px; }
        .btn-back:hover { background: #0056b3; }
    </style>
</head>
<body>
    <?php if ($data): ?>
        <div class="promotion-detail">
            <img src="<?php echo htmlspecialchars($data['hinhanh']); ?>" alt="Promotion Image">
            <h2><?php echo htmlspecialchars($data['tieude']); ?></h2>
            <p><?php echo htmlspecialchars($data['noidung']); ?></p>
            <a href="index.php" class="btn-back">Quay lại</a>
        </div>
    <?php else: ?>
        <p>Ưu đãi không tồn tại.</p>
        <a href="index.php" class="btn-back">Quay lại</a>
    <?php endif; ?>
</body>
</html>
