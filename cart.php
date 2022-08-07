<?php
session_start();
$product_name = $_POST['pname'];
$p_price = $_POST['pprice'];
$product_quantity = $_POST['pquantity'];
?>
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
  if (isset($_POST['addtocart'])) {
    $db_host = "localhost";
    $db_name = "food";
    $db_user = "root";
    $db_pwd = "";
    $con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);
    if (mysqli_connect_error()) {
      echo mysqli_connect_error();
      exit;
    } else {


    
      if (isset($_SESSION["cart"])) {
        $check_product = array_column($_SESSION["cart"], 'productname');
        if (in_array($product_name, $check_product)) {
          foreach ($_SESSION["cart"] as $key => $val) {
            if ($_SESSION["cart"][$key]['productname'] == $product_name) {
              $_SESSION["cart"][$key]['productquantity'] = $_SESSION["cart"][$key]['productquantity'] + $product_quantity;
            
              header("location:shoppingcart.php");
            }
          
      
          }
        } else {
          $_SESSION["cart"][] = array('productname' => $product_name, 'productprice' => $p_price, 'productquantity' => $product_quantity);
         header("location:shoppingcart.php");
          
        }
      } else {
        $_SESSION["cart"][] = array('productname' => $product_name, 'productprice' => $p_price, 'productquantity' => $product_quantity);

       header("location:shoppingcart.php");
      
      }
    }
  }

  ?>

  <?php
  if (isset($_POST['remove'])) {
    $db_host = "localhost";
    $db_name = "food";
    $db_user = "root";
    $db_pwd = "";
    $con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);
    if (mysqli_connect_error()) {
      echo mysqli_connect_error();
      exit;
    } else {


      foreach ($_SESSION["cart"] as $key => $value) {
        if ($value['productname'] === $_POST['item']) {
          unset($_SESSION["cart"][$key]);
          $_SESSION["cart"] = array_values($_SESSION["cart"]);
          header("location:shoppingcart.php");
        }
      }
    }
  }

  ?>

  <?php
  if (isset($_POST['update'])) {
    $db_host = "localhost";
    $db_name = "food";
    $db_user = "root";
    $db_pwd = "";
    $con = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);
    if (mysqli_connect_error()) {
      echo mysqli_connect_error();
      exit;
    } else {
      if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
          if ($value['productname'] === $_POST['item']) {
            $_SESSION["cart"][$key] = array('productname' => $product_name, 'productprice' => $p_price, 'productquantity' => $product_quantity);
            header("location:shoppingcart.php");
          }
        }
      }
    }
  }
  
  ?>











</body>

</html>