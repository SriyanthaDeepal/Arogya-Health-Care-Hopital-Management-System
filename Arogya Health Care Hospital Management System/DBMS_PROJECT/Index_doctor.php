<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
 header("Location: Home_doctor.php");
 exit;
}

if (isset($_POST['btn-login'])) {
 
 $email = strip_tags($_POST['email']);
 $password = strip_tags($_POST['password']);
                       
 $email = $DBcon->real_escape_string($email);
 $password =$DBcon->real_escape_string($password);
 
 $query = $DBcon->query("SELECT doctor.D_ID, D_email, D_password FROM doctor,doctor_ph WHERE doctor.D_ID=doctor_ph.D_ID and D_email='$email'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if email/password are correct returns must be 1 row
 echo "Email address".$row['D_email'].'<br/>'.$email.'<br/>';
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 echo "Password is".$row['D_password'].'<br/>'.$password.'<br/>';
 echo $count.'<br/>';
 
 echo 'CHECKstrcmp'.'<br/>';
 echo '<br/>'.strcmp( $password,$row['D_password']).'<br/>';

 
 if($row['D_password']==$password)
 {echo 'password verified';}
else {echo 'password not verified';}
 if ($row['D_password']==$password) {
  $_SESSION['userSession'] = $row['D_ID'];
  header("Location: Home_doctor.php");
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
        
        <div class="form-group">								//DISPLAY ITEMS IN THE SIGN UP PAGE
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
            
            <a href="register_doctor.php" class="btn btn-default" style="float:right;">Sign UP Here</a>
            
        </div>  
        
        
      
      </form>

    </div>
    
</div>

</body>
</html>
