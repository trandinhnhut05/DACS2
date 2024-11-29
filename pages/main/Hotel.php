<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách sạn</title>
  <style>
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
   
    <div id="bg_hotel" >
            <div class="table_hotel">
                    <div class="title">
                        <br>
                        <p>TÌM KIẾM PHÒNG <br>NGAY HÔM NAY</p>
                    </div>
                    <div class="box">
                    <form method="GET" action="pages/main/timkiemks.php">

                            <table class="tab_sug">
                                   <br> 
                                   <tr>
                                    <td class="td1"></td>
                                    <td>
                                        <div class="radio-input">
                                            <label>
                                            <input type="radio" id="value-1" name="value-radio" value="value-1">
                                            <span>Ở trong ngày</span>
                                            </label>
                                            <label>
                                              <input type="radio" id="value-2" name="value-radio" value="value-2">
                                            <span>Ở qua đêm</span>
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
                                    <td colspan="3" class="goiY" style="text-align: left;"> &ensp; &ensp; Thành phố, địa điểm hoặc tên khách sạn:</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="diaChi" name="ten_khachsan"  placeholder="Nhập điểm du lịch hoặc khách sạn">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="ngaydi" name="ngaydi" class="goiY">Ngày nhận phòng:</label>
                                    </td>
                                    <td colspan="2"><label for="ngayve" name="ngayve" class="goiY">Ngày trả phòng:</label></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="date" id="ngaydi" >
                                        <input type="date" id="ngayve">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="goiY" name="so_nguoilon">Người lớn <br> <i>(>12 tuổi)</i></td>
                                    <td class="goiY">Trẻ em<br> <i>(<12 tuổi)</i></td>
                                    <td class="goiY">Số phòng<br></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="" value="1" class="tuoi" ></td>
                                    <td><input type="text" name="" value="2" class="tuoi" ></td>
                                    <td><input type="text" name="" value="3" class="tuoi" ></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input id="sub" type="submit" value="TÌM KIẾM PHÒNG" style="border-radius: 8px;">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                      
            </div>
    
    </div>   
    <div id="sl_hotel">
        <div class="sug_hotel">
            <center><h1>Các khách sạn gợi ý</h1></center>
            <div class="re-container">
                <div class="container-se">
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "web_dulich");
                        $items_per_page = 5;
                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $offset = ($current_page - 1) * $items_per_page;
                        $total_items_query = "SELECT COUNT(*) as total FROM khachsan";
                        $result = mysqli_query($conn, $total_items_query);
                        $row = mysqli_fetch_assoc($result);
                        $total_items = $row['total'];
                        $total_pages = ceil($total_items / $items_per_page);
                        $sql = "SELECT * FROM khachsan LIMIT $items_per_page OFFSET $offset";
                        $mysql_ks = mysqli_query($conn, $sql);

                        // Hiển thị dữ liệu
                        while ($row = mysqli_fetch_array($mysql_ks)) {
                        ?>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="?dream=chitietks&id=<?php echo $row['idKhachSan']; ?>">
                                            <img src="admin/modules/quanlykhachsan/uploads/<?php echo $row['hinhanh'] ?>" alt="" style="width: 100%; height: 180px;">
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#">
                                            <b class="name-hot"><?php echo $row['tenKhachSan']; ?></b> <br>
                                            <i class="ti-location-pin"><?php echo $row['diaChi']; ?></i> <br>
                                            <div class="giaGoc">1.950.000VNĐ</div>
                                            <div class="giaGiam"><b><?php echo number_format($row['gia'], 0, ',', '.') . ' VNĐ'; ?></b></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        // Hiển thị phân trang
                    ?>


                </div>
                   <br>
                   
                   <div class="pagination">
                        <?php if ($current_page > 1): ?>
                            <a href="?dream=khachsan&page=<?php echo $current_page - 1; ?>" class="prev">Trước</a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?dream=khachsan&page=<?php echo $i; ?>" class="page <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>

                        <?php if ($current_page < $total_pages): ?>
                            <a href="?dream=khachsan&page=<?php echo $current_page + 1; ?>" class="next">Tiếp</a>
                        <?php endif; ?>
                    </div>
                    <br> <br> <br> <br>
                </div>
            </div>
        </div>    
        
        <div class="sug-partner">
            <div class="pic_partner">
                <div class="table-row">
                    <div ><img src="https://ik.imagekit.io/tvlk/image/imageResource/2017/08/08/1502200809743-5dde6f77b2b13ac38a752953eb78e692.png?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                    <div ><img src="https://ik.imagekit.io/tvlk/image/imageResource/2018/01/29/1517201056739-4030efe3d4ea793a40904f712cec37af.png?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                </div>
                <div class="table-row">
                    <div ><img src="https://ik.imagekit.io/tvlk/image/imageResource/2017/08/08/1502200796134-3e687ae7c1e145253ef72691f5f18318.png?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                    <div ><img src="https://ik.imagekit.io/tvlk/image/imageResource/2017/08/08/1502200805093-7f22b69691bac8cee0ef4b3f0988fd78.png?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                </div>
                <div class="table-row">
                    <div ><img src="https://ik.imagekit.io/tvlk/image/imageResource/2017/08/08/1502200782803-92cd85419dd6440bbc1c7b8d5a061249.png?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                    <div> <img src="https://ik.imagekit.io/tvlk/image/imageResource/2018/01/29/1517201226378-8affc1dfeeafe879121fc94652a7332f.png?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                </div>
                <div class="table-row">
                    <div><img src="https://ik.imagekit.io/tvlk/image/imageResource/2017/08/08/1502200776552-f852b752ae88e7e0902fb0d3bfc41a00.png?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                    <div><img src="https://ik.imagekit.io/tvlk/image/imageResource/2022/10/26/1666769812521-2f9e73b3dfa37b1a8774517477bce6f3.png?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                </div>
                <div class="table-row">
                    <div><img src="https://ik.imagekit.io/tvlk/image/imageResource/2018/01/29/1517200921330-784c7f0f6798fdb7c3b14d23881d5090.jpeg?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                    <div><img src="https://ik.imagekit.io/tvlk/image/imageResource/2018/01/29/1517201013000-1f5c98cc6081ca889e0ee99d4bdae1ce.png?tr=dpr-2,q-75,w-88" alt="" class="pic-par"></div>
                </div>
            </div>
            
            <div class="introduct-par">
                <h2>Đối tác khách sạn</h2>
                <br>
                <p>Chúng tôi đã thiết lập mối quan hệ hợp tác chặt chẽ với các chuỗi khách sạn hàng đầu trên toàn cầu để đảm bảo rằng bạn luôn có trải nghiệm kỳ nghỉ tuyệt vời nhất tại mọi điểm đến trong mơ của mình!</p>
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
</html>