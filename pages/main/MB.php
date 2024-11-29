<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reponsive.css">
    <link rel="stylesheet" href="assets/cssMB/style.css">
    <link rel="stylesheet" href="assets/cssMB/reponsive.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
       
    .item:hover {
        transform: scale(1.04);
    }
    .pagination {
        text-align: center;
        margin-top: 20px;
    }

    .pagination a {
        display: inline-block;
        margin: 0 5px;
        padding: 10px 15px;
        color: #0288d1;
        text-decoration: none;
        border: 1px solid #0288d1;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .pagination a.active {
        background-color: #0288d1;
        color: white;
        font-weight: bold;
    }

    .pagination a:hover {
        background-color: #026ca1;
        color: white;
    }

 
    </style>
</head>

<body>

    <div class="mainMB_1">
        <div class="all-box">

            <div id="box">
                <form>
                    <table>

                        <tbody>
                            <tr>
                                <td class="td1"></td>
                                <td>
                                    <div class="radio-input">
                                        <label>
                                            <input type="radio" id="value-1" name="value-radio" value="value-1"
                                                checked="">
                                            <span>Vé khứ hồi</span>
                                        </label>
                                        <label>
                                            <input type="radio" id="value-2" name="value-radio" value="value-2">
                                            <span>Vé một chiều</span>
                                        </label>
                                        <span class="selection"></span>
                                    </div>
                                </td>
                                <td class="td1"></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr style="width: 100%;">
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="goiY" style="text-align: left;">       Chọn thành phố
                                    bạn muốn xuất phát:</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="nhap">
                                    <select name="a" class="select" required>
                                        <option value="" disabled="" selected="" hidden="">Bay từ</option>
                                        <option value="a">Huế</option>
                                        <option value="b">Đà Nẵng</option>
                                        <option value="c">Hà Nội</option>
                                        <option value="d">TP. Hồ Chí Minh</option>
                                        <option value="e">Đà Lạt</option>
                                        <option value="f">Phú Quốc</option>
                                        <option value="g">Cần Thơ</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="goiY" style="text-align: left;">       Chọn thành phố
                                    bạn muốn đến:</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="nhap">
                                    <select name="2" class="select" required>
                                        <option value="" disabled="" selected="" hidden=""> Bay đến </option>
                                        <option value="a">Huế</option>
                                        <option value="b">Đà Nẵng</option>
                                        <option value="c">Hà Nội</option>
                                        <option value="d">TP. Hồ Chí Minh</option>
                                        <option value="e">Đà Lạt</option>
                                        <option value="f">Phú Quốc</option>
                                        <option value="g">Cần Thơ</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="hangbay" class="goiY"> Hãng máy bay</label></td>
                                <td><label for="ngaydi" class="goiY">Ngày đi</label></td>
                                <td><label for="ngayvelabel" class="goiY">Ngày về</label></td>

                            </tr>
                            <tr>
                                <td style=" padding-left: 30px">
                                    <select name="3" id="chonhangbay" class="select" style="padding-left: 20px;" required>
                                        <option value="" disabled="" selected="" hidden="">--- Chọn ---</option>
                                        <option value="a">Vietnam Airlines</option>
                                        <option value="a">VietJet Air</option>
                                        <option value="a">Pacific Airlines</option>
                                        <option value="a">Vietravel Airlines</option>
                                        <option value="a">Bamboo Airlines</option>
                                    </select>
                                </td>
                                <td style=" padding-left: 30px"><input type="date" required id="ngaydi" class="select1"
                                        style="width: 89%;"></td>
                                <td style=" padding-left: 30px"><input type="date" required id="ngayve" class="select1"
                                        style="width: 89%;"></td>

                            </tr>
                            <tr>
                                <td class="goiY">Người lớn <br> <i>(&gt;12 tuổi)</i></td>
                                <td class="goiY">Trẻ em <br><i>(2-12 tuổi)</i></td>
                                <td class="goiY">Em bé <br> <i>(0-2 tuổi)</i></td>
                            </tr>
                            <tr>
                                <td style=" padding-left: 30px"><input type="number" min="1" required name="" id="" value="1" class="tuoi">
                                </td>
                                <td style=" padding-left: 30px"><input type="number" min="0" required name="" id="" value="0" class="tuoi">
                                </td>
                                <td style=" padding-left: 30px"><input type="number" min="0" required name="" id="" value="0" class="tuoi">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="3">
                                    <input id="sub" type="submit" value="TÌM KIẾM VÉ">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div class="mainMB_2">
        <div id="sl_hotel">
            <center><b><i class="cbgoiy">Các chuyến bay gợi ý</i></b></center>
            <div class="sug_hotel">
                <div class="re-container">
                    <div class="container-se">
                    <?php
                                 $conn = mysqli_connect("localhost", "root", "", "web_dulich");
                                 $items_per_page = 5;
                                 $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                 $offset = ($current_page - 1) * $items_per_page;
                                 $total_items_query = "SELECT COUNT(*) as total FROM vemaybay";
                                 $result = mysqli_query($conn, $total_items_query);
                                 $row_mabay = mysqli_fetch_assoc($result);
                                 $total_items = $row_mabay['total'];
                                 $total_pages = ceil($total_items / $items_per_page);
                                 $sql = "SELECT * FROM vemaybay LIMIT $items_per_page OFFSET $offset";
                                 $mysql_mb = mysqli_query($conn, $sql);
                                 while($row_mabay=mysqli_fetch_array($mysql_mb)){
                            ?>
                        <div class="item">
                           
                            <div class="card">
                                
                                 
                                <div class="card-body"><a href="?dream=chitietmb&id=<?php echo $row_mabay['id_vemaybay']; ?>"><img
                                            src="admin/modules/quanlyvemaybay/uploads/<?php echo $row_mabay['hinhanh']?>"
                                            alt="" style="width: 100%; height:180px;"></a></div>
                                <div class="card-footer">
                                    <a href="?dream=chitietmb&id=<?php echo $row_mabay['id_vemaybay']; ?>">
                                        <b class="name-hot"><?php echo $row_mabay['diadiemdi'] ?> → <?php echo $row_mabay['diadiemden'] ?> </b> <br>
                                        <div class="giaGoc">1.850.000VNĐ</div>
                                        <div class="giaGiam"><b><?php echo number_format($row_mabay['giave'],0,',','.').'vnđ' ?> </b></div>
                                    </a>
                                </div>
                                
                            </div>
                            
                        </div>
                        <?php
                                }
                            ?>
                      
                    </div>
                    <br>
                <div class="pagination">
                    <?php if ($current_page > 1): ?>
                            <a href="?dream=maybay&page=<?php echo $current_page - 1; ?>" class="prev">Trước</a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?dream=maybay&page=<?php echo $i; ?>" class="page <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>

                        <?php if ($current_page < $total_pages): ?>
                            <a href="?dream=maybay&page=<?php echo $current_page + 1; ?>" class="next">Tiếp</a>
                        <?php endif; 
                    ?>
                </div>
                <br> <br> <br> <br>
                    <script src="crip.js"></script>
                </div>
            </div>

        </div>
    </div>
    <div class="mainc">
        <div class="sug-partner">
            <div class="pic_partner">
                <div class="table-row">
                    <div><img src="https://g-customer360.com/wp-content/uploads/2023/07/1-2.png" alt="" class="pic-par">
                    </div>
                </div>
                <div class="table-row">
                    <div><img src="//file.senbay.vn/Airlines/Logo/DOM/VU.png" alt="" class="pic-par"></div>
                </div>
                <div class="table-row">
                    <div><img src="//file.senbay.vn/Airlines/Logo/DOM/QH.png" alt="" class="pic-par"></div>
                </div>
                <div class="table-row">
                    <div><img src="//file.senbay.vn/Airlines/Logo/DOM/BL.png" alt="" class="pic-par"></div>
                </div>
                <div class="table-row">
                    <div><img src="https://www.senbay.vn/Images/Airlines/Intro/vj-air-logo.png" alt="" class="pic-par">
                    </div>
                </div>
            </div>

            <div class="introduct-par">
                <h2>Đối tác máy bay</h2>
                <br>
                <p>Đối tác máy bay là yếu tố then chốt trong ngành hàng không, góp phần vào sự phát triển và vận hành
                    hiệu quả. Sự hợp tác này giúp mở rộng mạng lưới bay, nâng cao chất lượng dịch vụ và thúc đẩy phát
                    triển công nghệ, đảm bảo an toàn và sự hài lòng của hành khách toàn cầu!</p>
            </div>
        </div>
    </div>


    <div id="footer">
        <div class="service-main">
            <h3 style="padding: 20px;">DỊCH VỤ CỦA CHÚNG TÔI</h3>
            <div class="container-service service-carousel">
                <div class="service">
                    <div class="service-content">
                        <i class="fa-solid fa-users"></i>
                        <h3>Đội ngũ nhân viên chuyên nghiệp</h3>
                    </div>
                    <div class="service-text">Đội ngũ nhân viên chuyên nghiệp của chúng tôi là động lực hàng đầu trong
                        mỗi chuyến đi. Với sự am hiểu sâu sắc về du lịch và tinh thần phục vụ, họ cam kết mang đến trải
                        nghiệm tốt nhất cho mỗi khách hàng.</div>
                </div>
                <div class="service">
                    <div class="service-content">
                        <i class="fa-solid fa-headset"></i>
                        <h3>Hỗ trợ 24/7</h3>
                    </div>
                    <div class="service-text">Đội ngũ nhân viên chuyên nghiệp của chúng tôi không chỉ là đồng đội tận
                        tâm, mà còn là điểm tựa đáng tin cậy cho mọi khách hàng. Với cam kết hỗ trợ 24/7, họ luôn sẵn
                        lòng đáp ứng mọi nhu cầu và giải quyết mọi vấn đề để đảm bảo mỗi chuyến đi diễn ra suôn sẻ và
                        đáng nhớ nhất.</div>
                </div>
                <div class="service">
                    <div class="service-content">
                        <i class="fa-solid fa-shield-check"></i>
                        <h3>Chất lượng dịch vụ</h3>
                    </div>
                    <div class="service-text">Chất lượng dịch vụ là tiêu chí hàng đầu của. Mỗi chuyến đi không chỉ được
                        lên kế hoạch cẩn thận mà còn được thực hiện với sự tận tâm và kinh nghiệm, đảm bảo mang lại sự
                        hài lòng tuyệt đối cho mọi du khách.</div>
                </div>

                <div class="service">
                    <div class="service-content">
                        <i class="fa-solid fa-cart-shopping-fast"></i>
                        <h3>Đặt tour</h3>
                    </div>
                    <div class="service-text">Chất lượng dịch vụ của chúng tôi còn được thể hiện qua dịch vụ đặt tour
                        chuyên nghiệp. Từ việc tư vấn đến việc tổ chức, chúng tôi cam kết mang lại những trải nghiệm du
                        lịch độc đáo và đáng nhớ cho mọi khách hàng.</div>
                </div>
            </div>
        </div>

        <div class="container-footer">
            <div class="footer">
                <div class="newsletter">
                    <div class="newsletter-left">
                        <h2>Đăng ký nhận</h2>
                        <h1>bản tin du lịch</h1>
                    </div>
                    <div class="newsletter-right">
                        <div class="newsletters-input">
                            <input type="text" placeholder="Nhập địa chỉ email của bạn" name="" id="">
                            <button>Gửi</button>
                        </div>
                    </div>
                </div>
                <div class="footer-content">
                    <div class="footer-main">
                        <h2>Dream</h2>
                        <p>Khám phá thế giới cùng chúng tôi, nơi mọi hành trình đều trở nên đáng nhớ.</p>
                        <div class="social-links">
                            <a href="#"><i class="ph-fill ph-instagram-logo"></i></a>
                            <a href="#"><i class="ph-fill ph-twitter-logo"></i></a>
                            <a href="#"><i class="ph-fill ph-tiktok-logo"></i></a>
                            <a href="#"><i class="ph-fill ph-facebook-logo"></i></a>
                        </div>
                    </div>
                    <div class="links">
                        <p>Thông tin</p>
                        <a href="#" class="link">Công ty của chúng tôi</a>
                        <a href="#" class="link">Về chúng tôi</a>
                        <a href="#" class="link">Blog</a>
                    </div>
                    <div class="links">
                        <p>Liên kết hữu ích</p>
                        <a href="#" class="link">Dịch vụ</a>
                        <a href="#" class="link">Hỗ trợ</a>
                        <a href="#" class="link">Điều khoản &amp; Điều kiện</a>
                    </div>
                    <div class="links">
                        <p>Điều hướng</p>
                        <a href="#" class="link">Trang chủ</a>
                        <a href="#" class="link">Giới thiệu</a>
                        <a href="#" class="link">Liên hệ</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

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
                <input type="number" min="1" id="number" max="10" placeholder="Bạn đi bao nhiêu người"
                    class="modal-input">
                <label for="Start" class="modal-label">Thời gian khởi hành</label>
                <input type="date" id="Start" class="modal-input">
                <label for="End" class="modal-label">Thời gian kết thúc</label>
                <input type="date" id="End" class="modal-input">
                <button id="Search">Tìm kiếm</button>
            </div>
        </div>
    </div>
    <script src="assets/script.js"></script>

    <script>
        const container = document.querySelector('.container-se');
        const prevButton = document.getElementById('prevButton-se');
        const nextButton = document.getElementById('nextButton-se');

        function scrollleft() {
            container.scrollLeft -= 260; // Điều chỉnh khoảng cách cuộn
            setTimeout(() => {
                container.classList.remove('scrolling');
            }, 500);
        }

        function scrollRight() {
            container.scrollLeft += 260; // Điều chỉnh khoảng cách cuộn
            setTimeout(() => {
                container.classList.remove('scrolling');
            }, 500);
        }

        // Lắng nghe sự kiện click vào nút "Một chiều"
        document.getElementById('value-2').addEventListener('click', function () {
            // Lấy thẻ label và input[type=date] của ngày về
            var labelNgayVe = document.querySelector('label[for="ngayvelabel"]');
            var inputNgayVe = document.getElementById('ngayve');

            // Ẩn label và input[type=date] của ngày về
            labelNgayVe.style.display = 'none';
            inputNgayVe.style.display = 'none';
        });

        // Lắng nghe sự kiện click vào nút "Khứ hồi"
        document.getElementById('value-1').addEventListener('click', function () {
            // Lấy thẻ label và input[type=date] của ngày về
            var labelNgayVe = document.querySelector('label[for="ngayvelabel"]');
            var inputNgayVe = document.getElementById('ngayve');

            // Hiển thị label và input[type=date] của ngày về
            labelNgayVe.style.display = 'inline-block';
            inputNgayVe.style.display = 'inline-block';
        });


    </script>
    <script>
        const Explores = document.querySelectorAll('.js-kham-pha');
        const modal = document.querySelector('.js-modal');
        const modalClose = document.querySelector('.js-modal-close');
        function ShowExplore() {
            modal.classList.add('open');
        };
        function HideExplore() {
            modal.classList.remove('open');
        };
        for (const Explore of Explores) {
            Explore.addEventListener('click', ShowExplore);
        };

        modalClose.addEventListener('click', HideExplore);
    </script>
</body>

</html>