<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
 header("Location: home_doctor.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {				//POST IS HERE SO IT WILL DISPLAY HTML CODE ON THE BOTTOM  AND COLLECT DATA FROM HTML ON THE SPOT AND IT CONNECTS TO DB INSERT DATA INTO IT
 
 $uname = strip_tags($_POST['dname']);
 $email = strip_tags($_POST['email']);
 $upass = strip_tags($_POST['password']);
 $uage=strip_tags($_POST['age']);
 $utime=strip_tags($_POST['time']);
$uid=strip_tags($_POST['id']);
$ugender=strip_tags($_POST['gender']);
$uphone=strip_tags($_POST['phone']);
$upatient=strip_tags($_POST['patients']);
$ucat=strip_tags($_POST['dcat']);

 $uname = $DBcon->real_escape_string($uname);
 $email = $DBcon->real_escape_string($email);
 $upass = $DBcon->real_escape_string($upass);
  $uid = $DBcon->real_escape_string($uid);
 $uage = $DBcon->real_escape_string($uage);
  $ucat = $DBcon->real_escape_string($ucat);
$utime = $DBcon->real_escape_string($utime);
$upatient= $DBcon->real_escape_string($upatient);
$ugender= $DBcon->real_escape_string($ugender);
$uphone = $DBcon->real_escape_string($uphone);
echo $uname.'<br/>';
echo  $email.'<br/>';
echo $upass.'<br/>';
echo $uid.'<br/>';
echo $uage.'<br/>';
echo  $utime.'<br/>';
echo $uphone.'<br/>';
echo $upatient.'<br/>';
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $DBcon->query("SELECT D_email FROM doctor,doctor_ph WHERE doctor.D_ID=doctor_ph.D_ID and D_email='$email'");
 $count=$check_email->num_rows;
 
 
 echo 'Count'.$count.'<br/>';
  if ($count==0) {
  //*****************************
  //$query = "INSERT INTO patient(id,email_id,password,Name,Age,Hospital Admitted in,Doctor treating,Room No.,Medicine required,Bill to be paid,Appointment timings) VALUES('$uid' ,'$email', '$hashed_password'  ,'$uname','$uage','$uhospital','$udoctor','$uroom','$umedicine','$ubill','$uappointment')";
  $query="INSERT INTO `doctor` (`D_ID`, `D_name`, `D_age`, `D_gender`, `D_time`, `D_email`, `D_password` ,`D_patients`,`D_cat`) VALUES ('$uid', '$uname', '$uage', '$ugender', '$utime', '$email', '$upass' ,'$upatient','$ucat')"; 
  $query1="INSERT INTO `doctor_ph` (`D_ID` , `D_Phno`) VALUES ('$uid' , '$uphone')";
   
  if ($DBcon->query($query)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
  }
  
 } else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken query!
    </div>";
   
 }
   if ($DBcon->query($query1)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
  }
  
 } else {
  
  
  $msg = "<div class='alert alert-danger'>
     
    </div>";
   
 }
 
 $DBcon->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>

<div class="signin-form">

 <div class="container">
     
        
       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
        <?php
  if (isset($msg)) {
   echo $msg;
  }
  ?>
          
//***********************************************************************************************************************************
        <div class="form-group">
        <input type="text" class="form-control" placeholder="D_name" name="dname" required  />
        </div>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required  />
        </div>
        
       
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Doctorage" name="age" required  />
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="time" name="time" required  />
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="ID" name="id" required  />
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="D_gender" name="gender" required  />
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="D_Phno" name="phone" required  />
        </div>
       <div class="form-group">
        <input type="text" class="form-control" placeholder="patient" name="patients" required  />
        </div>
       <div class="form-group">
        <input type="text" class="form-control" placeholder="cat" name="dcat" required  />
        </div>
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-signup">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
   </button> 
            <a href="index_doctor.php" class="btn btn-default" style="float:right;">Log In Here</a>
        </div> 
      
      </form>

    </div>
    
</div>

</body>
</html>

<?php
  $username = 'root';
  $password = '';
  $hostname ='127.0.0.1';
  $sqldb='hospital_management';
  $con=mysqli_connect($hostname,$username,$password ,$sqldb);
// Check connection
  if (mysqli_connect_errno())
  {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  // Change database to "test"
  @mysqli_select_db($con,$sqldb);
    echo 'connected to mysqli_select_db function';

// ...some PHP code for database "test"...
   function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
	echo '<br/>Inside mysqli_result';
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}
echo '<br/>this is set';
  
// Perform queries 
if($query_sql=mysqli_query($con,"SELECT * FROM doctor,doctor_ph,hospital,hospital_doctor WHERE hospital.H_ID=hospital_doctor.H_ID and doctor.D_ID=hospital_doctor.D_ID and doctor.D_ID=doctor_ph.D_ID  "))
{
	echo '<br/>connected';
}
else
{echo '<br/>not connected';}
//mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) 
//VALUES ('Glenn','Quagmire',33)");

  //to fetch the data from the database
  
  echo '<br/>the data in the table is<br/>';
  
  if(mysqli_num_rows($query_sql) == NULL)
  {echo 'No query provided so far';}
 else
 {
echo "<table border='1'>";
echo "<tr> <th>'DID'</th> <th>'DNAME'</th> <th>'DAGE'</th> <th>'DGENDER'</th>     <th>'DTIME'</th> <th>'Demail'</th> <th>'D_Phno'</th><th>'H_NAME'</th><th>'D_patients'</th><th>'D_cat'</th></tr>";
// keeps getting the next row until there are no more to get
while($row =mysqli_fetch_assoc($query_sql)) {

// Print out the contents of each row into a table
    echo "<tr><td>"; 
    echo $row['D_ID'];
    echo "</td><td>"; 
    echo $row['D_name'];
    echo "</td><td>";
    echo $row['D_age'];
    echo "</td><td>";
    echo $row['D_gender'];
    echo "</td><td>";
    echo $row['D_time'];
    echo "</td><td>"; 
    echo $row['D_email'];
    echo "</td><td>"; 
    echo $row['D_Phno'];
    echo "</td><td>"; 
    echo $row['H_name'];
    echo "</td><td>"; 
    echo $row['D_patients'];
    echo "</td><td>"; 
    echo $row['D_cat'];
echo "</td></tr>";        
} 
echo "</table>";
 }
mysqli_close($con); 
?>