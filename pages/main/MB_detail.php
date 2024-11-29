<?php
// hotel_detail.php
$conn = mysqli_connect("localhost","root","","web_dulich");

if(isset($_GET['id'])){
    $vemaybay_id = $_GET['id'];
    $sql = "SELECT * FROM vemaybay WHERE id_vemaybay = '$vemaybay_id'";
    $result = mysqli_query($conn, $sql);
    $vemaybay = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $vemaybay['tenKhachSan']; ?></title>
    <style>
        /* Container Styling */
#vemaybay-details {
    display: flex;
    flex-wrap: wrap;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    gap: 20px;
}

/* Left Column */
.left-column {
    flex: 1;
    max-width: 40%;
    text-align: center;
}

.left-column img {
    border-radius: 8px;
    width: 100%;
    height: 200px;
    margin-bottom: 20px;
}

.left-column h1 {
    color: #0073e6;
    margin: 10px 0;
    font-size: 1.5rem;
}

.left-column p {
    font-size: 1.2rem;
    font-weight: bold;
    color: #0073e6;
}

/* Right Column */
.right-column {
    flex: 2;
    max-width: 60%;
}

.right-column h2 {
    margin-bottom: 10px;
    color: #555;
    font-size: 1.5rem;
}

.right-column p {
    margin-bottom: 10px;
    font-size: 1.1rem;
    color: #555;
}

.right-column p strong {
    color: #333;
}

/* Booking Button */
.right-column form input[type="submit"] {
    background-color: #0073e6;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.right-column form input[type="submit"]:hover {
    background-color: #005bb5;
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 768px) {
    #vemaybay-details {
        flex-direction: column;
        gap: 10px;
    }

    .left-column,
    .right-column {
        max-width: 100%;
    }
}

    </style>
</head>
<body>
<div id="vemaybay-details">
    <div class="left-column">
        <img src="admin/modules/quanlyvemaybay/uploads/<?php echo $vemaybay['hinhanh']; ?>" alt="vemaybay Image">
        <h1><?php echo $vemaybay['diadiemdi'] ?> → <?php echo $vemaybay['diadiemden'] ?> </h1>
        <p>Price: <?php echo number_format($vemaybay['giave'], 0, ',', '.'); ?> VND</p>
    </div>
    <div class="right-column">
        <h2>Thông tin vé máy bay</h2>
        <p><strong>Hãng bay:</strong> <?php echo $vemaybay['hanghangkhong']; ?></p>
        <p><strong>Thời gian bay:</strong> <?php echo date('H:i - d/m/Y', strtotime($vemaybay['thoigianbay'])); ?></p>
        <p><strong>Mô tả:</strong> <?php echo $vemaybay['mota']; ?></p>

        <!-- Booking Button -->
        <form action="pages/main/themgiohangmb.php?id=<?php echo $vemaybay['id_vemaybay']?>" method="post">
            <input type="hidden" name="vemaybay_id" value="<?php echo $vemaybay['id_vemaybay']; ?>">
            <input type="submit" name="themgiohang" value="Đặt vé máy bay">
        </form>
    </div>
</div>

</body>

</html>
