
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="cart.css">
<link rel="stylesheet" href="order-style.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
<div class="bg">
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
    <h1 class="mycartheading">MY CART</h1>

<?php

 if (empty($_SESSION["cart"])) {
    // Cart is empty
    echo "cart is empty ";
    echo "<br>";
    echo "continue shopping.............";
    echo'<div class="checkout-page">
    <a href="ordernow.php" target="_blank"> <div class="continue-shopping"><button>continue shopping</button></div> </a>
    </div>';

}

else{
   
   
echo'<div class="container">
<div class="cart-items">
    <table class="table table-success table-striped" style="width:90%">
        <thead>
            <tr>
                <th scope="col">index no.</th>
                <th scope="col">product name</th>
                <th scope="col">product price</th>
                <th scope="col">product quantity</th>
                <th scope="col">total price</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
        ';
        $total = 0;
        $qty = 0;
        $price = 0;
        $subtotal = 0;
        if (isset($_SESSION["cart"])) {
                
            foreach ($_SESSION["cart"] as $key => $value) {
            
                $total = $value['productquantity'] * $value['productprice'];
               $subtotal += $total;
               // $key = $key + 1;
               echo "<form action='cart.php' method='post'>
               <tr>
                   <th scope='row'>$key</th>
                   <td><input type='text' name='pname'  class='inputsize' value='$value[productname]' readonly></td>
                   <td><input type='num' name='pprice' class='inputsize' value='$value[productprice]' readonly></td>
                   <td><div id='display'><div><i class='far fa-edit' style='font-size:20px'></i></div><div><input type='num' name='pquantity' id='quantity' class='inputsize'  value='$value[productquantity]'></div></div></td>
                   <td><input type='num' class='inputsize' value='$total' readonly></td>
                   <td><button name='update'>Update</button></td>
                   <td><button name='remove' >Delete</button></td>
                   <td><input type='hidden' name='item' value='$value[productname]'></td>
                   <td><input type='hidden' id='subtotal' value='$subtotal'></td>
               </tr>
               <br>
               </form>";
          
            }
                   
        }
        echo '
        </tbody>
    </table> 
    </div>
    </div>
    </div>
    </div>
    <div class="checkout-page">
      
      <a href="ordernow.php" target="_blank"> <div class="continue-shopping"><button>continue shopping</button></div> </a>
      <a href="order.php" target="_blank"> <div id="checkout"><button onclick="emptyfunction();myfunction()">Proceed to Checkout</button></div></a>
   </div>'; 
   
    }
    
?>
    <script src="cart.js"></script>
</body>

</html>