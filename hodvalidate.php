<?php
   
   session_start();
    $db = mysqli_connect("localhost","root","","student");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $uname = $_POST['uname'];
      $pw = $_POST['pw']; 
      
      $sql = "SELECT Id FROM hod WHERE Name = '$uname' and Password = '$pw'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
       $_SESSION["uname"]=$uname;
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count >= 1) {
          header('Location:hodapprove1.php');
         
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>