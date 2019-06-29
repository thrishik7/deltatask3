<?php
session_start();

if(isset($_GET['logout']))
{
      
   
    
    session_destroy();
    header("location: login1.php");
}



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

<link rel="stylesheet" href="style1.css">
<title>Home Page</title>
</head>
  <body>
 
  <form  method="post" action="borm.php">
<div class="formx">
<div class="row">
  <div class="col-sm-6">
 
</div>
<div class="col-sm-6">
        <nav>
             <ul>

               <li ><a href="index.php">Home</a></li>
               <li  ><a href="">Build Form</a></li>
            
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
       
      <?php 
      
     $saja= $_SESSION['formname'];
      echo "<p>$saja</p>"; ?>
      <?php    
           $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database..");
            $borm= $_SESSION['formname'];
           $sql="SELECT * FROM `$borm` WHERE  NOT formdescrpt='NULL'";
              $result=mysqli_query($db, $sql); 
              $row = mysqli_fetch_array($result);
              $sala=$row['formdescrpt'];
              echo "<p>$sala</p>";
              ?>
     



 </div>
 
<?php 

 
$db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database..");
 $borm= $_SESSION['formname'];

for($i=0; $i<20; $i++)
{
$id0='qn'.$i;
$sel0='se'.$i;

$sql="SELECT * FROM `$borm` WHERE  NOT `$id0`='NULL' AND NOT `$sel0`='NULL'";
   $result=mysqli_query($db, $sql); 

   if($result){
    $row= mysqli_fetch_assoc($result);
   $sala=$row[$id0];
   $k=$i+1;
echo " <div class='baa' id='bass'>";
echo "<p>$k.$sala</p>";
if($row[$sel0]=='short answer')
{
  $h=0;
  $an0='ass'.$i.$h;
  $fn0='ass'.$i;
echo "<input  id='mySelect2' type='text' placeholder= 'answer' name='$fn0' >";}
else if($row[$sel0]=='multiple choice')
{
    for($j=0; $j<20; $j++)
    {
        $an0='ass'.$i.$j;
        $sql="SELECT * FROM `$borm` WHERE  NOT `$an0`='NULL'";
        $result=mysqli_query($db, $sql); 
        if($result){
          $fn0='ass'.$i;
            $row= mysqli_fetch_assoc($result);
            $sala=$row[$an0];
            echo " <div class='ass' >";
            echo "<table border='0'>";
            echo "<tr>";
            echo "<td><input type='radio' id='$an0' name='$fn0' value='$sala'></td>"; 
            echo "<td><label for='$an0' >$sala</label></td>";
            echo"</tr>";
            echo"</table>";
            echo"</div>";
    }

}  

}
else if($row[$sel0]=='checkboxes')
{
    for($j=0; $j<20; $j++)
    {
        $an0='ass'.$i.$j;
        
        $sql="SELECT * FROM `$borm` WHERE  NOT `$an0`='NULL'";
        $result=mysqli_query($db, $sql); 
        if($result){
            $fn0='ass'.$i.$j;
          
            $row= mysqli_fetch_assoc($result);
            $sala=$row[$an0];
            echo " <div class='ass' >";
            echo "<table border='0'>";
            echo "<tr>";
            echo "<td><input type='checkbox' id='$an0' name='$fn0' value='$sala'></td>"; 
            echo "<td><label for='$an0'  >$sala</label></td>";
            echo"</tr>";
            echo"</table>";
            echo"</div>";
    }

}

}







echo "</div>";
   }
}







?>
       
      

     



       <button class="btn btn-warning" type="submit" name="submit0">submit</button>


       <?php
        if(isset($_POST['submit0']))
           {  
          $admin=$_SESSION['admin'];
          $user=$_SESSION['username'];
          $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database.."); 
          $dab= mysqli_connect('localhost','root','',$admin)or die("could not connect database..");   
          $borm= $_SESSION['formname'];
        
        
          for($i=0; $i<20; $i++)
         {
           $qn="qn".$i;
          $sel="se".$i;
           $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database.."); 
            $sql="SELECT * FROM `$borm` WHERE  NOT `$qn`='NULL' ";
            $result=mysqli_query($db, $sql); 

                   if($result)
   {
                         $row= mysqli_fetch_assoc($result);
                         $sala=$row[$qn];

                         $j=0;
    $an0='ass'.$i.$j;
    $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database..");
    $sql="SELECT * FROM `$borm` WHERE  NOT `$sel`='NULL'";
    $result=mysqli_query($db, $sql); 
     
    if($result)
    {
      $row= mysqli_fetch_assoc($result);
           if($row[$sel]=='checkboxes')
      {

        $sql="SELECT * FROM `$borm` WHERE  NOT `$an0`='NULL'";

        $result=mysqli_query($db, $sql); 
    
        if($result)
        {
          $newvalues="";
          for($j=0; $j<20; $j++)
          {
            $fn0='ass'.$i.$j;

            $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database..");

        $sql="SELECT * FROM `$borm` WHERE  NOT `$fn0`='NULL'";

        $result=mysqli_query($db, $sql); 
    
        if($result)
         {
          
          
          if(isset($_POST[$fn0]))
          
          {
            $fn0='ass'.$i.$j;
          $dab= mysqli_connect('localhost','root','',$admin)or die("could not connect database.."); 
        $yo =mysqli_real_escape_string($dab, ($_POST[$fn0]));
       
        $newvalues=$newvalues.$yo.',';
          } 
         }
          }
          $dab= mysqli_connect('localhost','root','',$admin)or die("could not connect database.."); 
          $sql="INSERT INTO `$borm` ( `users`, `$sala`) VALUES ('$user','$newvalues')";
          mysqli_query($dab, $sql);


      }}
  else{

    $db= mysqli_connect('localhost','root','', 'forms')or die("could not connect database..");
    $sql="SELECT * FROM `$borm` WHERE  NOT `$an0`='NULL'";

    $result=mysqli_query($db, $sql); 

    if($result)
    {

      
       $fn0='ass'.$i;
      $row= mysqli_fetch_assoc($result);

  $dab= mysqli_connect('localhost','root','',$admin)or die("could not connect database..");   


  $an =mysqli_real_escape_string($dab, ($_POST[$fn0]));
   

    $sql="INSERT INTO `$borm` ( `users`, `$sala`) VALUES ('$user','$an')";
    mysqli_query($dab, $sql);
    
    }
  }
}}
}
}
       ?>

  
</div>
</div>
</div>


</form>

</body>
	  
	   </html>