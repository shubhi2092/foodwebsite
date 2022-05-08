<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="contact">
        <h1 class="head center">Contact Us</h1>
        <div id="contact-box">
        <form action="thankyou.php" method="POST">
        <div class="form group">
         <label for="name">Name:</label>
         <input type="text" name="name" id="name" placeholder="Enter your Name">
        </div>
        <div class="form group">
            <label for="email">Email:</label>
            <input type="email" name="name" id="email" placeholder="Enter your email">
           </div>
           <div class="form group">
            <label for="phone">Phone:</label>
            <input type="phone" name="name" id="phone" placeholder="Enter your phone number">
           </div>
           <div class="form group">
            <label for="message">Message:</label>
            <textarea name="message" id="mesaage" cols="30" rows="10"></textarea>
           </div>
           <div class="form group">
           <input class="btn" type="submit" name="submit" >
           </div>
        </form>
        </div>
    </section>
</body>
</html>