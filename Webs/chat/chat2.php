<?php
$servername = "localhost";
$userN = "root";
$passW = "";
$dbname = "webbanhang";
$conn = new mysqli($servername, $userN, $passW, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$from_user = $_SESSION['username'];
$to_user = $_SESSION['name1'];
$message1 = $_POST['message1'];
$message2 = htmlspecialchars($message1);
$allow_chars = '/[^a-zA-Z0-9]/'; 
$message3 = preg_replace($allow_chars, '', $message2);
$message4 = strip_tags($message3);


$query = "INSERT INTO chat (from_user, to_user, message) VALUES ('$from_user', '$to_user', '$message4')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'Tin nhắn đã được gửi thành công!';
    echo "<script>window.location.href='chat1.php?name1=$to_user';</script>";
} else {
    echo 'Có lỗi xảy ra khi gửi tin nhắn: ' . mysqli_error($conn);
}

?>