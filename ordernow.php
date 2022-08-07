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
  
<h1 class="h-primary center">Order Food</h1>
<div class="card-styling">
<?php
$dbhost="localhost";
$dbname="food";
$dbuser="root";
$dbpass="";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_error())
{
  echo mysqli_connect_error();
  exit;
}
else {
  echo " ";
}
$db=mysqli_select_db($con,'food');
$query=mysqli_query($con,'SELECT * from food_items');

function foodItem($title,$price,$url,$desc,$Id){
    echo '<form action="order.php" method="post">
    <div id="card" >
    <div class="card"  style="width: 18rem">
      <input class="foodimg" type="image" name="img" src="'.$url.'" alt="Submit" width=100% height=100% value="'.$url.'" disabled>
      <div class="card-body">
        <input class="card-title" name="title" value="'.$title.'" disabled>
      </div>
      <ul class="list-group list-group-flush">
      <input class="list-group-item"  name="price" value='.$price.' disabled>
      <textarea class="list-group-items" name="description" rows="10" cols="30" disabled>'.$desc.'</textarea>
      <input type="hidden" name="id" value="'.$Id.'">
      <input class="button" type="submit" name="submit" >
      </ul>
    </div></div>
    </form>'
    ;
}
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
      
      foodItem($row['title'],$row['price'],$row['img'],$row['description'],$row['Id']); 

    }
?>
</div>

</body>
</html>
<?php

