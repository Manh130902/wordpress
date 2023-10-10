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
        bottom: -30px;
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
        right: -1300px;
        top: 80px;
    }
</style>

<body>
    <div class="container">
        <header class="navigation-header">
            <section class="top-links">
                <a href=../ListSP/displayproduct.php>Exit</a>
            </section>
        </header>

        <section class="ecoms-pageheader">
            <img src="../ListSP/resources/images/shop.svg">
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
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    echo "<div>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "<p>Price: " . $row["price"] . "</p>";
                    echo "<img src='" . $row["image_url"] . "'/>";
                    echo "<a class='button' href=FormUpdateSP.php?id=$id>Update Product</a>";
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