
<p>Giỏ hàng</p>

<?php

if(isset($_SESSION['dangky'])){
    echo 'xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
}
?>

    <h2>Giỏ hàng của bạn</h2>
    <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- Bảng hiển thị vé máy bay -->
    <h3>Vé Máy Bay</h3>
    <table>
        <tr>
            <th>Id</th>
            <th>Diểm đi</th>
            <th>Điểm Đến</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <!-- <th>Ngày Giờ Bay</th> -->
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Quản lý</th>
        </tr>
        <?php
        if(isset($_SESSION['cartmb'])){
            $i=0;
            $tongtien=0;
            foreach($_SESSION['cartmb'] as $ticket){
                $thanhtien = $ticket['soluong']*$ticket['giave'];
                $tongtien += $thanhtien;
                $i++;
            
    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $ticket['diadiemdi']; ?></td>
                <td><?php echo $ticket['diadiemden']; ?></td>
                <td><img src="admin/modules/quanlyvemaybay/uploads/<?php echo $ticket['hinhanh']; ?>" width="150px"></td>
                <td><?php echo number_format($ticket['giave'],0,',','.'). 'vnđ'; ?></td>
                <td>
                    <a href="pages/main/themgiohangmb.php?tru=<?php echo $ticket['id'] ?>"><i class="fa fa-minus fa-style"></i></a>
                    <?php echo $ticket['soluong']; ?>
                    <a href="pages/main/themgiohangmb.php?cong=<?php echo $ticket['id'] ?>"><i class="fa fa-plus fa-style"></i></a>
                </td>
                <td><p ><?php echo number_format($tongtien,0,',','.'). 'vnđ'; ?> </p></td>
                <!-- <td><?php echo $ticket['tensanpham']; ?></td> -->
                <td><a href="pages/main/themgiohangmb.php?xoa=<?php echo $ticket['id'] ?>">Xóa</a> || <a href="pages/main/themgiohangmb.php?xoatatca=1">Xóa tất cả</a></td>
            </tr>
        <?php } ?>
        <!-- <tr>
        <td colspan="28">
            <div style="clear:both">
                <?php
                    if(isset($_SESSION['dangky'])){
                ?>
                <p> <a href="index.php?dream=thanhtoan">Đặt hàng</a></p>
                 <?php 
                    }else{
                ?>   
                <p> <a href="index.php?dream=dangky">Đăng nhập đặt hàng</a></p>
                <?php
                    }
                    ?>
                
            </div>
        </td>
       
    </tr> -->
    <?php
        }else{
    ?>
    
    <tr>
        <td colspan="6"><p>Hiện tại giỏ hàng trống</p></td>
    </tr>
    <?php
        }
    ?>
    </table>

    <!-- Bảng hiển thị khách sạn -->
    <h3>Khách Sạn</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên Khách Sạn</th>
            <th>Vị Trí</th>
            <th>Hình ảnh</th>
            <th>Giá mỗi đêm</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Quản lý</th>
        </tr>
        <?php
        if(isset($_SESSION['cartks'])){
            $i=0;
            $tongtien=0;
            foreach($_SESSION['cartks'] as $ticket){
                $thanhtien = $ticket['soluong']*$ticket['gia'];
                $tongtien += $thanhtien;
                $i++;
            
    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $ticket['tenKhachSan']; ?></td>
                <td><?php echo $ticket['diaChi']; ?></td>
                <td><img src="admin/modules/quanlykhachsan/uploads/<?php echo $ticket['hinhanh']; ?>" width="150px"></td>
                <td><?php echo number_format($ticket['gia'],0,',','.'). 'vnđ'; ?></td>
                <td>
                    
                    <a href="pages/main/themgiohangks.php?tru=<?php echo $ticket['id'] ?>"><i class="fa fa-minus fa-style"></i></a>
                    <?php echo $ticket['soluong']; ?>
                    <a href="pages/main/themgiohangks.php?cong=<?php echo $ticket['id'] ?>"><i class="fa fa-plus fa-style"></i></a>
                </td>
                <td> <p style="float: left"><?php echo number_format($tongtien,0,',','.'). 'vnđ'; ?> </p></td>
                <td><a href="pages/main/themgiohangks.php?xoa=<?php echo $ticket['id'] ?>">Xóa</a> || <a href="pages/main/themgiohangks.php?xoatatca=1">Xóa tất cả</a></td>
            </tr>
        <?php } ?>
        <!-- <tr>
        <td colspan="28">
           
            <p></p>
            <div style="clear:both">
                <?php
                    if(isset($_SESSION['dangky'])){
                ?>
                <p> <a href="index.php?dream=thanhtoan">Đặt hàng</a></p>
                 <?php 
                    }else{
                ?>   
                <p> <a href="index.php?dream=dangky">Đăng nhập đặt hàng</a></p>
                <?php
                    }
                    ?>
                
            </div>
        </td>
       
    </tr> -->
    <?php
        }else{
    ?>
    
    <tr>
        <td colspan="6"><p>Hiện tại giỏ hàng trống</p></td>
    </tr>
    <?php
        }
    ?>
    </table>

    <!-- Bảng hiển thị xe du lịch -->
    <h3>Xe Du Lịch</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên xe du lịch</th>
            <th>Địa chỉ giao</th>
            <th>Hình ảnh</th>
            <th>Giá thuê mỗi ngày</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Quản lý</th>
        </tr>
        <?php
        if(isset($_SESSION['cartxe'])){
            $i=0;
            $tongtien=0;
            foreach($_SESSION['cartxe'] as $ticket){
                $thanhtien = $ticket['soluong']*$ticket['gia'];
                $tongtien += $thanhtien;
                $i++;
            
    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $ticket['tenxedulich']; ?></td>
                <td><?php echo $ticket['diachigiao']; ?> </td>
                <td><img src="admin/modules/quanlyxedulich/uploads/<?php echo $ticket['hinhanh']; ?>" width="150px"></td>
                <td><?php echo number_format($ticket['gia'],0,',','.'). 'vnđ'; ?></td>
                <td>
                    <a href="pages/main/themgiohangxedulich.php?tru=<?php echo $ticket['id'] ?>"><i class="fa fa-minus fa-style"></i></a>
                    <?php echo $ticket['soluong']; ?>
                    <a href="pages/main/themgiohangxedulich.php?cong=<?php echo $ticket['id'] ?>"><i class="fa fa-plus fa-style"></i></a>
                </td>
                <td><p style="float: left"> <?php echo number_format($tongtien,0,',','.'). 'vnđ'; ?> </p></td>
                <td><a href="pages/main/themgiohangxedulich.php?xoa=<?php echo $ticket['id'] ?>">Xóa</a> || <a href="pages/main/themgiohangxedulich.php?xoatatca=1">Xóa tất cả</a></td>
            </tr>
        <?php } ?>
        <tr>
        <!-- <td colspan="28">
            
            <p></p>
            <div style="clear:both">
                <?php
                    if(isset($_SESSION['dangky'])){
                ?>
                <p> <a href="index.php?dream=thanhtoan">Đặt hàng</a></p>
                 <?php 
                    }else{
                ?>   
                <p> <a href="index.php?dream=dangky">Đăng nhập đặt hàng</a></p>
                <?php
                    }
                    ?>
                
            </div>
        </td>
       
    </tr> -->
    <?php
        }else{
    ?>
    
    <tr>
        <td colspan="6"><p>Hiện tại giỏ hàng trống</p></td>
    </tr>
    <?php
        }
    ?>
    </table>
    <tr>
        <td >
            <div style="clear:both">
                <?php
                    if(isset($_SESSION['dangky'])){
                ?>
                <p> <a href="index.php?dream=thanhtoan">Đặt hàng</a></p>
                 <?php 
                    }else{
                ?>   
                <p> <a href="index.php?dream=dangky">Đăng nhập đặt hàng</a></p>
                <?php
                    }
                    ?>
                
            </div>
        </td>
       
    </tr>

</body>
