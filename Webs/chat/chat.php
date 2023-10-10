<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
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

    .listChat {
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
</head>

<body>
 <div class="listChat">
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
  $username = $_SESSION['username'];
  $sql = "SELECT UserName FROM user";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<p>DANH SÁCH BẠN BÈ <br><br/></p>";
    while ($row = $result->fetch_assoc()) {
      $name = $row['UserName'];
      if (strtolower($name) != strtolower($username)) {
        echo "<li><strong>$name:</strong><form method='POST' action='chat1.php?name1=$name'><input type='hidden' name='name1' value='$name'><button type='submit'>Chat</button></form></li>";
      }
    }
  } else {
    echo "Không có bình luận nào.";
  }

  ?>
  <button class="btn">
      <a href="../login/sanpham.php" style="text-decoration: none;">Back!</a>
    </button>
 </div>
</body>

</html>