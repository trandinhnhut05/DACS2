<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_dulich";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý đăng nhập
if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sử dụng Prepared Statement để bảo mật
    $stmt = $conn->prepare("SELECT * FROM khachhang WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['dangky'] = $user['name'];
            $_SESSION['khachhang_id'] = $user['khachhang_id'];
            echo "Đăng nhập thành công!";
            header("Location: index.php?dream=trangchu");
            exit();
        } else {
            echo "Mật khẩu không chính xác!";
        }
    } else {
        echo "Email không tồn tại!";
    }
    $stmt->close();
}

// Xử lý đăng ký
if (isset($_POST['dangky'])) {
    $name = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    $giaohang = 0; // Giá trị mặc định khi đăng ký mới

    if (empty($name) || empty($email) || empty($password) || empty($phone) || empty($address)) {
        echo "Vui lòng điền đầy đủ thông tin.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        // Sử dụng Prepared Statement
        $stmt = $conn->prepare("INSERT INTO khachhang (name, phone, address, email, password, giaohang) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $name, $phone, $address, $email, $hashed_password, $giaohang);

        if ($stmt->execute()) {
            echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
        } else {
            echo "Lỗi đăng ký: " . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
    <title>Document</title>
  <style>
    body {
    background-image: url("https://wall.vn/wp-content/uploads/2020/04/cau-rong-da-nang.jpg");
    background-size: cover; /* Ensures the image covers the entire background */
    background-repeat: no-repeat; /* Prevents the image from repeating */
        }
        * {
            box-sizing: border-box;
        }
        h1 {   
            font-weight: bold;
            margin: 0;
        }
        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }
        span {
            font-size: 12px;
        }
        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 10px 0;
            
        }
        .container {
            position: relative;
            width: 768px;
            max-width: 100%;
            min-height: 600px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            font-family: "Montserrat",sans-serif;
            margin: 0 auto;
            margin-top: 8%;
        }
        .overlay-container {
            display: none;
        }
        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }
        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }
        .sign-up-container {
            right: 0;
            width: 50%;
            z-index: 1;
        }
        .form-container form {
            height: 100%;
            background: #fff;
            padding: 0 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .social-container {
            margin: 15px 0;
        }
        .social-container a {
            height: 40px;
            width: 40px;
            border: 1px solid #ddd;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
        }
        .form-container input {
            width: 100%;
            background: #eee;
            border: none;
            box-shadow: 0px 0px 1px 1px #ccc;
            padding: 12px 15px;
            margin: 8px 0;
        }
        button {
            background-color: #5da5ef;
            background-image: linear-gradient(254deg, #5da5ef 0%, #E0C3FC 100%);
            color: #fff;
            border: 1px solid #ff4b2b;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }
        button:active {
            transform: scale(0.95);
        }
        button:focus {
            outline: none;
        }
        button.sign {
            background: transparent;
            border-color: #fff;
        }
        .sign-up-container {
            left: 0;
            opacity: 0;
        }
        .overlay-container {
            display: block;
            position: absolute;
            z-index: 100;
            width: 50%;
            height: 100%;
            top: 0;
            left: 50%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
        }
        .overlay {
            position: relative;
            height: 100%;
            width: 200%;
            left: -100%;
            
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 50%, #69c4e9 100%);

            color:#fff ;
            transform: translateY(0);
            transition: transform 0.6s ease-in-out; 
        } 
        .overlay-panel {
            position: absolute;
            top: 0;
            height: 100%;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            text-align: center;
            transform: translateY(0);
            transition: transform 0.6s ease-in-out;
        }   
        .overlay-right {
            right: 0;
            transform: translateY(0);
        }
        .overlay-left {
            transform: translateY(-20%);
            top: 20%;
        }
        .container.right-panel-active {
            & .sign-in-container {
                transform: translatey(100%);
            }
            & .overlay-container {
                transform: translateX(-100%);
            }
        }
        .container.container.right-panel-active {
            & .sign-up-container {
                transform: translateX(100%);
                opacity: 1;
                z-index: 5;

            }
            & .overlay {
                transform: translateX(50%);
            }
            & .overlay-right {
                transform: translateY(20%);
            }
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
            display: block;
        }
  </style>
</head>
<body>
    
    <div class="container" id="container">
        <div class="form-container sign-up-container">
           <form  id="signUpForm" action="" method="POST">
                <h1>Tạo tài khoản</h1>
                <div class="social-container">
                    <a href="#" class="social"> <i class="ti-facebook"></i></a>
                    <a href="#" class="social"> <i class="ti-google"></i></a>
                    <a href="#" class="social"> <i class="ti-twitter"></i></a>
                </div>
                 <span>
                    hoặc sử dụng email của bạn để đăng ký
                </span>
                <input type="text" name= "user" placeholder="Người dùng">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Số điện thoại">
                <input type="text" name="address" placeholder="Địa chỉ">
                <input type="password"  id="password" name="password" placeholder="Mật khẩu">
                <input type="password"  id="confirmPassword" placeholder="Xác nhận mật khẩu?">
                <span id="message" class="error-message"></span>
                <input type="submit" name="dangky" id="" Value="Đăng Ký">

           </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="" method="POST">
                 <h1>Đăng nhập</h1>
                 <div class="social-container">
                     <a href="#" class="social"> <i class="ti-facebook"></i></a>
                     <a href="#" class="social"> <i class="ti-google"></i></a>
                     <a href="#" class="social"> <i class="ti-twitter"></i></a>
                 </div>
                  <span>
                    hoặc sử dụng tài khoản
                 </span>
                 <input type="email" name="email" placeholder="Email">
                 <input type="password" name="password" placeholder="Password">
                 <a href="#">Bạn quên mật khẩu? </a>
                 <input type="submit" name="dangnhap" id="" Value="Đăng nhập">
            </form>
         </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng trở lại</h1>
                    <p>Để duy trì kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="sign" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn!</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    <button class="sign" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
        
    </div>
    
   <script >
     const byId = (id) => {
        return document.getElementById(id);
        }
        const $signUpButton = byId ('signUp');
        const $signInButton = byId ('signIn');
        const $container = byId ('container');

        $signUpButton.addEventListener(
            'click',
            () => {
                $container.classList.add(
                    'right-panel-active'
                );
            },
        );
        $signInButton.addEventListener(
            'click',
            () => {
                $container.classList.remove(
                    'right-panel-active'
                );
            },
        );
        document.getElementById('signUpForm').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;
        var message = document.getElementById('message');

        if (password !== confirmPassword) {
        message.textContent = 'Mật khẩu không khớp!';
        event.preventDefault(); // Ngăn không cho gửi biểu mẫu nếu mật khẩu không khớp
        } else {
        message.textContent = '';
        }
        });
   </script>
</body>
</html>