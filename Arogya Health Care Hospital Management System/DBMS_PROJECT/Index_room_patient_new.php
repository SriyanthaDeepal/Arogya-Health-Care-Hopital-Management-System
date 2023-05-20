<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
 header("Location: Home_room_patient_new.php");
 exit;
}

if (isset($_POST['btn-login'])) {
 
 $email = strip_tags($_POST['email']);
 $password = strip_tags($_POST['password']);
                       
 $email = $DBcon->real_escape_string($email);
 $password =$DBcon->real_escape_string($password);
 
 $query = $DBcon->query("SELECT  p_email_id,p_password FROM rooms,rooms_patient,patient WHERE rooms_patient.P_ID=patient.P_ID and rooms.H_ID=rooms_patient.H_ID and rooms.R_No=rooms_patient.R_No and p_email_id='$email'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if email/password are correct returns must be 1 row
 echo "Email address".$row['p_email_id'].'<br/>'.$email.'<br/>';
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 echo "Password is".$row['p_password'].'<br/>'.$password.'<br/>';
 echo $count.'<br/>';
 
 echo 'CHECKstrcmp'.'<br/>';
 echo '<br/>'.strcmp( $password,$row['p_password']).'<br/>';

 
 if($row['p_password']==$password)
 {echo 'password verified';}
else {echo 'password not verified';}
 if (($row['p_password']==$password)&&($count==1)) {
  $_SESSION['userSession'] = $row['H_ID']&&$row['R_No'];
  header("Location: home_room_patient_new.php");
 } else {
  $msg ="<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
 }
 $DBcon->close();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="signin-form">

 <div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Sign In.</h2><hr />
        
        <?php
  if(isset($msg)){
   echo $msg;
  }
  ?>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
   </button> 
            
            <a href="register_room_patient.php" class="btn btn-default" style="float:right;">Sign UP Here</a>
            
        </div>  
        
        
      
      </form>

    </div>
    
</div>

</body>
</html>
