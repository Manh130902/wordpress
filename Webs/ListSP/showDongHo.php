<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../academyLabHeader.css">
    <link rel="stylesheet" href="../labsEcommerce.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sản Phẩm</title>
</head>

<style>
    body {
        background-size: 100%;
    }

    .addproduct {
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
        left: 30%;
        top: 10%;
        margin-top: 10px;
    }

    .navigation-header {
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
        bottom: -50px;
        left: 450px;
    }

    .navigation-header1 {
        position: relative;
        display: inline-block;
        margin-top: 10px;
        padding: 12px 24px;
        background: rgb(240, 189, 242);
        font-weight: bold;
        color: rgb(red, green, blue);
        border: none;
        outline: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: large;
        top: 10%;
        right: -10%;
    }
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
        top: 10%;
        left: 20%;
    }

    .ecoms-pageheader {
        position: relative;
        left: 450px;
        width: 10px;
    }
    .updateproduct{
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
        left: 40%;
        top: 10%;
    }
    .container{
        position: relative;
        top: 100px;
    }
</style>

<body>
<?php
    session_start();
    if(isset($_SESSION['username'])) {

        $username = $_SESSION['username'];
        $servername = "localhost";
        $userN = "root";
        $passW = "";
        $dbname = "webbanhang";

        $conn = new mysqli($servername, $userN, $passW, $dbname);
        $sql = "SELECT Admin FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $admin = $row['Admin'];
        if ($admin == 1) {
            echo '<a class="navigation-header2" href=../login/sanpham.php>Home</a>';
            echo '<a class="addproduct" href="../AddSP/FormAddSP.html"> Thêm sản phẩm </a>';
            echo '<a class="updateproduct" href="../AddSP/UpdateSP1.php"> Sửa sản phẩm </a>';
        }else{
            echo '<a class="navigation-header1" href=../login/sanpham.php>Home</a>';
        }
    }else{
        echo '<a class="navigation-header" href=../login/login.php>Login</a>';
    }
    
    ?>
    <div class="container">

        <section class="ecoms-pageheader">
            <img src="resources/images/shop.svg">
        </section>

        <section class="search-filters">
            <label>Refine your search:</label>
            <br> </br>
            <a href="displayproduct.php">All</a>
            <a href="showManHinh.php">Màn Hình</a>
            <a href="showloa.php">Loa</a>
            <a href="showDongHo.php">Đồng Hồ</a>
        </section>
        <br> </br>

        <section class="container-list-tiles">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "webbanhang";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM products  where type_product ='DongHo'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    echo "<div>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "<p>Price: " . $row["price"] . "</p>";
                    echo "<img src='" . $row["image_url"] . "'/>";
                    echo "<a class='button' href=../Comment/formcmtsp.php?id=$id>View details</a>";
                    echo "</div>";
                }
            } else {
                echo "alert('No products found')";
            }

            $conn->close();
            ?>
        </section>
    </div>
</body>

</html>