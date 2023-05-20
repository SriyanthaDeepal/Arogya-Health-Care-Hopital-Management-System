<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
 header("Location: home_room_patient_new.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
 
 $uname = strip_tags($_POST['name']);
 $email = strip_tags($_POST['email']);
 $upass = strip_tags($_POST['password']);
 $uage=strip_tags($_POST['age']);
 $uprob=strip_tags($_POST['prob']);
$uid=strip_tags($_POST['id']);
$urno=strip_tags($_POST['No']);
$uhid=strip_tags($_POST['HID']);
$ugender=strip_tags($_POST['gender']);
$uphno=strip_tags($_POST['phone']);
 $uname = $DBcon->real_escape_string($uname);
 $email = $DBcon->real_escape_string($email);
 $upass = $DBcon->real_escape_string($upass);
  $uid = $DBcon->real_escape_string($uid);
 $uage = $DBcon->real_escape_string($uage);
 $uphno = $DBcon->real_escape_string($uphno);
$uprob = $DBcon->real_escape_string($uprob);

$ugender= $DBcon->real_escape_string($ugender);
$urno = $DBcon->real_escape_string($urno);
$uhid = $DBcon->real_escape_string($uhid);

echo $uname.'<br/>';
echo  $email.'<br/>';
echo $upass.'<br/>';
echo $uid.'<br/>';
echo $uage.'<br/>';
echo  $uprob.'<br/>';
echo $ugender.'<br/>';
echo $urno.'<br/>';
echo $uhid.'<br/>';
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $DBcon->query("SELECT p_email_id FROM rooms_patient,rooms,patient WHERE  rooms.H_ID=rooms_patient.H_ID and rooms.R_No=rooms_patient.R_No and p_email_id='$email'");
 $count=$check_email->num_rows;
 
 echo 'Count'.$count.'<br/>';
 if ($count==0) {
  
  //$query = "INSERT INTO patient(id,email_id,password,Name,Age,Hospital Admitted in,Doctor treating,Room No.,Medicine required,Bill to be paid,Appointment timings) VALUES('$uid' ,'$email', '$hashed_password'  ,'$uname','$uage','$uhospital','$udoctor','$uroom','$umedicine','$ubill','$uappointment')";
  $query="INSERT INTO `rooms_patient` (`H_ID`, `R_No`, `P_ID`, `P_Name`, `P_age`, `p_gender`,`p_prob`, `p_email_id` ,`p_password`) VALUES ('$uhid', '$urno', '$uid', '$uname', '$uage', '$ugender','$uprob', '$email','$upass')";    
   
if ($DBcon->query($query)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
  }
}  else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken query!
    </div>";
 }
 echo 'Count'.$count.'<br/>';
 if ($count==0) {
  
  //$query = "INSERT INTO patient(id,email_id,password,Name,Age,Hospital Admitted in,Doctor treating,Room No.,Medicine required,Bill to be paid,Appointment timings) VALUES('$uid' ,'$email', '$hashed_password'  ,'$uname','$uage','$uhospital','$udoctor','$uroom','$umedicine','$ubill','$uappointment')";
  
 $query1="INSERT INTO `patient` (`P_ID` , `P_Phno`) VALUES ('$uid','$uphno')";
if ($DBcon->query($query1)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
  }
}  else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken query!
    </div>";
 }
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
          
        <div class="form-group">
        <input type="text" class="form-control" placeholder="HID" name="HID" required  />
        </div>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required  />
        </div>
              <div class="form-group">
        <input type="text" class="form-control" placeholder="Patientname" name="name" required  />
        </div>  
       
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Patientage" name="age" required  />
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="rno" name="No" required  />
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="gender" name="gender" required  />
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="prob" name="prob" required  />
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="P_ID" name="id" required  />
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Phone" name="phone" required  />
        </div>
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-signup">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
   </button> 
   
            <a href="index_room_patient.php" class="btn btn-default" style="float:right;">Log In Here</a>
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
if($query_sql=mysqli_query($con,"SELECT * FROM rooms_patient,rooms,patient WHERE rooms_patient.P_ID=patient.P_ID and rooms.H_ID=rooms_patient.H_ID and rooms.R_No=rooms_patient.R_No "))
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
echo "<tr> <th>'H_ID'</th> <th>'R_No'</th> <th>'P_ID'</th> <th>'P_Name'</th>     <th>'P_age'</th> <th>'p_gender'</th> <th>'p_prob'</th><th>'p_email_id'</th><th>'p_password'</th><th>'P_Phno'</th></tr>";
// keeps getting the next row until there are no more to get
while($row =mysqli_fetch_assoc($query_sql)) {

// Print out the contents of each row into a table
    echo "<tr><td>"; 
    echo $row['H_ID'];
    echo "</td><td>"; 
    echo $row['R_No'];
    echo "</td><td>";
    echo $row['P_ID'];
    echo "</td><td>";
    echo $row['P_Name'];
    echo "</td><td>";
    echo $row['P_age'];
    echo "</td><td>"; 
    echo $row['p_gender'];
    echo "</td><td>"; 
    echo $row['p_prob'];
    echo "</td><td>"; 
    echo $row['p_email_id'];
    echo "</td><td>"; 
    echo $row['p_password'];
    echo "</td><td>"; 
    echo $row['P_Phno'];
echo "</td></tr>";        
} 
echo "</table>";
 }
mysqli_close($con); 
?>