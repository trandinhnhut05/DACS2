<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết ưu đãi</title>
    <style>/* Reset cơ bản */
body, h1, h2, p, a, ul, li {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    color: #333;
    background-color: #f4f4f4;
}

/* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background: #0288d1;
    color: white;
}

header .logo img {
    max-height: 50px;
}

header nav ul {
    list-style: none;
    display: flex;
    gap: 15px;
}

header nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
    padding: 5px 10px;
    transition: background 0.3s ease;
}

header nav ul li a:hover {
    background: #026ca1;
    border-radius: 5px;
}

/* Banner */
.banner {
    position: relative;
    overflow: hidden;
}

.banner-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    background: rgba(0, 0, 0, 0.5);
    padding: 20px;
    border-radius: 10px;
}

.banner-text h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

.banner-text p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.banner-text .btn {
    background: #ff9800;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.banner-text .btn:hover {
    background: #e68900;
}

/* Promotion Details */
.promotion-details {
    max-width: 800px;
    margin: 20px auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.promotion-details h2 {
    color: #0288d1;
    margin-bottom: 15px;
}

.promotion-details p {
    margin-bottom: 15px;
    font-size: 1.1rem;
    color: #555;
}

.promotion-details .btn {
    display: inline-block;
    background: #0288d1;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1rem;
    transition: background 0.3s ease;
}

.promotion-details .btn:hover {
    background: #026ca1;
}

/* Footer */
footer {
    text-align: center;
    padding: 10px;
    background: #0288d1;
    color: white;
    margin-top: 20px;
}
</style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo Du lịch ABC">
        </div>
        <nav>
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Tour</a></li>
                <li><a href="#">Ưu đãi</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="banner">
        <img src="https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2022/7/10/hinh-anh-cac-loai-hinh-du-lich-3-1657423025597-1657423027180128362217.jpeg" alt="Travel Promotion" class="banner-image">
            <div class="banner-text">
                <h1>Khuyến mãi mùa hè - Giảm 30%</h1>
                <p>Khám phá những điểm đến mơ ước với giá hấp dẫn.</p>
                <a href="#" class="btn">Đặt Tour Ngay</a>
            </div>
        </div>
        <section class="promotion-details">
            <h2>Chào hè cùng chúng tôi</h2>
            <p>
                Hãy cùng chúng tôi chào đón mùa hè sôi động với ưu đãi giảm giá 30% cho tất cả các tour du lịch. 
                Đừng bỏ lỡ cơ hội khám phá những điểm đến tuyệt vời như Đà Nẵng, Phú Quốc, Nha Trang, và nhiều địa danh hấp dẫn khác!
            </p>
            <p>
                Ưu đãi chỉ áp dụng từ ngày <strong>1/6/2024</strong> đến <strong>31/8/2024</strong>. Hãy nhanh tay đặt ngay hôm nay để không bỏ lỡ!
            </p>
            <a href="#" class="btn">Xem thêm</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Công ty Du lịch ABC. Tất cả quyền được bảo lưu.</p>
    </footer>
</body>
</html>
