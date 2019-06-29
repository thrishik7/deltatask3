<?php include('server.php') ?>
<html>
<head>
 <title>Registration</title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">

 </head>
 <body>


   <div class="container">
      <div >
 <ul>
  
   <li><a href="login.php">Home</a></li>

   <li><a href="contact.php">contact</a></li>

   
</ul>
</div>
   <br>
   <form action="registration1.php" method="post">
   
   <?php include('errors.php') ?>
    
<?php  $errors = array(); ?>
   
   <h2>Register</h2>
    <div>
       
       <label for="username">Username:</label>
       <input type="text" name="username" required>
    </div>
    <div>
       <label for="fullname">Fullname:</label>
       <input type="text" name="fullname" required>
    </div>
    <div>
       <label for="email">EMAIL:</label>
       <input type="email" name="email" required>
    </div>
    <div>
       <label for="password">Password:</label>
       <input type="password" name="password_1" required>
    </div>
    <div>
       <label for="password">Confirm Password:</label>
       <input type="password" name="password_2" required>
    </div>
      
        <button class="btn btn-primary" type="submit"  name="register_user" >Submit</button>
       
     <p>Already a user?<a href="login1.php"><b>Log in</b></a></p>
   </form>
   </div>
   </body>
   </html>