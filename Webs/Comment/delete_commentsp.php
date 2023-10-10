<?php
session_start();
$servername = "localhost";
$userN = "root";
$passW = "";
$dbname = "webbanhang";
$conn = new mysqli($servername, $userN, $passW, $dbname);
$id = $_POST['comment_id'];
$result1 = mysqli_query($conn, "SELECT * FROM commentsp WHERE id = '$id'");
$row1 = mysqli_fetch_assoc($result1);
$name = $row1['user_name'];
$product_id = $row1['product_id'];
if (isset($_SESSION['username'])) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_SESSION['username'];
    $sql = "SELECT Admin FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $admin = $row['Admin'];
    if ($admin == 1 || $username == $name) {
        $sql = "DELETE FROM commentsp WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">alert("Xóa bình luận thành công");
            window.location = "formcmtsp.php?id=' . $product_id . '";
            </script>';
        } else {
            echo '<script language="javascript">alert("Xóa bình luận không thành công"); 
            window.location = "formcmtsp.php?id=' . $product_id . '";
            </script>';
        }
    } else {
        echo '<script language="javascript">alert("Không có quyền xóa bình luận"); 
        window.location = "formcmtsp.php?id=' . $product_id . '";
                  </script>';
    }
} else {
    echo '<script language="javascript">alert("Vui lòng đăng nhập"); 
        window.location = "formcmtsp.php?id=' . $product_id . '";
                  </script>';


}
// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>