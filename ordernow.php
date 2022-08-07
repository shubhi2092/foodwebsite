<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="order-style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Changa:wght@200&family=Permanent+Marker&family=Splash&display=swap" rel="stylesheet">
    <style>
        .bcontent {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="menubg">
    
        <nav id="navbar">
            <div id="logo">
                <img src="logo.png" alt="myonlinemeal">
            </div>
            <ul class="navitems">
                <li class="items"><a href="index.php">Home</a></li>
                <li class="items"><a href="about.php" target="_blank">About</a></li>
                <li class="items"><a href="services.php" target="_blank"> Food Services</a></li>
                <li class="items"><a href="contactus.php" target="_blank">Contact us</a></li>
                <li class="items" id="cart"><a href="shoppingcart.php"><i class="fa fa-shopping-cart" style="font-size:25px;color:white">cart</i></a></li>
            </ul>
        </nav>

        <div>
        <h1 class="h-primary center"><div>
            <p>Order Tasty &</p>
            <p>Fresh Food </p>
            <p id="red">Anytime!</p>
        </div>
    </h1>
        <span class="dot"></span>
        <span class="neon">
        <img src="neon1.webp" alt="">
        </span> 
        <span class="neon2"> <img src="neon2.webp" class="place" alt=""></span>
        </div>
        <span><h6 class="hsec">
        <p>Just confirm your order and enjoy our</p>
        <p>delicious fastest delivery</p> 
        </h6>
        </span>
        
    
    </div>
    <h1 class="menuheading center">Food Menu</h1>
        <div class="background">
            <div class="card-styling">
                <?php
                $dbhost = "localhost";
                $dbname = "food";
                $dbuser = "root";
                $dbpass = "";
                $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                if (mysqli_connect_error()) {
                    echo mysqli_connect_error();
                    exit;
                } else {
                    echo " ";
                }
                $db = mysqli_select_db($con, 'food');
                $query = mysqli_query($con, 'SELECT * from food_items');

                function foodItem($title, $price, $url, $desc, $Id)
                {


                    echo '<form action="cart.php" method="POST">
                    <div class="container bcontent ">
                    <div class="card cardclass" style="width: 360px;height: 170px;">
                        <div class="row no-gutters">
                            <div class="col-sm-5" id="col1">
                            <div class="center"><input type="image" class="foodimg" name="pimg" src="' . $url . '" alt="Submit" value="' . $url . '" disabled>
                         </div>
                                       
                                        <span class="submit">
                                        <i class="fa fa-shopping-cart" style="font-size:25px;color:black"></i>
                                        <input type="submit"  class="input" name="addtocart" value="Cart">
                                        </span>
                
                            </div>
                            <div class="col-sm-7" id="col2">
                                <div class="card-body">
                                   
                              <div><h5><input type="text" class="card-title size" name="pname" value="' . $title . '" ></h5></div>
                                <div class="flex"> <span class="flex1">&#8377</span><div><input type="num" class="list-group-item input"  name="pprice" value=' . $price . ' ></div></div>
                                <div class="dropdown">
                                <textarea class="list-group-items dropbtn" name="description" rows="1" cols="30" readonly>' . $desc . '</textarea>
                                <div class="dropdown-content">
                                <textarea class="list-group-items" name="description" rows="7" cols="30" readonly>' . $desc . '</textarea>
                                </div>
                                </div>
                                <div id="priceinput"><input type="num" min="1" max="10" name="pquantity" id="inputstyle" value="1"></div>
                                <div><input type="hidden" name="pid" value="' . $Id . '"></div>
                                      
                                </div>
                
                            </div>
                        </div>
                    </div>
                </div>
                </form>';
                }
                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                    foodItem($row['title'], $row['price'], $row['img'], $row['description'], $row['Id']);
                }
                ?>
            </div>

        </div>

    

</body>

</html>