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


$comment_id = $_POST['comment_id'];
$result1 = mysqli_query($conn, "SELECT * FROM comments WHERE id = '$comment_id'");
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['name'];

if ($admin ==1 || $username == $name) {
    $sql = "DELETE FROM comments WHERE id = $comment_id";

    // Thực thi câu lệnh SQL
    if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">alert("Xóa bình luận thành công"); 
                window.location="../login/sanpham.php";
              </script>';
    } else {
        echo '<script language="javascript">alert("Xóa bình luận không thành công"); 
                window.location="../login/sanpham.php";
              </script>';
    }
}else{
    echo '<script language="javascript">alert("Không có quyền xóa bình luận"); 
                window.location="../login/sanpham.php";
              </script>';
}


// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>