<!doctype html>
<html lang="en">
  <head>
    <title>REGISTER</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">

    <style>
      

        body {
          background: #C5E1A5;
        }
        form {
          width: 60%;
          margin: 60px auto;
          background: #efefef;
          padding: 60px 120px 80px 120px;
          text-align: center;
          -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
          box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
          border-radius: 3px;
        }
        label {
          display: block;
          position: relative;
          margin: 40px 0px;
        }
        
        .input {
          width: 100%;
          padding: 10px;
          background: transparent;
          border: none;
          outline: none;
        }

        button {
          display: inline-block;
          padding: 12px 24px;
          background: rgb(220,220,220);
          font-weight: bold;
          color: rgb(120,120,120);
          border: none;
          outline: none;
          border-radius: 3px;
          cursor: pointer;
          transition: ease .3s;
        }

        button:hover {
          background: #8BC34A;
          color: #ffffff;
        }

    </style>
  </head>
  <body>
  <?php
  $id = $_GET['id'];
  $_SESSION['id'] = $id;
  ?>
  <form action="UpdateSP.php" method="post" enctype="multipart/form-data">

    <label for="name">Tên sản phẩm:</label>
    <input type="text" name="name" ><br><br>
  
    <label for="price">Giá sản phẩm:</label>
    <input type="text" name="price" ><br><br>

    <br><br>
    <input type="file" name="image" id="name">
  
    <label >Choose a Product:</label>
    <select name="sanpham">
      <option value="Loa">Loa</option>
      <option value="DongHo">DongHo</option>
      <option value="ManHinh">ManHinh</option>
    </select>
    <br> </br>

    <button type="submit" name="submit">Lưu sản phẩm</button>

  </form>
</form>

  </body>

</html>