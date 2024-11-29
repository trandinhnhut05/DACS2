<p>Thêm giỏ hàng</p>

<?php
    session_start();
    //them so luong
        if(isset($_GET['cong'])){
            $id=$_GET['cong'];
            foreach($_SESSION['cartmb'] as $cart_item){
                if($cart_item['id']!=$id){
                    $product[]=array('diadiemdi'=> $cart_item['diadiemdi'],'diadiemden'=>$cart_item['diadiemden'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giave'=>$cart_item['giave'],
                    'hinhanh'=>$cart_item['hinhanh'],);
                    $_SESSION['cartmb']=$product;
                }else{
                    $tangsoluong = $cart_item['soluong'] + 1;
                    if($cart_item['soluong']<=9){
                        $product[]=array('diadiemdi'=> $cart_item['diadiemdi'],'diadiemden'=>$cart_item['diadiemden'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giave'=>$cart_item['giave'],
                        'hinhanh'=>$cart_item['hinhanh'],);
                    }else{
                        $product[]=array('diadiemdi'=> $cart_item['diadiemdi'],'diadiemden'=>$cart_item['diadiemden'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giave'=>$cart_item['giave'],
                        'hinhanh'=>$cart_item['hinhanh'],);

                    }
                    $_SESSION['cartmb'] = $product;
                }
            }
            header('Location:../../index.php?dream=giohang');
        }
    //tru so luong
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cartmb'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('diadiemdi'=> $cart_item['diadiemdi'],'diadiemden'=>$cart_item['diadiemden'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giave'=>$cart_item['giave'],
                'hinhanh'=>$cart_item['hinhanh'],);
                $_SESSION['cartmb']=$product;
            }else{
                $tangsoluong = $cart_item['soluong'] - 1;
                if($cart_item['soluong']>1){
                    $product[]=array('diadiemdi'=> $cart_item['diadiemdi'],'diadiemden'=>$cart_item['diadiemden'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giave'=>$cart_item['giave'],
                    'hinhanh'=>$cart_item['hinhanh'],);
                }else{
                    $product[]=array('diadiemdi'=> $cart_item['diadiemdi'],'diadiemden'=>$cart_item['diadiemden'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giave'=>$cart_item['giave'],
                    'hinhanh'=>$cart_item['hinhanh'],);

                }
                $_SESSION['cartmb'] = $product;
            }
        }
        header('Location:../../index.php?dream=giohang');
    }
    //xoa san pham
    if(isset($_SESSION['cartmb']) && isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        foreach($_SESSION['cartmb'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[]=array('diadiemdi'=> $cart_item['diadiemdi'],'diadiemden'=>$cart_item['diadiemden'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giave'=>$cart_item['giave'],
                'hinhanh'=>$cart_item['hinhanh'],);
            }
            $_SESSION['cartmb'] = $product;
            header('Location:../../index.php?dream=giohang');
        }
    }
    //xoa tat ca
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cartmb']);
        header('Location:../../index.php?dream=giohang');
    }

    //them san pham vao gio hang
    if(isset($_POST['themgiohang'])){
        $mysqli = mysqli_connect("localhost","root","","web_dulich");
        $id=$_GET['id'];
        $soluong=1;
        $sql="SELECT * FROM vemaybay WHERE id_vemaybay='".$id."' LIMIT 1";
        $query=mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_product=array(array('diadiemdi'=> $row['diadiemdi'],'id'=>$id,'soluong'=>$soluong,'giave'=>$row['giave'],
            'hinhanh'=>$row['hinhanh'],'diadiemden'=>$row['diadiemden']));

            //kiem tra session gio hang ton tai
            if(isset($_SESSION['cartmb'])){
                $found=false;
                foreach($_SESSION['cartmb'] as $cart_item){
                    //neu trung
                    if($cart_item['id']==$id){
                        $product[]=array('diadiemdi'=> $cart_item['diadiemdi'],'diadiemden'=>$cart_item['diadiemden'],'id'=>$cart_item['id'],'soluong'=>$soluong+=1,'giave'=>$cart_item['giave'],
                        'hinhanh'=>$cart_item['hinhanh'],);
                        $found=true;
                    }else{
                        //neu khong trung
                        $product[]=array('diadiemdi'=> $cart_item['diadiemdi'],'diadiemden'=>$cart_item['diadiemden'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giave'=>$cart_item['giave'],
                        'hinhanh'=>$cart_item['hinhanh'],);
                    }
                }
                if($found == false){
                    //liên kết dữ liệu new_product với product
                    $_SESSION['cartmb'] = array_merge($product,$new_product);
                }else{
                    $_SESSION['cartmb'] = $product;
                }
            }else{
                $_SESSION['cartmb'] = $new_product;
            }
        }
        header('Location:../../index.php?dream=giohang');
    }
?>