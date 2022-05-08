<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hotel Booking Form</title>
  </head>
  <body>
    <h1>Book Hotel</h1>
    <form class="" action="welcome.php" method="post">
      Arrival Date:<input type="date" name="adate" value=""><br><br>
      No. of days of stay:<input type="number" name="ndays" value=""><br><br>
      Number of Members:<input type="number" name="nmem" value=""><br><br>
      Main Member Name:<input type="text" name="mname" value=""><br><br>
      Type of Room: <br><br>
      King Size<input type="radio" name="r1" value="KING SIZE">&nbsp &nbsp
      Queen Size<input type="radio" name="r1" value="QUEEN SIZE">&nbsp &nbsp
      Suite Size<input type="radio" name="r1" value="SUITE SIZE">&nbsp &nbsp <br><br>
      Complimentry Breakfast:<input type="radio" name="r2" value="Yes"><br><br>
      Breakfast Time: <br><br>
       7-8 <input type="checkbox" name="c1" value="7-8"><br><br>
       8-9 <input type="checkbox" name="c2" value="8-9"><br><br>
       9-10 <input type="checkbox" name="c3" value="9-10"><br><br>
       <input type="submit" name="submit" value="Submit"><br><hr>
    </form>
  </body>
</html>
<?php
if (isset($_POST['submit']))
 {
   $db_host="localhost";
   $db_name="shubhi";
   $db_user="root";
   $db_pwd="";
   $con=mysqli_connect($db_host,$db_user,$db_pwd,$db_name);
   if(mysqli_connect_error())
   {
     echo mysqli_connect_error();
     exit;
   }
   else {
     echo "Successfully connected";
     echo nl2br("\n");

     $name=$_POST['mname'];
     $adate=$_POST['adate'];
     $room=$_POST['r1'];
     if(isset($_POST['r2']))
     {
       $bfast=$_POST['r2'];
       if(isset($_POST['c1']))
       {
         $btime=$_POST['c1'];
       }
       else if(isset($_POST['c2']))
       {
         $btime=$_POST['c2'];
       }
       else {
         $btime=$_POST['c3'];
       }
     }
     else {
        $bfast="No";
     }
     $qry1="INSERT INTO Guest(GuestName,DateofArrival,RoomType,BreakfastChoice,TimePreference)
     VALUES('$name','$adate','$room','$bfast','$btime');";
     if(mysqli_query($con,$qry1))
    {
      echo "Inserted";
    }
    else {
      echo mysqli_error($con);
      echo "Not Inserted";

    }
  }
}
 ?>