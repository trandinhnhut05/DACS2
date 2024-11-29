<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu Tour</title>
    <link rel="stylesheet" href="style.css">
    <style>body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

.carousel {
    position: relative;
    width: 100%;
    max-width: 1200px;
    margin: 20px auto;
    overflow: hidden;
    border-radius: 10px;
}

.carousel-track {
    display: flex;
    transition: transform 0.5s ease-in-out;
    width: 100%;
}

.carousel-slide {
    min-width: 100%;
    position: relative;
    text-align: center;
}

.carousel-slide img {
    width: 100%;
    height: auto;
    display: block;
}

.slide-caption {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.6);
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
}
</style>
</head>
<body>
    <div class="carousel">
        <div class="carousel-track">
            <div class="carousel-slide">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSffe4Tt-M8lBWXOXfs-8KPRuuY2-JfFn4Dog&s" alt="Tour Miền Bắc">
                <div class="slide-caption">
                    <h2>Tour Miền Bắc</h2>
                    <p>Khám phá vẻ đẹp núi rừng và các di sản văn hóa.</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxsWmcCxCp0SIp3w8a-XaBlSEY-mss6jOhJQ&s" alt="Tour Miền Trung">
                <div class="slide-caption">
                    <h2>Tour Miền Trung</h2>
                    <p>Trải nghiệm biển xanh và những di sản nổi tiếng.</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp-ygPibmjnbYqjrER6rQ3bNpaklQRnTpWag&s" alt="Tour Miền Nam">
                <div class="slide-caption">
                    <h2>Tour Miền Nam</h2>
                    <p>Hành trình sông nước và văn hóa đặc sắc.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="carousel.js"></script>
</body>
</html>
