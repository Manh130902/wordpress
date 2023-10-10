<?php
    session_start();
    $name = $_SESSION['username'];
    $csrf_token = $_COOKIE['cookie_name'];
if(isset($_GET['comment']) ) {
    // Lấy nội dung bình luận và tên người dùng từ form
    // $comment = $_POST['comment'];
    $comment = $_GET['comment'];
    // Kết nối tới cơ sở dữ liệu
    $servername = "localhost";
    $userN = "root";
    $passW = "";
    $dbname = "webbanhang";
    $conn = new mysqli($servername, $userN, $passW, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $client_csrf_token ="1";
   
    if (hash_equals($csrf_token, $client_csrf_token)) {
        $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";

        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">
            window.location="../login/sanpham.php";
          </script>';
        } else {
            echo "Error posting comment: " . $conn->error;
        }
      } else {
        // Trả về thông báo lỗi
        echo 'CSRF token không hợp lệ';
      }
    } else {
        // Mã CSRF token không hợp lệ, từ chối xử lý yêu cầu
    }
    if(isset($_GET['csrf_token']) && $_GET['csrf_token'] === $_SESSION['csrf_token']) {
        
    // Chèn dữ liệu bình luận vào cơ sở dữ liệu
   

    $conn->close();
}
if(isset($_POST['comment']) ) {
    // Lấy nội dung bình luận và tên người dùng từ form
    $comment = $_POST['comment'];
    // $comment = $_GET['comment'];
    // Kết nối tới cơ sở dữ liệu
    $servername = "localhost";
    $userN = "root";
    $passW = "";
    $dbname = "webbanhang";
    $conn = new mysqli($servername, $userN, $passW, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $client_csrf_token = $_POST['csrf_token'];
    if (hash_equals($csrf_token, $client_csrf_token)) {
        $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";

        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">
            window.location="../login/sanpham.php";
          </script>';
        } else {
            echo "Error posting comment: " . $conn->error;
        }
      } else {
        // Trả về thông báo lỗi
        echo 'CSRF token không hợp lệ';

      }
    } else {
        // Mã CSRF token không hợp lệ, từ chối xử lý yêu cầu
    }
    $conn->close();
?>