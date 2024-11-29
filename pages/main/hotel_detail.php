<?php
// hotel_detail.php
$conn = mysqli_connect("localhost","root","","web_dulich");

if(isset($_GET['id'])){
    $hotel_id = $_GET['id'];
    $sql = "SELECT * FROM khachsan WHERE idKhachSan = '$hotel_id'";
    $result = mysqli_query($conn, $sql);
    $hotel = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $hotel['tenKhachSan']; ?></title>
    <style>/* Body Styling */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
    color: #333;
}

/* Container Styling */
#hotel-details-container {
    display: flex;
    max-width: 1200px;
    margin: 30px auto;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    gap: 20px;
}

/* Left Section: Image, Name, Price */
#hotel-left {
    flex: 1;
    text-align: center;
}

#hotel-left img {
    max-width: 100%;
    border-radius: 10px;
    margin-bottom: 20px;
}

#hotel-left h1 {
    font-size: 1.8rem;
    color: #0073e6;
    margin-bottom: 10px;
}

#hotel-left p {
    font-size: 1.2rem;
    color: #333;
}

/* Right Section: Description, Amenities, Reviews */
#hotel-right {
    flex: 2;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

#hotel-right h2 {
    font-size: 1.5rem;
    color: #0073e6;
    margin-bottom: 10px;
}

#hotel-right p, #hotel-right ul {
    font-size: 1.1rem;
}

#hotel-right ul {
    list-style-type: disc;
    padding-left: 20px;
}

#hotel-right ul li {
    margin-bottom: 5px;
}

/* Booking Button */
form input[type="submit"] {
    padding: 10px 20px;
    font-size: 1.1rem;
    color: #fff;
    background-color: #0073e6;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
}

form input[type="submit"]:hover {
    background-color: #005bb5;
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 768px) {
    #hotel-details-container {
        flex-direction: column;
    }

    #hotel-left, #hotel-right {
        flex: unset;
    }
}
</style>
</head>
<body>
    <div id="hotel-details-container">
        <!-- Left Section: Image, Name, Price -->
        <div id="hotel-left">
            <img src="admin/modules/quanlykhachsan/uploads/<?php echo $hotel['hinhanh']; ?>" alt="Hotel Image">
            <h1><?php echo $hotel['tenKhachSan']; ?></h1>
            <p><strong>Price:</strong> <?php echo number_format($hotel['gia'], 0, ',', '.'); ?> VND</p>
        </div>

        <!-- Right Section: Description, Amenities, Reviews -->
        <div id="hotel-right">
            <!-- Description -->
            <div id="hotel-description">
                <h2>Mô tả</h2>
                <p><?php echo $hotel['mota']; ?></p>
            </div>

            <!-- Amenities -->
            <div id="hotel-amenities">
                <h2>Tiện ích</h2>
                <ul>
                    <?php 
                    $amenities = explode(',', $hotel['tienich']); 
                    foreach ($amenities as $amenity) {
                        echo "<li>" . htmlspecialchars(trim($amenity)) . "</li>";
                    }
                    ?>
                </ul>
            </div>

            <!-- Reviews -->
            <div id="hotel-reviews">
                <h2>Đánh giá</h2>
                <p><strong>Rating:</strong> <?php echo $hotel['danhgia']; ?>/5</p>
            </div>

            <!-- Booking Button -->
            <form action="pages/main/themgiohangks.php?id=<?php echo $hotel['idKhachSan']?>" method="post">
                <input type="submit" name="themgiohang" value="Đặt phòng">
            </form>
        </div>
    </div>
</body>
</html>
