<?php
// Kết nối đến CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbanhang";

$conn = new mysqli($servername, $username, $password, $dbname);

session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Lấy giá trị sản phẩm từ form
$id = $_SESSION['id'];
$product_name = $_POST['name'];
$product_price = $_POST['price'];
$typeproduct = $_POST["sanpham"];
$image_name = $_FILES["image"]["name"];
// tạo một đường dẫn và lưu trữ tệp tin ảnh
$target_dir = "/images/";
$target_file = $target_dir . basename($image_name);
move_uploaded_file($_FILES["image"]["name"], $target_file);

// Cập nhật thông tin sản phẩm vào CSDL
$sql = "UPDATE products SET name='$product_name', price='$product_price' ,image_url='$target_file', type_product = '$typeproduct'WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    echo '<script language="javascript">alert("Sản phẩm đã được cập nhật thành công"); 
    window.location="../ListSP/displayproduct.php";
  </script>';
} else {
    echo "Lỗi khi cập nhật sản phẩm: " . mysqli_error($con);
}

mysqli_close($conn);
?>