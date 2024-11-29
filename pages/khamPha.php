<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám phá</title>
    <!-- <link rel="stylesheet" href="../../assets/css/style2.css">
    <link rel="stylesheet" href="../../assets/css/reponsive.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="stylesheet" href="../../assets/fonts/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../assets/cssKhamPha/style.css">
</head> -->

<body>
    <?php include("menu.php"); ?>
    <div class="main">
        <div class="part-slide">
            <div class="container">
                <div class="slide">
                    <div class="item"
                        style="background-image: url(https://ik.imagekit.io/tvlk/blog/2022/02/dia-diem-du-lich-viet-nam-cover.jpeg);">
                        <div class="content">
                            <div class="name">cầu vàng, đà nẵng</div>
                            <div class="des">Cầu Vàng Đà Nẵng, nằm ở Bà Nà Hills, nổi bật với thiết kế đôi bàn tay khổng lồ nâng đỡ cầu đi bộ dài 150 mét. Nằm ở độ cao 1.400 mét, cầu này thu hút du khách bởi kiến trúc độc đáo và khung cảnh tuyệt đẹp.</div>

                        </div>
                    </div>
                    <div class="item"
                        style="background-image: url(https://anhdephd.vn/wp-content/uploads/2022/04/anh-hoi-an.jpg);">
                        <div class="content">
                            <div class="name">Phố Cổ Hội, Quảng Nam</div>
                            <div class="des">Phố Cổ Hội An ở Quảng Nam là di sản văn hóa thế giới, nổi tiếng với kiến trúc pha trộn Việt, Trung Quốc, Nhật Bản. Những con phố nhỏ lát gạch, ngôi nhà cổ kính và đèn lồng rực rỡ tạo nên cảnh quan thơ mộng. Đây là điểm đến hấp dẫn, mang lại cảm giác hoài cổ và yên bình.</div>

                        </div>
                    </div>
                    <div class="item"
                        style="background-image: url(https://www.kkday.com/vi/blog/wp-content/uploads/1-231.jpg);">
                        <div class="content">
                            <div class="name">đỉnh fansipan sapa</div>
                            <div class="des">
                                Đỉnh Fansipan ở Sa Pa, Lào Cai, cao 3.147,3 mét, là "Nóc nhà Đông Dương". Nơi đây có cảnh quan hùng vĩ, rừng núi xanh tươi và khí hậu mát mẻ. Du khách có thể leo núi hoặc đi cáp treo để chạm tay vào mây và ngắm dãy Hoàng Liên Sơn.</div>

                        </div>
                    </div>
                    <div class="item"
                        style="background-image: url(https://owa.bestprice.vn/images/articles/uploads/goi-y-lich-trinh-du-lich-ha-long-3-ngay-2-dem-5e8ef394a4cce.jpg);">
                        <div class="content">
                            <div class="name">Vịnh Hạ Long</div>
                            <div class="des">Vịnh Hạ Long ở Quảng Ninh là di sản thiên nhiên thế giới, nổi tiếng với hàng ngàn đảo đá vôi và hang động kỳ vĩ. Nước biển xanh biếc và các hòn đảo độc đáo thu hút du khách, là điểm đến lý tưởng cho du thuyền và khám phá thiên nhiên.</div>

                        </div>
                    </div>
                    <div class="item"
                        style="background-image: url(https://ik.imagekit.io/tvlk/blog/2022/11/khu-du-lich-trang-an-2.jpg?tr=dpr-2,w-675);">
                        <div class="content">
                            <div class="name">tràng an, ninh bình</div>
                            <div class="des">Tràng An ở Ninh Bình, là di sản thế giới UNESCO với hệ thống hang động và thung lũng xanh mát. Du khách thường tham quan bằng thuyền, khám phá vẻ đẹp hoang sơ của hang động và dòng sông uốn lượn.</div>

                        </div>
                    </div>
                    <div class="item"
                        style="background-image: url(https://vcdn1-dulich.vnecdn.net/2023/07/21/Langco1-8400-1689668265-9277-1689904738.jpg?w=0&h=0&q=100&dpr=1&fit=crop&s=VPk7_J2c864bctu-6eKH0Q);">
                        <div class="content">
                            <div class="name">Vịnh Lăng cô</div>
                            <div class="des">Vịnh Lăng Cô, nằm ở Huế, là một trong những vịnh đẹp nhất miền Trung Việt Nam. Với bãi biển dài, cát trắng mịn và nước biển trong xanh, vịnh thu hút du khách bởi cảnh quan thiên nhiên tươi đẹp và yên bình. Khu vực này cũng nổi tiếng với các khu resort sang trọng, là điểm đến lý tưởng cho những chuyến nghỉ dưỡng thư giãn và tận hưởng biển xanh, nắng vàng.</div>

                        </div>
                    </div>


                </div>
                <div class="button">
                    <button class="prev"> <i class="ti-arrow-left"></i></button>
                    <button class="next"><i class="ti-arrow-right"></i></button>
                </div>
            </div>
        </div>

    </div>
</body>
<div class="modal js-modal">

    <div class="modal-container">
        <div class="modal-close js-modal-close"> <i class="ti-close"></i></div>
        <header class="modal-header">
            <label for="" class="modal-header">Bạn muốn đi đâu hè này</label>
        </header>
        <div class="modal-body">
            <form action="searchTour" method="POST">
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
            </form>
        </div>
    </div>
</div>
<script src="../../assets/script.js"></script>
<script>
const Explores = document.querySelectorAll('.js-kham-pha');
const modal = document.querySelector('.js-modal');
const modalClose = document.querySelector('.js-modal-close');
function ShowExplore() {
    modal.classList.add ('open');
}; 
function HideExplore() {
    modal.classList.remove ('open');
};
for ( const Explore of Explores) {
    Explore.addEventListener('click', ShowExplore);
};
</script>