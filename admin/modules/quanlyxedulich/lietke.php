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
    $sql_lietke_xe= "SELECT * FROM xedulich";
    $kq_lietke_xe = mysqli_query($conn,$sql_lietke_xe);
?>

    <h2>Liệt kê danh sách xe du lịch cho thuê</h2>
    <form action="">
    <table style="width:100%" border="1" style="border-collapse: collapse;">
            <tr>
                <td>ID</td>
                <td>Tên xe</td>
                <td>Địa chỉ giao xe</td>
                <td>Hình ảnh</td>
                <td>Giá</td>
                <td>Mẫu xe</td>
                
            </tr>

            <?php
                $i=0;
                while($row=mysqli_fetch_array($kq_lietke_xe)){
                    $i++;
                
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['tenxedulich'] ?></td>
                <td><?php echo $row['diachigiao'] ?></td>
                <td><?php echo $row['hinhanh'] ?></td>
                <td><?php echo $row['gia'] ?></td>
                <td><?php echo $row['loaixe'] ?></td>
                <td>
                    <a href="modules/quanlyxedulich/xuly.php?idxedulich=<?php echo  $row['id_xedulich'];?>" >Xóa</a> |
                    <a href="?action=quanlyxedulich&query=sua&idxedulich=<?php echo  $row['id_xedulich']; ?>">Sửa</a>
       
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </form>
</body>
</html>

