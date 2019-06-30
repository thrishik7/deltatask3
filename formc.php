<?php
session_start();
if(!isset($_SESSION['username']))
{

    $_SESSION['msg']="You must log in first to view this page";
    header("location : login1.php");
}

if(isset($_GET['logout']))
{
      
   
    unset($_SESSION['username']);
    session_destroy();
    header("location: login1.php");
}

?>
<?php

$errors = array();

$servername = "localhost";
$username = "root";
$password = "";
$usernamed= $_SESSION['username'];
// Create connection
$db = mysqli_connect($servername, $username, $password, $usernamed);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database











?>

<!--?php
 ini_set(display_errors',1);
 ?-->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="style2.css">
<title>Home Page</title>
</head>
  <body>

  <form method="post" action="formc.php">
    <div class="formx">
<div class="row">
  <div class="col-sm-6">
  <?php if(isset($_SESSION['username'])) : ?>
  
      
  <h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h1>
	  <?php endif ?>
</div>
<div class="col-sm-6">
        <nav>
             <ul>

               <li ><a href="index.php">Home</a></li>
               <li><a href="form.php">Build Form</a></li>
              
               <li class="active"><a href="response.php">Responses</a></li>
               <li><a href="">Contact</a></li>
               <li> <a href="index.php?logout='1'">logout</a> </li>
            </ul>

        </nav>

</div>

</div> </div>


  <div class="row">
<div class="col-sm-4">
<div class="navform">
<nav>
             <ul>

               <li ><a href="response.php">Analytics</a></li>
               <li><a href="notification.php">Notifications</a></li>
               <li class="active"><a href="formc.php">forms Created</a></li>
               <li ><a href="explore.php">explore</a></li>
           
            </ul>

        </nav>



</div>
</div>

<div class="col-sm-4">
   
<ul>
<?php 
           
           
           $usernamed= $_SESSION['username'];
           $db= mysqli_connect('localhost','root','', $usernamed)or die("could not connect database..");
               $sql="SELECT * FROM `forms`";
              $result=mysqli_query($db, $sql);


  ?>
  <?php if($result){
     while($row= mysqli_fetch_array($result)){

     echo "<div class='forms'>";
         
        $name= $row['forms'] ;
        echo "<button href='borm.php?ID={$name}'   name='$name' type='submit' >$name</button>";
        echo "<script> console.log('$name');</script>" ; 
echo "</div>";
     }
    }
 else {
 echo "<div class='forms'>";

 echo "no forms created yet";
  echo "</div>";
}


?>
</ul>

</div>
</div>
<?php
 $usernamed= $_SESSION['username'];
 $db= mysqli_connect('localhost','root','', $usernamed)or die("could not connect database..");
     $sql="SELECT * FROM `forms`";
    $result=mysqli_query($db, $sql);

if($result){
while($row= mysqli_fetch_array($result)){
if(isset($_POST[$row['forms']]))
{   

    $name= $row['forms'] ;
     $_SESSION['formname']= $row['forms'];
     header("location: borm.php?ID=$name");
}
}}

?>

</form>
</body>
	  
	   </html>