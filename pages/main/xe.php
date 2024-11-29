
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/cssHotel/reponsive.css">
    <link rel="stylesheet" href="./assets/cssHotel/style.css">
    <link rel="stylesheet" href="./assets/css/reponsive.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css"> -->
    <title>Cho thuê xe</title>
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
    <div id="bg_hotel" style="display: flex;justify-content: center;align-items: center; background-image: url(https://nemtv.vn/wp-content/uploads/2017/09/4123620_Xe.Tinhte.vn-VW-California-XXL_Concept-8.jpg);">
        <div class="table_hotel">
                <div class="title-car"> 
                    <br>
                    <h1>Dịch vụ cho thuê xe tự lái</h1> <br>
                    <p>
                        Dịch vụ cho thuê xe của chúng tôi cung cấp sự linh hoạt và tiện lợi cho việc di chuyển của bạn. Từ các chuyến công tác đến kỳ nghỉ, chúng tôi cung cấp các loại xe đa dạng từ tiết kiệm đến sang trọng, đảm bảo đáp ứng mọi nhu cầu của bạn. Đội ngũ chuyên nghiệp của chúng tôi luôn sẵn sàng hỗ trợ bạn trong mọi hành trình, giúp bạn tận hưởng một trải nghiệm di chuyển thuận lợi và thoải mái.</p>
                        <br>
                </div>
                <div class="box">
                    <form>
                            <table class="tab_sug">
                                <br> 
                             <tr>
                                 <td colspan="3">
                                     <hr style="width: 100%;">
                                     <br>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="3" class="goiY" style="text-align: left;"> &ensp; &ensp; Địa điểm thuê xe của bạn là:</td>
                             </tr>
                             <tr>
                                 <td colspan="3">
                                     <input type="text" class="diaChi" placeholder="Nhập điểm du lịch hoặc khách sạn">
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <label for="ngaydi" class="goiY">Ngày bắt đầu:</label>
                                 </td>
                                 <td colspan="2"><label for="ngayve" class="goiY">Ngày kết thúc:</label></td>
                             </tr>
                             <tr>
                                 <td colspan="3">
                                     <input type="date" id="ngaydi">
                                     <input type="date" id="ngayve">
                                 </td>
                             </tr>
                             <tr>
                                 <td class="goiY">Loại xe</td>
                                 <td colspan="2" class="goiY" >Số xe</td>
                             </tr>
                             <tr>
                                 <td colspan="3" class="dong">
                                     <select name="xe" id="xe1" >
                                         <option value="car">Xe 4 chỗ</option>
                                         <option value="ga">Xe 6 chỗ</option>
                                         <option value="so">Xe 16 chỗ</option>
                                         <option value="24cho">Xe 24 chỗ</option>
                                     </select>
                                     <input type="number"name="" id="xe2"  min="1">
                                 </td>
                             </tr>
                             <tr>
                                    <td colspan="3">
                                        <input id="sub-xe" type="submit" value="TÌM XE" style="border-radius: 8px;">
                                    </td>
                             </tr>
                         </table>

                    </form>
                </div>
                
        </div>

</div> 
<div id="sl_hotel">
    <div class="sug_hotel">
        <center><h1>Chọn xe phù hợp với nhu cầu của bạn</h1></center>
        <div class="sug-xe">
        <h2>Xe dịch vụ</h2>
        <div class="re-container">
            <div class="container-se">
   
             <?php
                       $conn = mysqli_connect("localhost", "root", "", "web_dulich");
                       $items_per_page = 5;
                       $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                       $offset = ($current_page - 1) * $items_per_page;
                       $total_items_query = "SELECT COUNT(*) as total FROM xedulich";
                       $result = mysqli_query($conn, $total_items_query);
                       $row = mysqli_fetch_assoc($result);
                       $total_items = $row['total'];
                       $trang = ceil($total_items / $items_per_page);
                       $sql = "SELECT * FROM xedulich LIMIT $items_per_page OFFSET $offset";
                       $mysql_xe = mysqli_query($conn, $sql);
                       while($row=mysqli_fetch_array($mysql_xe)){
                    ?>
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <a href="?dream=chitietxe&id=<?php echo $row['id_xedulich']; ?>"><img 
                           src="admin/modules/quanlyxedulich/uploads/<?php echo $row['hinhanh']?>"
                             alt="" style="width: 100%; height:180px;"></a>
                        </div> 
                        <div class="card-footer">
                            <a href="#">
                            <b class="name-hot"><?php echo $row['loaixe'] ?></b> <br>
                            <i class="ti-location-pin"><?php echo $row['diachigiao'] ?></i> <br>
                            <div class="giaGoc">1.800.000 VNĐ/ngày</div>
                            <div class="giaGiam"><b><?php echo number_format($row['gia'],0,",",".").'VNĐ/ngày' ?></b></div>
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
                            <a href="?dream=xe&page=<?php echo $current_page - 1; ?>" class="prev">Trước</a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $trang; $i++): ?>
                            <a href="?dream=xe&page=<?php echo $i; ?>" class="page <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>

                        <?php if ($current_page < $trang): ?>
                            <a href="?dream=xe&page=<?php echo $current_page + 1; ?>" class="next">Tiếp</a>
                        <?php endif; 
                    ?>
                </div>
                <br> <br> <br> <br>
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
</html>
