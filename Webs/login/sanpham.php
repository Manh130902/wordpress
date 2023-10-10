<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    body {
        background: url('home.jpg');
        background-size: contain;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    * {
        font-family: cursive;
        box-sizing: padding-box;
    }

    .formPostCMT {
        width: 400px;
        height: 350px;
        border: 3px solid rgb(177, 142, 142);
        padding: 20px;
        background: rgb(85, 54, 54);
        border-radius: 20px;
    }

    h2 {
        text-align: center;
        margin-bottom: 40px;
    }

    input {
        display: block;
        border: 2px solid #ccc;
        width: 95%;
        padding: 10px;
        margin: 10px auto;
        border-radius: 5px;
    }

    label {
        color: #888;
        font-size: 18px;
        padding: 10px;
    }


    h1 {
        position: relative;
        text-align: center;
        right: 0;
        color: red;
        top: 20%;
        left: 0;
        font-size: 40px;
    }

    img {
        position: relative;
        background-repeat: no-repeat;
        width: 400px;
        right: 500px;
        top: 50%;
        bottom: -100px;

    }

    .DMK {
        background: #ccc;
        font-weight: bold;
        color: rgb(red, green, blue);
        border: none;
        outline: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: large;
        top: 0;
        left: 10%
    }

    .Logout {
        background: #ccc;
        font-weight: bold;
        color: rgb(red, green, blue);
        border: none;
        outline: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: large;
        top: 0;
        left: 25%;
    }

    .ListUser {
        position: absolute;
        background: #ccc;
        font-weight: bold;
        color: rgb(red, green, blue);
        border: none;
        outline: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: large;
        top: 0;
        left: -20%;
    }

    .ListSP {
        background: #ccc;
        font-weight: bold;
        color: rgb(red, green, blue);
        border: none;
        outline: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: large;
        top: 0;
        left: -5%;
    }

    .navigation-header2 {
        background: rgb(240, 189, 242);
        font-weight: bold;
        color: rgb(red, green, blue);
        border: none;
        outline: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: large;
        top: 0;
        left: -30%;

    }

    .btn {
        position: relative;
        display: inline-block;
        padding: 12px 24px;
        text-decoration: none;
    }

    .postCmt {
        position: relative;
        bottom: 305px;
        left: -200px;
    }

    table {
        position: relative;
        left: 1px;
    }

    .Comment {
        position: relative;
        bottom: 350px;
        left: 500px;
        width: 450px;
        color: white;
        max-height: 350px;
        height: 350px;
        border: 3px solid rgb(177, 142, 142);
        padding: 20px;
        background: rgb(85, 54, 54);
        border-radius: 20px;
        text-indent: 1px;
        align-items: flex-start;
        overflow: auto;
    }

</style>

<body>
    <div class="list">
        <a class="navigation-header2 btn" href=../chat/chat.php>Chat</a>;
        <a class="ListUser btn" href="../ListUser/ListUser.php"> Danh sách người dùng </a>
        <a class="ListSP btn" href="../ListSP/displayproduct.php"> Danh sách sản phẩm </a>
        <a class="DMK btn" href="../Update/TK.php"> Tài Khoản</a>
        <a class="Logout btn" href="../logout/logout.php"> Đăng xuất </a>
    </div>



    <center>
        <h1> Chào mừng
            <?php echo $_SESSION['username']; ?> quay trở lại
        </h1>
    </center>
    <img src="chocheem.jfif" alt="anh cho chiem">

    <center class="content">

        <div style="border-style: groove;width: 25%;height: 50px" class="postCmt">

            <form class="formPostCMT" action="../comment/post_comment.php" method="post"><br><br><br>
                <table>
                    <tr>
                        <td>Comment:</td>
                        <td>
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>">
                            <textarea name="comment" rows="5" cols="30" placeholder="Please enter your comment" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input style="width: 230px;height: 40px;" type="submit" name="submit" value="Post"></td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
    <div class="Comment">
        <?php
        // connect database 
        $servername = "localhost";
        $userN = "root";
        $passW = "";
        $dbname = "webbanhang";
        $conn = new mysqli($servername, $userN, $passW, $dbname);
        // test connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM comments";
        $result = $conn->query($sql);
        // display comments
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $comment = $row['comment'];
                echo "<li><strong>$name:</strong> $comment <form method='POST' action='../Comment/delete_comment.php'><input type='hidden' name='comment_id' value='$id'><button type='submits'>Xóa</button></form></li>";
            }
        } else {
            echo "Không có bình luận nào.";
        }
        // Đóng kết nối
        $conn->close();
        ?>
    </div>
</body>

</html>