<?php
$servername = "localhost";
$userN = "root";
$passW = "";
$dbname = "webbanhang";
$conn = new mysqli($servername, $userN, $passW, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  // nhận dữ liệu sản phẩm bao gồm tên, giá và tệp tin ảnh
  $name = $_POST["name"];
  $price = $_POST["price"];
  $typeproduct = $_POST["sanpham"];
  $image_name = $_FILES["image"]["name"];
  // tạo một đường dẫn và lưu trữ tệp tin ảnh
  $target_dir = "/images/";
  $target_file = $target_dir . basename($image_name);
  move_uploaded_file($_FILES["image"]["name"], $target_file);
  
  // lưu thông tin sản phẩm vào cơ sở dữ liệu
  $sql = "INSERT INTO products (name, price, image_url,type_product) VALUES ('$name', $price, '$target_file','$typeproduct')";
  mysqli_query($conn, $sql);
  
  // chuyển hướng người dùng đến trang danh sách sản phẩm
  header("Location: ../ListSP/displayproduct.php");

mysqli_close($conn);
?>