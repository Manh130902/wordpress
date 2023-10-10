<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if ($_POST("submit")) {
  $product_id = $_POST["product_id"];
  $product_name = "Áo thun nam";
  $product_price = 200000;
  $quantity = $_POST["quantity"];

  // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
  session_start();
  $is_product_in_cart = false;
  for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
    if ($_SESSION["cart"][$i]["product_id"] == $product_id) {
      $_SESSION["cart"][$i]["quantity"] += $quantity;
      $is_product_in_cart = true;
      break;
    }
  }

  // Nếu sản phẩm chưa có trong giỏ hàng thì thêm sản phẩm vào giỏ hàng
  if (!$is_product_in_cart) {
    $product = array(
      "product_id" => $product_id,
      "product_name" => $product_name,
      "product_price" => $product_price,
      "quantity" => $quantity
    );
    $_SESSION["cart"][] = $product;
  }
}
?>

</body>
</html>