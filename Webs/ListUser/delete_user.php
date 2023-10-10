<?php
session_start();
$servername = "localhost";
$userN = "root";
$passW = "";
$dbname = "webbanhang";

$conn = new mysqli($servername, $userN, $passW, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$sql = "SELECT Admin FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$admin = $row['Admin'];
$name = $_POST ['name1'];

if ($admin ==1) {

    $sql = "DELETE FROM user WHERE UserName = '$name'";

    // Thực thi câu lệnh SQL
    if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">alert("Xóa người dùng thành công , "); 
                window.location="../login/sanpham.php";
              </script>';
    } else {
        echo '<script language="javascript">alert("Xóa người dùng không thành công"); 
                window.location="../login/sanpham.php";
              </script>';
    }
}else{
    echo '<script language="javascript">alert("Không có quyền xóa người dùng "); 
                window.location="../login/sanpham.php";
              </script>';
}


// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>

