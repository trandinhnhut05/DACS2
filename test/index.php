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

// Truy vấn lấy dữ liệu từ bảng `uudai`
$sql = "SELECT * FROM uudai";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ưu Đãi Du Lịch</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .promotion-container { display: flex; flex-wrap: wrap; gap: 20px; }
        .promotion { border: 1px solid #ccc; padding: 15px; border-radius: 5px; width: 300px; }
        .promotion img { width: 100%; border-radius: 5px; }
        .promotion h2 { font-size: 18px; color: #333; margin-top: 10px; }
        .promotion p { font-size: 14px; color: #555; }
        .btn { display: inline-block; margin-top: 10px; padding: 10px 15px; background: #007BFF; color: #fff; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <main>
        <div class="promotion-container">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <section class="promotion">
                        <img src="<?php echo htmlspecialchars($row['hinhanh']); ?>" alt="Promotion Image">
                        <h2><?php echo htmlspecialchars($row['tieude']); ?></h2>
                        <p><?php echo htmlspecialchars($row['tomtat']); ?></p>
                        <a href="chitiet.php?id=<?php echo $row['id']; ?>" class="btn">Xem chi tiết</a>
                    </section>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Không có ưu đãi nào được tìm thấy.</p>
            <?php endif; ?>
            <?php $conn->close(); ?>
        </div>
    </main>
</body>
</html>
