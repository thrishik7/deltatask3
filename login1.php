<?php include('server.php') ?>
<html>
<head>
 <title>Login</title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">

 </head>
 <body>
   <div class="container">
   <ul>
  
   <li><a href="login1.php">Home</a></li>
   
   <li><a href="contact.php">contact</a></li>

   
</ul>
<br> 
   <form action="login1.php" method="post">
    
   <?php include('errors.php') ?>
   <img src="avatar.png" class="avatar">
   <h2>LOGIN</h2>
    <div>
       <label for="username">Username:</label>
       <input type="text" name="username" required>
    </div>
 
 
    <div>
       <label for="password">Password:</label>
       <input type="password" name="password_1" required>
    </div>
  
      
        <button class="btn btn-primary" type="submit" name="login_user">LOG IN</button>
       
     <p>Not an USER?<a href="registration1.php"><b>register</b></a></p>
   </form>
   </div>
   </body>
   </html>