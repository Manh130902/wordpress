<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbanhang";
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_POST['submit'])) {
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $email = $_POST['email'];
    $sql = "SELECT * FROM user WHERE UserName = '$username'";
    $check = mysqli_query($conn, $sql);
    if (mysqli_num_rows($check) > 0) {
        echo '<script language="javascript">alert("Thông tin đăng nhập đã tồn tại"); 
                window.location="registerHTML.php";
              </script>';
        die();
    } else {
        $sql = "INSERT INTO user (UserName, PassWord,Admin,Email) VALUES ('$username', '$password',0,'$email')";
        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">alert("Đăng ký tài khoản thành công"); 
                window.location="registerHTML.php";
              </script>';
        } else {
            echo "Đăng ký tài khoản thất bại: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>