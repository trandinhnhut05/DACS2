<p>Thêm giỏ hàng</p>

<?php
    session_start();
    //them so luong
        if(isset($_GET['cong'])){
            $id=$_GET['cong'];
            foreach($_SESSION['cartks'] as $cart_item){
                if($cart_item['id']!=$id){
                    $product[]=array('tenKhachSan'=> $cart_item['tenKhachSan'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                    'hinhanh'=>$cart_item['hinhanh'],'diaChi'=>$cart_item['diaChi']);
                    $_SESSION['cartks']=$product;
                }else{
                    $tangsoluong = $cart_item['soluong'] + 1;
                    if($cart_item['soluong']<=9){
                        $product[]=array('tenKhachSan'=> $cart_item['tenKhachSan'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'gia'=>$cart_item['gia'],
                        'hinhanh'=>$cart_item['hinhanh'],'diaChi'=>$cart_item['diaChi']);
                    }else{
                        $product[]=array('tenKhachSan'=> $cart_item['tenKhachSan'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                        'hinhanh'=>$cart_item['hinhanh'],'diaChi'=>$cart_item['diaChi']);

                    }
                    $_SESSION['cartks'] = $product;
                }
            }
            header('Location:../../index.php?dream=giohang');
        }
    //tru so luong
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cartks'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('tenKhachSan'=> $cart_item['tenKhachSan'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                'hinhanh'=>$cart_item['hinhanh'],'diaChi'=>$cart_item['diaChi']);
                $_SESSION['cartks']=$product;
            }else{
                $tangsoluong = $cart_item['soluong'] - 1;
                if($cart_item['soluong']>1){
                    $product[]=array('tenKhachSan'=> $cart_item['tenKhachSan'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'gia'=>$cart_item['gia'],
                    'hinhanh'=>$cart_item['hinhanh'],'diaChi'=>$cart_item['diaChi']);
                }else{
                    $product[]=array('tenKhachSan'=> $cart_item['tenKhachSan'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                    'hinhanh'=>$cart_item['hinhanh'],'diaChi'=>$cart_item['diaChi']);

                }
                $_SESSION['cartks'] = $product;
            }
        }
        header('Location:../../index.php?dream=giohang');
    }
    //xoa san pham
    if(isset($_SESSION['cartks']) && isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        foreach($_SESSION['cartks'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('tenKhachSan'=> $cart_item['tenKhachSan'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                'hinhanh'=>$cart_item['hinhanh'],'diaChi'=>$cart_item['diaChi']);
            }
            $_SESSION['cartks'] = $product;
            header('Location:../../index.php?dream=giohang');
        }
    }
    //xoa tat ca
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cartks']);
        header('Location:../../index.php?dream=giohang');
    }

    //them san pham vao gio hang
    if(isset($_POST['themgiohang'])){
        $mysqli = mysqli_connect("localhost","root","","web_dulich");
        $id=$_GET['id'];
        $soluong=1;
        $sql="SELECT * FROM khachsan WHERE idKhachSan='".$id."' LIMIT 1";
        $query=mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_product=array(array('tenKhachSan'=> $row['tenKhachSan'],'id'=>$id,'soluong'=>$soluong,'gia'=>$row['gia'],
            'hinhanh'=>$row['hinhanh'],'diaChi'=>$row['diaChi']));

            //kiem tra session gio hang ton tai
            if(isset($_SESSION['cartks'])){
                $found=false;
                foreach($_SESSION['cartks'] as $cart_item){
                    //neu trung
                    if($cart_item['id']==$id){
                        $product[]=array('tenKhachSan'=> $cart_item['tenKhachSan'],'id'=>$cart_item['id'],'soluong'=>$soluong+=1,'gia'=>$cart_item['gia'],
                        'hinhanh'=>$cart_item['hinhanh'],'diaChi'=>$cart_item['diaChi']);
                        $found=true;
                    }else{
                        //neu khong trung
                        $product[]=array('tenKhachSan'=> $cart_item['tenKhachSan'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                        'hinhanh'=>$cart_item['hinhanh'],'diaChi'=>$cart_item['diaChi']);
                    }
                }
                if($found == false){
                    //liên kết dữ liệu new_product với product
                    $_SESSION['cartks'] = array_merge($product,$new_product);
                }else{
                    $_SESSION['cartks'] = $product;
                }
            }else{
                $_SESSION['cartks'] = $new_product;
            }
        }
        header('Location:../../index.php?dream=giohang');
    }
    if(isset($_POST['thanhtoan'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $note = $_POST['note'];
        $address = $_POST['address'];
        $giaohang = $_POST['giaohang'];
    
        $sql_khachhang = mysqli_query($con,"INSERT INTO khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
        if($sql_khachhang){
            $sql_select_khachhang = mysqli_query($con,"SELECT * FROM khachhang ORDER BY khachhang_id DESC LIMIT 1");
            $mahang = rand(0,9999);
            $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
            $khachhang_id = $row_khachhang['khachhang_id'];
            $_SESSION['dangnhap_home'] = $row_khachhang['name'];
            $_SESSION['khachhang_id'] = $khachhang_id;
            for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
                $sanpham_id = $_POST['thanhtoan_product_id'][$i];
                $soluong = $_POST['thanhtoan_soluong'][$i];
                $sql_donhang = mysqli_query($con,"INSERT INTO donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
                $sql_giaodich = mysqli_query($con,"INSERT INTO giaodich(sanpham_id,soluong,magiaodich,khachhang_id) values ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
                $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM giohang WHERE sanpham_id='$sanpham_id'");
            }
   
        }
    }
    if(isset($_POST['thanhtoandangnhap'])){
   
        $khachhang_id = $_SESSION['khachhang_id'];
        $mahang = rand(0,9999);	
        for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
                $sanpham_id = $_POST['thanhtoan_product_id'][$i];
                $soluong = $_POST['thanhtoan_soluong'][$i];
                $sql_donhang = mysqli_query($con,"INSERT INTO donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
                $sql_giaodich = mysqli_query($con,"INSERT INTO giaodich(sanpham_id,soluong,magiaodich,khachhang_id) values ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
                $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM giohang WHERE sanpham_id='$sanpham_id'");
            }
   
        
    }
?> 