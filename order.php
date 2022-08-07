<?php
 session_start();
 $total = 0;
 $subtotal = 0;
 if (isset($_SESSION["cart"])) {
                        
  foreach ($_SESSION["cart"] as $key => $value) {
  
      $total = $value['productquantity'] * $value['productprice'];
     $subtotal += $total;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="order-style.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Changa:wght@200&family=Permanent+Marker&family=Splash&display=swap" rel="stylesheet">
</head>
<body>
<div class="confirmationbg">
<nav id="navbar">
     <div id="logo">
      <img src="logo.png" alt="myonlinemeal">
     </div>
     <ul class="navitems">
        <li class="items"><a href="index.php">Home</a></li>
        <li class="items"><a href="about.php" target="_blank">About</a></li>
        <li class="items" ><a href="services.php" target="_blank"> Food Services</a></li>
        <li class="items"><a href="contactus.php" target="_blank">Contact us</a></li>
        <li class="items" id="cart"><a href="shoppingcart.php"><i class="fa fa-shopping-cart" style="font-size:25px;color:white">cart</i></a></li>
    </ul>
    </nav>

  <h1 id="confirmheading">Fill This Form To Confirm Your Order: </h1>
 
  <div class="form-container">
  <div class="order">
  <div class="confirmation-form">
  <h3>Grand Total</h3>
       <?php
          echo $subtotal;
       ?>
  <?php

$nameErr = $emailErr =$phoneErr= "";
$name = $email = $address = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    

  if (empty($_POST["address"])) {
    $address = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
}
?>
    <h6>Delivery Details:</h6>
    <span class = "err">* required field </span>  
  <form action="orderplaced.php" method="POST">
    <div>
    <label for="name"> Full name:</label>
    <input type="text" name="name" value="" required>
    </div>

    <div>
    <label for="phone"> phone number:</label>
    <input type="tel" id="phone" name="phone" placeholder="92XXXXXXXX" required>
    </div>

    <div>
    <label for="email"> Email:</label>
    <input type="email" name="email" placeholder="123@gmail.com" required>
    </div>
    
    <div>
    <label for="address">Address:</label>
    <textarea id="add" name="address" rows="4" cols="50" required></textarea>
    </div>

      <input type="submit" name="submit" >

  </form>
  
  </div>
  </div>
</div>
</div>

</body>
</html>

