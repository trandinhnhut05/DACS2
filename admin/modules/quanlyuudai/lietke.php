<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<?php
    $conn=mysqli_connect("localhost","root","","web_dulich");
    $sql_lietke_ks= "SELECT * FROM khachsan";
    $kq_lietke_ks = mysqli_query($conn,$sql_lietke_ks);
?>

    <h2>Liệt kê danh sách khách sạn</h2>
    <form action="">
    <table style="width:100%" border="1" style="border-collapse: collapse;">
            <tr>
                <td>ID</td>
                <td>Tên khách sạn</td>
                <td>Địa chỉ</td>
                <td>Hình ảnh</td>
                <td>Giá</td>
                
            </tr>

            <?php
                $i=0;
                while($row=mysqli_fetch_array($kq_lietke_ks)){
                    $i++;
                
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['tenKhachSan'] ?></td>
                <td><?php echo $row['diaChi'] ?></td>
                <td><?php echo $row['hinhanh'] ?></td>
                <td><?php echo $row['gia'] ?></td>
                <td>
                    <a href="modules/quanlykhachsan/xuly.php?idkhachsan=<?php echo  $row['idKhachSan'];?>" >Xóa</a> |
                    <a href="?action=quanlykhachsan&query=sua&idkhachsan=<?php echo  $row['idKhachSan']; ?>">Sửa</a>
       
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </form>
</body>
</html>

