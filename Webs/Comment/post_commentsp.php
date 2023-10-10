<?php
session_start();

        $id = $_SESSION['id'];
        if (isset($_POST['comment'])) {

        $comment = $_POST['comment'];
        $comment1 = htmlspecialchars($comment);
        $allow_chars = '/[^a-zA-Z0-9]/'; 
        $comment2 = preg_replace($allow_chars, '', $comment1);
        $comment3 = strip_tags($comment2);
        $name = $_POST['name'];

        $servername = "localhost";
        $userN = "root";
        $passW = "";
        $dbname = "webbanhang";
        $conn = new mysqli($servername, $userN, $passW, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_SESSION['username'])) {
            $sql = "INSERT INTO commentsp (product_id, comment_text,user_name) VALUES ('$id', '$comment3','$name')";

            if ($conn->query($sql) === TRUE) {
                header("Location: ../Comment/formcmtsp.php?id=$id");
            } else {
                echo "Error posting comment: " . $conn->error;
            }
    
            $conn->close();
        }
        else{
            echo "<script>alert('Vui Lòng đăng nhập!');</script>";
            echo "<script>window.location.href='formcmtsp.php?id=$id';</script>";
           
        }
    } else {
        echo "Please enter your comment.";
    }


?>