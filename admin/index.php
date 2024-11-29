
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admincp</title>
    
    <link rel="stylesheet" href="css/styleadmin.css">
</head>
<body>
    <h3 class="title_admin">Test web du lịch</h3>
    <div class="wrapper">
    
    <?php
        include("config/config.php");
        include("./modules/header.php");
        include("./modules/menu.php");
        include("./modules/main.php");
        include("./modules/footer.php");
    ?>    
    </div>
</body>
</html>