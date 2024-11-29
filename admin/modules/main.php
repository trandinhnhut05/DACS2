
<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $action=$_GET['action'];
            $query = $_GET['query'];
        }else{
            $action="";
            $query="";
        }
        if($action=='quanlytrangchu' && $query=='them'){
            include('modules/quanlytrangchu/them.php');
            include('modules/quanlytrangchu/lietke.php');
        }elseif($action=='quanlytrangchu' && $query=='sua'){
            include('modules/quanlytrangchu/sua.php');
        }elseif($action=='quanlykhachsan' && $query=='them'){
            include('modules/quanlykhachsan/them.php');
            include('modules/quanlykhachsan/lietke.php');
        }elseif($action=='quanlykhachsan' && $query=='sua'){
            include('modules/quanlykhachsan/sua.php');
        }elseif($action=='quanlyvemaybay' && $query=='them'){
            include('modules/quanlyvemaybay/them.php');
            include('modules/quanlyvemaybay/lietke.php');
        }elseif($action=='quanlyvemaybay' && $query=='sua'){
            include('modules/quanlyvemaybay/sua.php');
        }elseif($action=='quanlyxedulich' && $query=='them'){
            include('modules/quanlyxedulich/them.php');
            include('modules/quanlyxedulich/lietke.php');
        }elseif($action=='quanlyxedulich' && $query=='sua'){
            include('modules/quanlyxedulich/sua.php');
        }elseif($action=='quanlyuudai' && $query=='them'){
            include('quanlyuudai/them.php');
            include('quanlyuudai/lietke.php');
        }elseif($action=='quanlyuudai' && $query=='sua'){
            include('quanlyuudai/sua.php');
        }elseif($action=='quanlydonhang' && $query=='donhang'){
            include('quanlydonhang/lietke.php');
        }elseif($action=='quanlykhachhang' && $query=='khachhang'){
            include('quanlykhachhang/xulykhachhang.php');
        }elseif($action=='quanlykhachhang' && $query=='xemgiaodich'){
            include('quanlykhachhang/xulykhachhang.php');
        }elseif($action=='quanlybaiviet' && $query=='baiviet'){
            include('quanlybaiviet/xulybaiviet.php');
        }
    ?>
</div>
