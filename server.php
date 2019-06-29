<?php

 session_start();

 $username= "";
 $email="";
 
 
 $errors = array();

 $db= mysqli_connect('localhost','root','', 'userd')or die("could not connect database..");

 $sql = "CREATE TABLE user2(
    id  INT(6) UNSIGNED AUTO_INCREMENT , 
    username VARCHAR(255) ,
    fullname VARCHAR(255) ,
    email VARCHAR(255),
      password VARCHAR(255),
 
    PRIMARY KEY(id)
 
)";
mysqli_query($db, $sql) ;




 if(isset($_POST['register_user']))
 {
 $username=mysqli_real_escape_string($db, ($_POST['username']));
 $email=mysqli_real_escape_string($db, ($_POST['email']));
 $fullname=mysqli_real_escape_string($db, ($_POST['fullname']));
 $password_1=mysqli_real_escape_string($db, ($_POST['password_1']));
 $password_2=mysqli_real_escape_string($db,($_POST['password_2']));



 if($password_1 != $password_2){array_push($errors, "password Mismatch");}
 $user_check_query="SELECT * FROM user2 WHERE username= '$username' or email='$email' LIMIT 1  ";
 $results=mysqli_query($db, $user_check_query );
 $user1 = mysqli_fetch_assoc($results);
if($user1){
  if($username==$user1['username']){array_push($errors, "Username already exist");}
  if($user1['email']==$email){array_push($errors, "email id already has a registered username");}
}
if(count($errors) == 0){
      $password= md5($password_1);
      $query="INSERT INTO user2 (username, fullname, email, password) VALUES ('$username', '$fullname', '$email', '$password') ";
       mysqli_query($db, $query) ;
      $_SESSION['username']= $username;
     $_SESSION['success']="You are now logged in";
      header('location: index.php');
    }
}

elseif(isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($db,($_POST['username']));
        $password = mysqli_real_escape_string($db, ($_POST['password_1']));
        
    
       
      
        if(count($errors)== 0){
            $password= md5($password);
            $query= "SELECT * FROM user2 WHERE username= '$username' AND password= '$password'";
            $results=mysqli_query($db, $query);
            if( mysqli_fetch_assoc($results)){
                 $_SESSION['username']= $username;
                 $_SESSION['success']="logged in successfully";
                 header('location: index.php');
            }
            else{
                array_push($errors, "Wrong username/password combination. please try again!");
            }
        }
    }
    ?> 

    