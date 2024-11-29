<?php
// xe_detail.php
$conn = mysqli_connect("localhost","root","","web_dulich");

if(isset($_GET['id'])){
    $xe_id = $_GET['id'];
    $sql = "SELECT * FROM xedulich WHERE id_xedulich = '$xe_id'";
    $result = mysqli_query($conn, $sql);
    $xe = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $xe['tenKhachSan']; ?></title>
    <style>
       /* CSS container chính */
#xe-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    max-width: 1200px;
    margin: auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Phần bên trái */
#left-section {
    flex: 1;
    max-width: 400px;
    text-align: center;
    border-right: 1px solid #ddd;
    padding-right: 20px;
}

#left-section img {
    width: 100%;
    max-width: 300px;
    height: auto;
    border-radius: 8px;
}

#left-section h1 {
    font-size: 1.8em;
    margin: 10px 0;
}

#left-section p {
    font-size: 1.2em;
    color: #333;
}

/* Phần bên phải */
#right-section {
    flex: 2;
    padding-left: 20px;
}

#right-section div {
    margin-bottom: 20px;
    padding: 15px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
}

#right-section h2 {
    color: #007BFF;
    margin-bottom: 10px;
    font-size: 1.5em;
}

#right-section ul {
    list-style-type: square;
    margin-left: 20px;
}

#right-section ul li {
    font-size: 1em;
    color: #555;
}

/* Nút đặt phòng */
form input[type="submit"] {
    width: 100%;
    max-width: 200px;
    padding: 10px;
    font-size: 1em;
    color: white;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Media queries cho thiết bị nhỏ */
@media (max-width: 768px) {
    #xe-container {
        flex-direction: column;
    }

    #left-section {
        border-right: none;
        border-bottom: 1px solid #ddd;
        padding-right: 0;
        padding-bottom: 20px;
    }

    #right-section {
        padding-left: 0;
    }
}


    </style>
</head>
<body>
    <div id="xe-container">
        <!-- Bên trái -->
        <div id="left-section">
            <img src="admin/modules/quanlyxedulich/uploads/<?php echo $xe['hinhanh']; ?>" alt="Xe Image">
            <h1><?php echo $xe['tenxedulich']; ?></h1>
            <p><b>Price:</b> <?php echo number_format($xe['gia'], 0, ',', '.'); ?> VND</p>
        </div>

        <!-- Bên phải -->
        <div id="right-section">
            <!-- Mô tả chi tiết -->
            <div id="xe-description">
                <h2>About the Vehicle</h2>
                <p><?php echo $xe['mota']; ?></p>
            </div>

            <!-- Sức chứa -->
            <div id="xe-capacity">
                <h2>Capacity</h2>
                <p>This vehicle can accommodate up to <b><?php echo $xe['succhua']; ?></b> people comfortably.</p>
            </div>

            <!-- Tiện ích -->
            <div id="xe-amenities">
                <h2>Amenities</h2>
                <ul>
                    <?php 
                    $amenities = explode(',', $xe['tienich']);
                    foreach ($amenities as $amenity) {
                        echo "<li>" . htmlspecialchars(trim($amenity)) . "</li>";
                    }
                    ?>
                </ul>
            </div>

            <!-- Đánh giá -->
            <div id="xe-reviews">
                <h2>Customer Ratings</h2>
                <p>Average Rating: <b><?php echo $xe['danhgia']; ?></b>/5</p>
            </div>

            <!-- Booking Button -->
            <form action="pages/main/themgiohangxedulich.php?id=<?php echo $xe['id_xedulich']; ?>" method="post">
                <input type="hidden" name="xe_id" value="<?php echo $xe['id_xedulich']; ?>">
                <input type="submit" name="themgiohang" value="Add to Cart">
            </form>
        </div>
    </div>
</body>


</html>
