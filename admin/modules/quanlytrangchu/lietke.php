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
    $sql_lietke_tc= "SELECT * FROM trangchu";
    $kq_lietke_tc = mysqli_query($conn,$sql_lietke_tc);
?>

    <h2>Liệt kê danh sách khách sạn</h2>
    <form action="">
        <table>
            <tr>
                <td>ID</td>
                <td>Tên Trang</td>
                <td>Thứ tự</td>
            </tr>

            <?php
                $i=0;
                while($row=mysqli_fetch_array($kq_lietke_tc)){
                    $i++;
                
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['id_trangchu'] ?></td>
                <td><?php echo $row['tentrangchu'] ?></td>
                <td><?php echo $row['thutu'] ?></td>
                <td>
                    <a href="">Xóa</a>|
                    <a href="">Sửa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </form>
</body>
</html>

