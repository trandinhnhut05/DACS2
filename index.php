<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/cssHotel/style.css">
    <link rel="stylesheet" href="assets/cssHotel/reponsive.css">
    <link rel="stylesheet" href="assets/css/reponsive.css">
    <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/sss/reponsive.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <!-- <link rel="stylesheet" href="assets/css/login/style.css"> -->
    
    <title>Dream</title>
    <meta name="google-site-verification" content="UtU5cvexJnMpHKmkRKhpI07JddNgU6cUR5uljXqI5tw" />
</head>
<body>

<div class=wrapper>
        <?php
        session_start();
       
        include('admin/config/config.php');
            include('pages/menu.php');
            include('pages/main.php');
            include('pages/footer.php');
        ?>
</div>
</body>
</html>