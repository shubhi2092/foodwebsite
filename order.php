
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="order-style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <h1>Fill This Form To Confirm Your Order </h1>
  <h3>Your selected Item :</h3>
  <div class="form-container">
  <div class="order">
  <?php
if (isset($_POST['submit']))
 {
   $db_host="localhost";
   $db_name="food";
   $db_user="root";
   $db_pwd="";
   $con=mysqli_connect($db_host,$db_user,$db_pwd,$db_name);
   if(mysqli_connect_error())
   {
     echo mysqli_connect_error();
     exit;
   }
   else {
     echo "";
     echo nl2br("\n");
     function foodItem($title,$price,$url,$desc,$Id){
      echo '<form action="order.php" method="post"><div id="card" >
      <div class="card"  style="width: 18rem">
        <input class="foodimg" type="image" name="img" src="'.$url.'" alt="Submit" width=100% height=100% value="'.$url.'">
        <div class="card-body">
          <input class="card-title" name="title" value='.$title.'>
          <p class="card-text"></p>
        </div>
        <ul class="list-group list-group-flush">
        <input class="list-group-item"  name="price" value='.$price.'>
        <textarea class="list-group-items" name="description" rows="10" cols="30" >'.$desc.'</textarea>
        <input type="hidden" name="id" value="'.$Id.'">
        </ul>
      </div></div>
      </form> '
      ;
  }
     if($_POST['id'])
     {
       $food_id=$_POST['id'];
       $sql="SELECT * FROM food_items WHERE id=$food_id";
       $res=mysqli_query($con,$sql);
       $count=mysqli_num_rows($res);
       if($count==1)
       {
         $row=mysqli_fetch_assoc($res);
         foodItem($row['title'],$row['price'],$row['img'],$row['description'],$row['Id']);
       }
     }
    }
     
   }

 ?>
  </div>
  
  <div class="confirmation-form">
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
</body>
</html>

