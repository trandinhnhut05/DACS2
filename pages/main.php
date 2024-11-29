<div id="main">
            <!-- <?php
                include("sidebar/sidebar.php")
            ?> -->
            <div class="maincontent">
                <?php
                    if(isset($_GET['dream'])){
                        $tam=$_GET['dream'];
                    }else{
                        $tam = '';
                    }
                    if($tam=='trangchu'){
                        include('main/Trangchu.php');
                    }elseif($tam=='khampha'){
                        include('khamPha.php');
                    }elseif($tam=='khachsan'){
                        include('main/Hotel.php');
                    }elseif($tam=='maybay'){
                        include('main/MB.php');
                    }elseif($tam=='xe'){
                        include('main/xe.php');
                    }elseif($tam=='uudai'){
                        include('main/UD.php');
                    }elseif($tam=='dangky'){
                        include('pages/login.php');
                    }elseif($tam=='thanhtoan'){
                        include('main/thanhtoan.php');
                    }elseif($tam=='dangnhap'){
                        include('pages/login.php');
                    }elseif($tam=='timkiem'){
                        include('main/timkiem.php');
                     }elseif($tam=='camon'){
                        include('main/camon.php');
                     }elseif($tam=='thaydoimatkhau'){
                        include('main/thaydoimatkhau.php');
                     }elseif($tam=='chitietks'){
                        include('main/hotel_detail.php');
                     }elseif($tam=='chitietmb'){
                        include('main/MB_detail.php');
                     }elseif($tam=='chitietxe'){
                        include('main/xedulich_detail.php');
                     }elseif($tam=='giohang'){
                        include('main/giohang.php');
                     }elseif($tam=='thanhtoan'){
                        include('main/thanhtoan.php');
                     }elseif($tam=='xemdonhang'){
                        include('main/xemdonhang.php');
                     }elseif($tam=='timkiemks'){
                        include('main/timkiemks.php');
                     }else{
                        include('main/Trangchu.php');
                    }
                ?>
            </div>
        </div>