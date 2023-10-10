<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Kết nối đến CSDL
$conn = new mysqli('localhost', 'root', '', 'webbanhang');

$username = $_SESSION['username'];
// Lấy email mới và mật khẩu từ biến POST
$new_email = $_GET['new-email'];
$password = $_GET['password'];

// Kiểm tra mật khẩu hiện tại có đúng không
$query = "SELECT password FROM user WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$hashed_password = $row['password'];

if ($password != $hashed_password) {
    echo '<script language="javascript">alert(" Mật khẩu không đúng"); 
        window.location="FormUpdateEmail.php";
      </script>';
}else{
    $query = "UPDATE user SET Email='$new_email' WHERE UserName='$username'";
mysqli_query($conn, $query);


echo '<script language="javascript">alert(" Thay đổi email thành công"); 
        window.location="FormUpdateEmail.php";
      </script>';
}

mysqli_close($conn);
?>

