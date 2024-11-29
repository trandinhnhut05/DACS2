
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
   
</head>
<body>
<div class="header" style="font-family:Times new romans;">
        <div class="container-header">
            <div class="header-logo">
                <p>Dream</p>
                <div class="nav-toggle"> 
                <!-- <button class="toggle-button"></button>  -->
                </div>
            </div>
            <div class="header-nav" >
                <nav>
                    <ul>
                        
                        <li><a href="index.php?dream=trangchu">Trang chủ</a></li>
                        <li><a href="index.php?dream=khachsan">Khách sạn</a></li>
                        <li><a href="index.php?dream=maybay">Vé máy bay</a></li>
                        <li><a href="index.php?dream=xe">Xe du lịch</a></li>
                        <li><a href="index.php?dream=uudai">Ưu đãi</a></li>
                    </ul>
                </nav>
            </div>
            <div class="header-login">
                <nav>
                <?php
                    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
                        unset($_SESSION['dangky']);
                    }
                ?>
                    <ul>
                    <?php
                        if(isset($_SESSION['dangky'])){
                    ?>
                    <li> <a href="index.php?dangxuat=1">Đăng Xuất</a></li>
                    <li> <a href="index.php?dream=xemdonhang">Đơn hàng của bạn</a></li>
                    <?php
                        }else{
                    ?>
                    <li><a href="index.php?dream=dangky">Đăng ký</a></li>
                    <?php
                        }
                    ?>
                        <li><button class="index.php?dream=khampha">Khám phá</button></li>
                        <li><a href="index.php?dream=giohang">Giỏ hàng</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
        
</body>
</html>