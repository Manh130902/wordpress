<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navigation-header2 {
            position: relative;
            display: inline-block;
            padding: 12px 24px;
            background: rgb(240, 189, 242);
            font-weight: bold;
            color: rgb(red, green, blue);
            border: none;
            outline: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: large;
            text-decoration: none;
            top: 0;
            left: 80%;
        }
        .a1 {
            position: relative;
            left: 450px;
            width: 700px;
            color: black;
            height: 500px;
            max-height: 800px;
            border: 3px solid rgb(177, 142, 142);
            padding: 20px;
            background-color: beige;
            border-radius: 20px;
            text-indent: 1px;
            align-items: center;
            overflow: auto;
        }
        .a2{
            position: relative;
            left: 500px;
            top:20px;
        }

        .sendmess{
            height: 40px;
            min-width: 600px;
        }
        .btn{
            padding: 10px 10px;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $userN = "root";
    $passW = "";
    $dbname = "webbanhang";
    $conn = new mysqli($servername, $userN, $passW, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo '<a class="navigation-header2" href=chat.php>Back</a>';
    session_start();
    $username = $_SESSION['username'];
    $name1 = $_GET['name1'];
    $_SESSION['name1'] = $name1;

    ?>
    <div class="a1">
        <?php 
            $sql="SELECT * FROM chat" ; $result=$conn->query($sql);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $from_user = $row['from_user'];
            $to_user = $row['to_user'];
            $message = $row['message'];
            $message1 = htmlentities($message, ENT_QUOTES, 'UTF-8');
            if ((strtolower($username) == strtolower($from_user) && strtolower($name1) == strtolower($to_user)) ||
            (strtolower($username) == strtolower($to_user) && strtolower($name1) == strtolower($from_user))) {
            echo "<li><strong>$from_user:</strong> $message <form method='POST' action='../Comment/delete_chat.php'>
                    <input type='hidden' name='comment_id' value='$id'><button type='submits'>Xóa</button></form>
            </li>";
            }
            }
            } else {
            echo "Không có message nào.";
            }

            mysqli_close($conn);
        ?>
        <br/>
        
    </div>
        <form class="a2" action="chat2.php" method = post>
        <input class="sendmess" type="text" placeholder="Nhập tin nhắn..." name = "message1" >
        <button class="btn" type="submit">Gửi</button>
        </form>
</body>

</html>