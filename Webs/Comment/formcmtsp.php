<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body{
        background-color: whitesmoke;
    }
    .Exit {
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
        left: 90%;
    }

    .Exit2 {
        position: relative;
        top: 0;
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
        left:90%;
    }

    .giohang {
        position: relative;
        top: 0;
        display: inline-block;
        left: 70%;
        object-fit: cover;
    }

    .displayCMT {
        padding: 0 20px;
        border-radius: 10px;
        word-wrap: break-word;
        overflow-wrap: break-word;
        background: rgba(0,0,0,.05);
    }

    .name {
        position: relative;
        right: 480px;
        top: 70px;
    }

    .post {
        position: relative;
        top: 10px;
    }

    .tensp {
        position: relative;
        top: -20%;
        font-size: 2vw;
    }

    .sp {
        position: relative;
        top: -25%;
        font-size: 2vw;
    }


    .addcmt {
        width: 15%;
        min-width: 140px;
        height: 40px;  
    }

    img{
        width: 250px;
        aspect-ratio: 1;
    }
   

    .item {
        padding: 20px;
        width: 100%;
    }
    .container{
        padding: 20px;
        display: grid;
        gap: 20px;
        grid-template-columns: 1fr 1fr;
    }
    .items{
        padding:20px;
        display: flex;
        justify-content: space-between;
        align-items : center;
        background: rgba(0,0,0,0.05);
        border-radius: 10px;
    }
    .items .info-product{
        display: flex;
        flex-direction: column;
        gap:20px;

    }

</style>

<body>
    <div>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webbanhang";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        session_start();
        $id = $_GET['id'];
        $id = mysqli_real_escape_string($conn, $id);
        $id = preg_replace('/[^a-zA-Z0-9]/', '', $id);
        $name = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');

        $_SESSION['id'] = $id;
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if (isset($_SESSION['username'])) {
            echo '<a href="../ListSP/displayproduct.php" class="Exit">Close</a>';

        } else {
            echo '<a href="../index.php" class="Exit2">Close</a>';
        }

        if (mysqli_num_rows($result) > 0) {
            // Hiển thị thông tin sản phẩm
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row["name"];
                $price = $row["price"];
                $image = $row["image_url"];
                echo " <div class='container'>";
                    echo " <div class='items'>";
                        echo " <div class='info-product'>";
                            echo '<h3 class="tensp">' . $row["name"] . '</h3>';
                            echo '<h3 class="sp">Giá ' . $row["price"] . '</h3>';
                            echo " <form method='POST' action='../cart/add.php'>";
                                echo "<input class='addcmt' type='submit'  value='Thêm vào giỏ hàng'>";
                                echo "<input type='hidden' name='name_pro' value='$name' > ";
                                echo "<input type='hidden' name='price_pro' value=$price >";
                            echo "</form> ";
                        echo " </div>";
                        echo "<img src='" . $row["image_url"] . "' />";
                    echo " </div>";
            }
        } else {
            echo "Không có sản phẩm nào";
        }
        // echo "SELECT * FROM products WHERE id = '$id'";
        ?>
        <div class="item">
            <form class="comment-form" action="../comment/post_commentsp.php" method="post">
                <style>
                    .comment-form {
                        max-width: 1000px;
                        margin: 0 auto;
                        min-width: 500px;
                    }

                    label {
                        display: block;
                        margin-bottom: 5px;
                        font-weight: bold;
                    }

                    input,
                    textarea {
                        display: block;
                        width: 100%;
                        padding: 10px;
                        border: 1px solid #ccc;
                        border-radius: 3px;
                        margin-bottom: 10px;
                    }

                    button {
                        display: block;
                        background-color: #007bff;
                        color: #fff;
                        border: none;
                        border-radius: 3px;
                        padding: 10px;
                        cursor: pointer;
                    }
                </style>
                <label for="name">Tên của bạn:</label>
                <input type="text" id="name" name="name" required>
                <label for="comment">Bình luận của bạn:</label>
                <textarea id="comment" name="comment" required></textarea>

                <button type="submit">Gửi bình luận</button>
                <br><br><br><br><br>

            </form>



        </div>
        <div class="displayCMT">
                        <?php
                        $sql = "SELECT * FROM commentsp where product_id = '$id'";
                        $result = $conn->query($sql);
                        echo "<p style='font-size: 20px;font-style: bold;text-align:center;'>Các bình luận</p>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['user_name'];
                                $comment = $row['comment_text'];
                                echo "<div class='cmt-item'>";
                                echo "<p><strong>$name:</strong> $comment <form method='POST' action='../Comment/delete_commentsp.php'><input type='hidden' name='comment_id' value='$id'><button type='submits'>Xóa</button></form></p>";
                                echo "</div>";
                            }
                        } else {
                            echo "Không có bình luận nào.";
                        }
                        $conn->close();
                        ?>
                    </div>
    </div>
    </div>
</body>

</html>