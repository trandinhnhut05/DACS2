<p>Thêm giỏ hàng</p>

<?php
    session_start();
    //them so luong
        if(isset($_GET['cong'])){
            $id=$_GET['cong'];
            foreach($_SESSION['cartxe'] as $cart_item){
                if($cart_item['id']!=$id){
                    $product[]=array('tenxedulich'=> $cart_item['tenxedulich'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                    'hinhanh'=>$cart_item['hinhanh'],'diachigiao'=>$cart_item['diachigiao']);
                    $_SESSION['cartxe']=$product;
                }else{
                    $tangsoluong = $cart_item['soluong'] + 1;
                    if($cart_item['soluong']<=9){
                        $product[]=array('tenxedulich'=> $cart_item['tenxedulich'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'gia'=>$cart_item['gia'],
                        'hinhanh'=>$cart_item['hinhanh'],'diachigiao'=>$cart_item['diachigiao']);
                    }else{
                        $product[]=array('tenxedulich'=> $cart_item['tenxedulich'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                        'hinhanh'=>$cart_item['hinhanh'],'diachigiao'=>$cart_item['diachigiao']);

                    }
                    $_SESSION['cartxe'] = $product;
                }
            }
            header('Location:../../index.php?dream=giohang');
        }
    //tru so luong
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cartxe'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('tenxedulich'=> $cart_item['tenxedulich'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                'hinhanh'=>$cart_item['hinhanh'],'diachigiao'=>$cart_item['diachigiao']);
                $_SESSION['cartxe']=$product;
            }else{
                $tangsoluong = $cart_item['soluong'] - 1;
                if($cart_item['soluong']>1){
                    $product[]=array('tenxedulich'=> $cart_item['tenxedulich'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'gia'=>$cart_item['gia'],
                    'hinhanh'=>$cart_item['hinhanh'],'diachigiao'=>$cart_item['diachigiao']);
                }else{
                    $product[]=array('tenxedulich'=> $cart_item['tenxedulich'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                    'hinhanh'=>$cart_item['hinhanh'],'diachigiao'=>$cart_item['diachigiao']);

                }
                $_SESSION['cartxe'] = $product;
            }
        }
        header('Location:../../index.php?dream=giohang');
    }
    //xoa san pham
    if(isset($_SESSION['cartxe']) && isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        foreach($_SESSION['cartxe'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('tenxedulich'=> $cart_item['tenxedulich'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                'hinhanh'=>$cart_item['hinhanh'],'diachigiao'=>$cart_item['diachigiao']);
            }
            $_SESSION['cartxe'] = $product;
            header('Location:../../index.php?dream=giohang');
        }
    }
    //xoa tat ca
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cartxe']);
        header('Location:../../index.php?dream=giohang');
    }

    //them san pham vao gio hang
    if(isset($_POST['themgiohang'])){
        $mysqli = mysqli_connect("localhost","root","","web_dulich");
        $id=$_GET['id'];
        $soluong=1;
        $sql="SELECT * FROM xedulich WHERE id_xedulich='".$id."' LIMIT 1";
        $query=mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_product=array(array('tenxedulich'=> $row['tenxedulich'],'id'=>$id,'soluong'=>$soluong,'gia'=>$row['gia'],
            'hinhanh'=>$row['hinhanh'],'diachigiao'=>$row['diachigiao']));

            //kiem tra session gio hang ton tai
            if(isset($_SESSION['cartxe'])){
                $found=false;
                foreach($_SESSION['cartxe'] as $cart_item){
                    //neu trung
                    if($cart_item['id']==$id){
                        $product[]=array('tenxedulich'=> $cart_item['tenxedulich'],'id'=>$cart_item['id'],'soluong'=>$soluong+=1,'gia'=>$cart_item['gia'],
                        'hinhanh'=>$cart_item['hinhanh'],'diachigiao'=>$cart_item['diachigiao']);
                        $found=true;
                    }else{
                        //neu khong trung
                        $product[]=array('tenxedulich'=> $cart_item['tenxedulich'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],
                        'hinhanh'=>$cart_item['hinhanh'],'diachigiao'=>$cart_item['diachigiao']);
                    }
                }
                if($found == false){
                    //liên kết dữ liệu new_product với product
                    $_SESSION['cartxe'] = array_merge($product,$new_product);
                }else{
                    $_SESSION['cartxe'] = $product;
                }
            }else{
                $_SESSION['cartxe'] = $new_product;
            }
        }
        header('Location:../../index.php?dream=giohang');
    }
?>