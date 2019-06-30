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
<!--?php
 ini_set(display_errors',1);
 ?-->

<?php

$errors = array();

$servername = "localhost";
$username = "root";
$password = "";
$usernamed= $_SESSION['username'];
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE $usernamed";
mysqli_query($conn, $sql);


$sql = "CREATE DATABASE forms";
mysqli_query($conn, $sql);










?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="style1.css">
<title>Home Page</title>
</head>
  <body>
 
  <form  method="post" action="form.php">
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
               <li class="active" ><a href="">Build Form</a></li>
            
               <li><a href="response.php">Responses</a></li>
               <li><a href="">Contact</a></li>
               <li> <a href="index.php?logout='1'">logout</a> </li>
            </ul>

        </nav>

</div>
</div> </div>

<div class="row">
<div class="col-sm-7">
<div class="formc" id="formc">
 
 
    <div class="baa">
       
       <input type="text" placeholder="Untitled form" name="fname" required >
       <input type="text" placeholder="Form description" name="fdescrp" required>



 </div>

 <div class="baa" id="bass">
       
       <input type="text" placeholder="Untitled question" name="qn0" required>
       <select id="mySelect" onchange="myFunction('mySelect','mySelect2','ass0' )" name="se0" required> 
                    
                    <option>short answer </option> 
                    <option>multiple choice</option> 
                    <option>checkboxes</option> 
                    
</select> 

<div>
    <input  id="mySelect2" type="text" placeholder="answer" name="ass00" >
</div>
     
</div>


  
</div>
</div>

<div class="col-sm-5">
<div class="formco" id="formco">
<div class="baa">
<button class="btn btn-warning" onclick="add();" type="button" name="add_question">+</button>
<button class="btn btn-warning" type="submit" name="submit">CREATE</button>
<button class="btn btn-warning" onclick="mem();" type="button" name="submit2">LIMITED USERS</button>
<button class="btn btn-primary"  onclick="time();" type="button" name="submit1">TIMED</button>
<br>
</div>
<script>

function mem()
{
  var bass=document.getElementById("formco");
        var dW= document.createElement("DIV");
      
        bass.appendChild(dW);
       var di= document.createElement("input");
       di.placeholder="limit the users";
       di.setAttribute("name","mem");
       dW.appendChild(di);
}

function time()
{ var bass=document.getElementById("formco");
        var dW= document.createElement("DIV");
      
        bass.appendChild(dW);
       var di= document.createElement("input");
       di.placeholder="time";
       di.setAttribute("name","time");
       dW.appendChild(di);

}


    var i=0;
   
    var j=0;

 
    function add()
    {  

        i++;
       
        var id0='qn'+i;
        var sel0='se'+i;
        var ass0='ass'+i;
        j=0;
        var an0= ass0+j;
        console.log(sel0);
         var bass=document.getElementById("formc");
        var dW= document.createElement("DIV");
       
        bass.appendChild(dW);
       var di= document.createElement("input");
       dW.className = "baa";
       di.placeholder="Untitled question";
       di.setAttribute("name",id0);
       di.setAttribute("required","true");
       dW.appendChild(di);
       var x = document.createElement("SELECT");
       x.setAttribute("required","true");
  x.setAttribute("id",id0);
  x.setAttribute("name",sel0);
  document.body.appendChild(x);
  var dW1= document.createElement("DIV");
  var di1= document.createElement("input");
  di1.placeholder="Answers";
  di1.setAttribute("id",sel0);
  di1.setAttribute("name",an0);
  dW1.appendChild(di1);
  x.setAttribute("onchange","myFunction('"+id0+"','"+sel0+"','"+ass0+"')");
  
  var z1 = document.createElement("option");

  z1.setAttribute("value", "short answer");
  var t1 = document.createTextNode("short answer");
  z1.appendChild(t1);
  var z2 = document.createElement("option");
  z2.setAttribute("value", "multiple choice");
  var t2 = document.createTextNode("multiple choice");
  z2.appendChild(t2);
  var z3 = document.createElement("option");
  z3.setAttribute("value", "checkboxes");
  var t3 = document.createTextNode("checkboxes");
  z3.appendChild(t3);
  dW.appendChild(x);
   x.appendChild(z1);
   x.appendChild(z2);
   x.appendChild(z3);
     
      dW.appendChild(dW1);
      }


      function myFunction(id0,sel0,ass0)
      {
        var xv= document.getElementById(id0).value;
        
    
       
         
          if(xv=='short answer')
          {
          
              j=0;
              var an0= ass0+j;
              var item = document.getElementById(sel0);
              var dy= document.createElement("input");
              var parentDiv = item.parentNode;
              dy.placeholder="Answers";
              dy.setAttribute("id",sel0);
              dy.setAttribute("name",an0);
              parentDiv.replaceChild(dy,item);
              j++;
            
          }
         else if(xv=='checkboxes')
          {  
              j=0;
              var an0= ass0+j;
              var item = document.getElementById(sel0);
              var dy2=document.createElement("input");
              var dy0= document.createElement("div");
              var dy= document.createElement("div");
               dy.className="ass";
               dy0.setAttribute("id", ass0);
               
            
               var dy1=document.createElement("input");
                dy1.setAttribute("name",an0);
                dy1.setAttribute("required","true");
              dy1.placeholder="options";
              dy2.setAttribute("type", "checkbox");
              var parentDiv = item.parentNode;
              dy.setAttribute("id",sel0);
              var dyb= document.createElement("div");
              var dyb0=document.createElement("button");
              dyb0.setAttribute("type","button");
               dyb0.className="btn btn-warning";
              dyb0.innerHTML = "+";   
              dyb0.setAttribute('onclick',"checkbox('"+ass0+"');");
              dyb.appendChild(dyb0);
              dy0.appendChild(dy2);
              dy0.appendChild(dy1);
              dy.appendChild(dy0);
              dy.appendChild(dyb);
              parentDiv.replaceChild(dy,item);
              
              
        }
        else{
             j=0;
             var an0= ass0+j;
            var item = document.getElementById(sel0);
              var dy2=document.createElement("input");

              var dy0= document.createElement("div");
              var dy= document.createElement("div");
               dy.className="ass";
               dy0.setAttribute("id", ass0);
               var dy1=document.createElement("input");
               dy1.setAttribute("required","true");
               dy1.setAttribute("name",an0);
              dy1.placeholder="options";
              dy2.setAttribute("type", "radio");
              dy2.setAttribute("name","multi");
              var parentDiv = item.parentNode;
              dy.setAttribute("id",sel0);
              var dyb= document.createElement("div");
              var dyb0=document.createElement("button");
               dyb0.className="btn btn-warning";
               dyb0.setAttribute("type","button");
              dyb0.innerHTML = "+";   
              dyb0.setAttribute('onclick',"radio('"+ass0+"');");
              dyb.appendChild(dyb0);
              dy0.appendChild(dy2);
              dy0.appendChild(dy1);
              dy.appendChild(dy0);
              dy.appendChild(dyb);
              parentDiv.replaceChild(dy,item);

             
            
        }
      }


      function radio(ass09)
     {
        j++;
      var an0=ass09+j;
        var dy= document.getElementById(ass09);
        console.log(ass09);
       var dy2=document.createElement("input");
       var dy1=document.createElement("input");
             dy1.placeholder="options";
             dy1.setAttribute("name",an0);
             dy2.setAttribute("type", "radio");
             dy2.setAttribute("name","multi");
             dy.appendChild(dy2);
              dy.appendChild(dy1);
     

     }



     function checkbox(ass09)
     {
      j++;
      var an0=ass09+j;
      console.log(an0);
        var dy= document.getElementById(ass09);
       var dy2=document.createElement("input");
       var dy1=document.createElement("input");
             dy1.placeholder="options";
             dy1.setAttribute("name",an0);
             dy2.setAttribute("type", "checkbox");
             dy.appendChild(dy2);
              dy.appendChild(dy1);
     

     }


     </script>

<?php


 if(isset($_POST['submit']))
 {
  
  
  
  echo "<script>alert('form has been created');</script>";
  $usernamed= $_SESSION['username'];
  
 
  
   $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database..");
   $bd= mysqli_connect('localhost','root','', $usernamed)or die("could not connect database..");
   $formname=mysqli_real_escape_string($db, ($_POST['fname']));
  $formd=mysqli_real_escape_string($db, ($_POST['fname']));

  $sql = "CREATE TABLE $formname (
     id  INT(6) UNSIGNED AUTO_INCREMENT , 
     formdescrpt VARCHAR(255) ,
     PRIMARY KEY(id)
   )";
 
 mysqli_query($db, $sql);

 $sql = "CREATE TABLE $formname (
  id  INT(6) UNSIGNED AUTO_INCREMENT , 
  users VARCHAR(255) ,
  PRIMARY KEY(id)
)";

mysqli_query($bd, $sql);



 $sql = "CREATE TABLE `forms` (
  id  INT(6) UNSIGNED AUTO_INCREMENT , 
  forms VARCHAR(255) ,
  PRIMARY KEY(id)
)";




mysqli_query($bd, $sql);


 $sql = "CREATE TABLE `forms` (
  id  INT(6) UNSIGNED AUTO_INCREMENT , 
  forms VARCHAR(255) ,
  username VARCHAR(255),
  PRIMARY KEY(id)
)";

mysqli_query($db, $sql);
$sql="INSERT INTO `forms` (`forms`) VALUES ('$formname')";
    mysqli_query($bd, $sql);


$sql="INSERT INTO `forms` (`forms`,`username`) VALUES ('$formname','$usernamed')";
    mysqli_query($db, $sql);


for($i=0; $i<20; $i++)
{  
  $id0='qn'.$i;
  $sel0='se'.$i;
  if(isset($_POST[$id0])){
    $qn=mysqli_real_escape_string($db, ($_POST[$id0]));
    $qn1=mysqli_real_escape_string($db, ($_POST[$sel0]));
    $des=mysqli_real_escape_string($db, ($_POST['fdescrp']));
      $sql="ALTER TABLE $formname
  ADD $id0 varchar(255)";
  
mysqli_query($db, $sql);

$sql="ALTER TABLE $formname
ADD $sel0 varchar(255)";

mysqli_query($db, $sql);

for($j=0; $j<20; $j++){
  $an0='ass'.$i.$j;
  if(isset($_POST[$an0])){
    $an =mysqli_real_escape_string($db, ($_POST[$an0]));

 
  $sql="ALTER TABLE $formname
  ADD $an0 varchar(255)";
  mysqli_query($db, $sql);

  }
}
  }

}
$sql="INSERT INTO `$formname` (`formdescrpt`) VALUES ('$des')";
    mysqli_query($db, $sql);
for($i=0; $i<20; $i++)
{  
  $id0='qn'.$i;
  $sel0='se'.$i;
  if(isset($_POST[$id0])){
    $qn=mysqli_real_escape_string($db, ($_POST[$id0]));
    $qn1=mysqli_real_escape_string($db, ($_POST[$sel0]));
    $des=mysqli_real_escape_string($db, ($_POST['fdescrp']));
    $sql="INSERT INTO `$formname` ( `$id0`, `$sel0`) VALUES ('$qn','$qn1')";
    mysqli_query($db, $sql);
  for($j=0; $j<20; $j++){
  $an0='ass'.$i.$j;
  if(isset($_POST[$an0])){
    $an =mysqli_real_escape_string($db, ($_POST[$an0]));
    $sql="INSERT INTO `$formname` (`$an0`) VALUES ('$an')";
    mysqli_query($db, $sql);
  }
}
  }

}

for($i=0; $i<20; $i++)
{  
  $id0='qn'.$i;
  if(isset($_POST[$id0])){

    $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database..");
    $qn=mysqli_real_escape_string($db, ($_POST[$id0]));
    $sql="ALTER TABLE $formname
  ADD $qn varchar(255)";
  $bd= mysqli_connect('localhost','root','', $usernamed)or die("could not connect database..");
mysqli_query($bd, $sql);
  }
}






 }












?>

</div>
</div>
</div>


</form>

</body>
	  
	   </html>