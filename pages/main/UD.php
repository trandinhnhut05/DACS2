<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khuyến mãi Du lịch</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reponsive.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css"> -->
    <style>
body {
            font-family: "Catamaran", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

      
        @media screen and (max-width: 715px) {
            .newsletter {
                flex-direction: column;
                align-items: center;
            }

            .newsletter-left {
                margin-bottom: 10px;
                text-align: center;
            }

            .newsletter-right {
                width: 100%;
            }

            .footer-content {
                flex-direction: column;
                align-items: center;
            }

            .footer-main, .links {
                margin: 20px 0;
                text-align: center;
            }
        }


    </style>

</head>
<body>
    
    <main>
        <div class="promotion-container">
            <!-- Phần ưu đãi -->
            <section class="promotion">
                <div class="promotion-image">
                    <img src="https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2022/7/10/hinh-anh-cac-loai-hinh-du-lich-3-1657423025597-1657423027180128362217.jpeg" alt="Travel Promotion">
                </div>
                <div class="promotion-details">
                    <h2>Chào hè cùng chúng tôi</h2>
                    <p>Giảm giá 30% cho tất cả các tour du lịch mùa hè. Đừng bỏ lỡ cơ hội trải nghiệm những điểm đến tuyệt vời!</p>
                    <a href="#" class="btn">Xem chi tiết</a>
                </div>
            </section>
            <section class="promotion">
                <div class="promotion-image">
                    <img src="https://sakos.vn/wp-content/uploads/2022/12/WTTC-Gives-Seven-More-Countries-Safe-Travel-Stamp-2-2.jpg" alt="Travel Promotion">
                </div>
                <div class="promotion-details">
                    <h2>Khám phá vùng đất mới</h2>
                    <p>Đặt tour trước 31/05/2024 và nhận ngay voucher giảm giá 500,000 VNĐ cho lần du lịch tiếp theo.</p>
                    <a href="#" class="btn">Xem chi tiết</a>
                </div>
            </section>
            <section class="promotion">
                <div class="promotion-image">
                    <img src="https://bcp.cdnchinhphu.vn/334894974524682240/2024/4/24/tai-sao-nen-lua-chon-di-du-lich-trong-nuoc-4-17139433087101540341217.jpg" alt="Travel Promotion">
                </div>
                <div class="promotion-details">
                    <h2>Khám phá văn hóa độc đáo</h2>
                    <p>Khám phá những nền văn hóa độc đáo và thú vị trên khắp thế giới với các tour du lịch đặc biệt.</p>
                    <a href="#" class="btn">Xem chi tiết</a>
                </div>  
            </section>
        </div>
        <!-- Phần quà tặng và chương trình đặc biệt -->
        <div class="promotion-special">
            <section class="promotion">
                <div class="promotion-image">
                    <img src="https://vietnamembassy-philippines.org/wp-content/uploads/2020/06/tour-du-lich-mien-trung-nen-di-vao-thoi-gian-nao-la-dep-nhat-min.jpg" alt="Gift Promotion">
                </div>
                <div class="promotion-details">
                    <h2>Quà tặng hấp dẫn</h2>
                    <p>Nhận ngay một món quà đặc biệt khi đặt tour trong tháng này. Số lượng có hạn, hãy nhanh tay đặt tour ngay!</p>
                    <a href="#" class="btn">Xem chi tiết</a>
                </div>
            </section>
            <section class="promotion">
                <div class="promotion-image">
                    <img src="https://vietnamembassy-philippines.org/wp-content/uploads/2020/06/tour-du-lich-mien-trung-nen-di-vao-thoi-gian-nao-la-dep-nhat-1-min.jpg" alt="Special Program Promotion">
                </div>
                <div class="promotion-details">
                    <h2>Chương trình đặc biệt</h2>
                    <p>Tham gia chương trình du lịch đặc biệt và nhận những trải nghiệm khó quên cùng với những ưu đãi hấp dẫn.</p>
                    <a href="#" class="btn">Xem chi tiết</a>
                </div>
            </section>
        </div>
    </main>
   
</body>
<div class="modal js-modal">
    <div class="modal-container">
        <div class="modal-close js-modal-close"> <i class="ti-close"></i></div>
        <header class="modal-header">
            <label for="" class="modal-header">Bạn muốn đi đâu hè này</label>
        </header>
        <div class="modal-body">
            <label for="address" class="modal-label">Địa điểm</label>
            <select name="" id="address" class="modal-input">
                <option value="#">--Chọn địa điểm--</option>
            </select>
            <label for="number" class="modal-label">Số người</label>
            <input type="number" min="1" id="number" max="10" placeholder="Bạn đi bao nhiêu người" class="modal-input">
            <label for="Start" class="modal-label">Thời gian khởi hành</label>
            <input type="date" id="Start" class="modal-input">
            <label for="End" class="modal-label">Thời gian kết thúc</label>
            <input type="date" id="End" class="modal-input">     
            <button id="Search">Tìm kiếm</button>
        </div>
    </div>
</div>
<script src="assets/script.js"></script>
</html>
