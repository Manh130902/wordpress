<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách người dùng</title>
</head>

<style>
  body {
    background: url('home.jpg');
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
    flex-direction: column;
  }

  .ListUser {
    position: relative;
    top: 5%;
    width: 300px;
    color: white;
    height: 400px;
    border: 3px solid rgb(177, 142, 142);
    padding: 20px;
    background: rgb(85, 54, 54);
    border-radius: 20px;
    text-indent: 1px;
    align-items: center;
  }

  button {
    position: relative;
    left: 100px;
    bottom: 20px;
  }

  p {
    position: relative;
    left: 50px;
  }

  .btn {
    position: relative;
    bottom: -40%;
    left: 40%;
    width: 70px;
  }
</style>

<body>
  <div class="ListUser">
    <?php

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'webbanhang';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    // Kiểm tra kết nối
    if ($conn->connect_error) {
      die('Kết nối thất bại: ' . $conn->connect_error);
    }

    $sql = 'SELECT * FROM user';
    $result = $conn->query($sql);


    function deleteUser($userName)
    {
      $db_host = 'localhost';
      $db_user = 'root';
      $db_pass = '';
      $db_name = 'webbanhang';
      $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


      $sql = "DELETE FROM user WHERE UserName='$userName'";
      if (mysqli_query($conn, $sql)) {
        echo "Người dùng đã được xóa thành công.";
      } else {
        echo "Lỗi: " . mysqli_error($conn);
      }
    }
    // Hiển thị danh sách người dùng và nút xóa (nếu có quyền hạn)
    if ($result->num_rows > 0) {

      echo "<p>DANH SÁCH NGƯỜI DÙNG <br><br/></p>";
      while ($row = $result->fetch_assoc()) {
        $username = $row['UserName'];
        echo "<li><strong>$username:</strong><form method='POST' action='delete_user.php'><input type='hidden' name='name1' value='$username'><button type='submit'>Xóa</button></form></li>";
      }
    } else {
      echo 'Không có user nào';
    }
    ?>
    <button class="btn">
      <a href="../login/sanpham.php" style="text-decoration: none;">Back!</a>
    </button>
  </div>
</body>

</html>