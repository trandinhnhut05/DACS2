<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sky</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<?php
    $conn=mysqli_connect("localhost","root","","web_dulich");
    $sql_lietke_ve= "SELECT * FROM vemaybay";
    $kq_lietke_ve = mysqli_query($conn,$sql_lietke_ve);
?>

    <h2>Liệt kê danh sách khách sạn</h2>
    <form action="">
    <table style="width:100%" border="1" style="border-collapse: collapse;">
            <tr>
                <td>ID</td>
                <td>Địa điển đi</td>
                <td>Địa điểm đến</td>
                <td>Hình ảnh</td>
                <td>Giá</td>
                
            </tr>

            <?php
                $i=0;
                while($row=mysqli_fetch_array($kq_lietke_ve)){
                    $i++;
                
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['diadiemdi'] ?></td>
                <td><?php echo $row['diadiemden'] ?></td>
                <td><?php echo $row['hinhanh'] ?></td>
                <td><?php echo $row['giave'] ?></td>
                <td>
                    <a href="modules/quanlyvemaybay/xuly.php?idvemaybay=<?php echo  $row['id_vemaybay'];?>" >Xóa</a> |
                    <a href="?action=quanlyvemaybay&query=sua&idvemaybay=<?php echo  $row['id_vemaybay']; ?>">Sửa</a>
       
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </form>
</body>
</html>

