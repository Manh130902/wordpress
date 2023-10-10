<?php

session_start();

$servername = "localhost";
$userN = "root";
$pass = "";
$dbname = "webbanhang";

$conn = new mysqli($servername, $userN, $pass, $dbname);

$password = $_SESSION['password'];
$username = $_SESSION['username'];

if (isset($_POST['submit'])) {
  // Lấy thông tin mật khẩu cũ và mới từ form
  $old_password = $_POST['old_password'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];


  if ($old_password== $password) {
      // Mật khẩu cũ chính xác, cập nhật mật khẩu mới
      if ($new_password == $confirm_password) {
        mysqli_query($conn, "UPDATE user SET password = '$new_password' WHERE UserName ='$username'");

        // Thông báo đổi mật khẩu thành công và chuyển hướng về trang chủ
        echo '<script language="javascript">alert(" Đổi mật khẩu thành công"); 
        window.location="../login/sanpham.php";
      </script>';
      $_SESSION['password'] = $new_password;
        exit();
      }else{
        echo '<script language="javascript">alert(" Mật khẩu mới và mật khẩu xác nhận không khớp"); 
        window.location="UpdateForm.php";
        </script>';
        exit();
      }
    
  } else {
    echo '<script language="javascript">alert(" Mật khẩu cũ không chính xác"); 
    window.location="UpdateForm.php";
  </script>';
      
  }
}

mysqli_close($conn);
?> 