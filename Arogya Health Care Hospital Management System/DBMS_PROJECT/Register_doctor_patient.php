<?php
session_start();
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
 
 $udid = strip_tags($_POST['did']);
 $upid = strip_tags($_POST['pid']);
 $utid = strip_tags($_POST['tid']);
 $utname=strip_tags($_POST['tname']);
 $uperiod=strip_tags($_POST['period']);
$ubill=strip_tags($_POST['bill']);


$udid = $DBcon->real_escape_string($udid);
$upid = $DBcon->real_escape_string($upid);
 $utid  = $DBcon->real_escape_string($utid );
 $utname = $DBcon->real_escape_string($utname);
 $uperiod = $DBcon->real_escape_string($uperiod);
$ubill = $DBcon->real_escape_string($ubill);

echo $udid.'<br/>';
echo  $upid.'<br/>';
echo $utid.'<br/>';
echo $utname.'<br/>';
echo $uperiod.'<br/>';
echo  $ubill.'<br/>';
 $count=0;
 echo 'Count'.$count.'<br/>';
  if ($count==0) {
  
  //$query = "INSERT INTO patient(id,email_id,password,Name,Age,Hospital Admitted in,Doctor treating,Room No.,Medicine required,Bill to be paid,Appointment timings) VALUES('$uid' ,'$email', '$hashed_password'  ,'$uname','$uage','$uhospital','$udoctor','$uroom','$umedicine','$ubill','$uappointment')";
  $query="INSERT INTO `doctor_patients` (`D_ID`, `P_ID`, `T_ID`, `T_name`, `Period`, `Bill`) VALUES ('$udid', '$upid', '$utid', '$utname', '$uperiod', '$ubill')"; 
  $query2="UPDATE `doctor` set `D_patients`=`D_patients`+1 WHERE `D_ID`='$udid'";
   
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
   if ($DBcon->query($query2)) {
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
          
        <div class="form-group">
        <input type="text" class="form-control" placeholder="D_id" name="did" required  />
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="pid" name="pid" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Tid" name="tid" required  />
        </div>
        
       
        <div class="form-group">
        <input type="text" class="form-control" placeholder="tname" name="tname" required  />
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="period" name="period" required  />
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="bill" name="bill" required  />
        </div>

      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-signup">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
   </button> 
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
if($query_sql=mysqli_query($con,"SELECT * FROM doctor_patients,doctor,rooms_patient WHERE doctor.D_ID=doctor_patients.D_ID and doctor_patients.P_ID=rooms_patient.P_ID"))
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
echo "<tr> <th>'P_ID'</th> <th>'P_Name'</th> <th>'D_ID'</th> <th>'D_name'</th><th>'T_ID'</th> <th>'T_name'</th><th>'Period'</th><th>'R_No'</th> <th>'Bill'</th></tr>";
// keeps getting the next row until there are no more to get
while($row =mysqli_fetch_assoc($query_sql)) {

// Print out the contents of each row into a table
    echo "<tr><td>"; 
    echo $row['P_ID'];
    echo "</td><td>"; 
    echo $row['P_Name'];
    echo "</td><td>";
    echo $row['D_ID'];
    echo "</td><td>";
    echo $row['D_name'];
    echo "</td><td>";
    echo $row['T_ID'];
    echo "</td><td>"; 
    echo $row['T_name'];
	echo "</td><td>"; 
    echo $row['Period'];
    echo "</td><td>";
    echo $row['R_No'];
	echo "</td><td>"; 
echo $row['Bill'];
      echo "</td></tr>"; 
} 
echo "</table>";
 }
mysqli_close($con); 
?>