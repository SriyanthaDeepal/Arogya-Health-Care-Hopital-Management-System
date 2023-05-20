<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['H_name']; ?></title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.codingcage.com">Coding Cage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.codingcage.com/2015/03/simple-login-and-signup-system-with-php.html">Back to Article</a></li>
            <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
            <li><a href="http://www.codingcage.com/search/label/PHP">PHP</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container" style="margin-top:150px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
 <a href="http://www.codingcage.com/"></a><br /><br />
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
if($query_sql=mysqli_query($con,"SELECT * FROM hospital,hospital_ph,doctor,hospital_doctor where hospital.H_ID=hospital_ph.H_ID and doctor.D_ID=hospital_doctor.D_ID and hospital.H_ID=hospital_doctor.H_ID"))
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
echo "<tr> <th>'H_ID'</th> <th>'H_NAME'</th> <th>'H_LOC'</th> <th>'H_Ph'</th><th>'D_NAME'</th></tr>";
// keeps getting the next row until there are no more to get
while($row =mysqli_fetch_assoc($query_sql)) {

// Print out the contents of each row into a table
    echo "<tr><td>"; 
    echo $row['H_ID'];
    echo "</td><td>"; 
    echo $row['H_name'];
    echo "</td><td>";
    echo $row['H_loc'];
    echo "</td><td>";
    echo $row['H_Phno'];
    echo "</td><td>";
    echo $row['D_name'];
echo "</td></tr>";        
} 
echo "</table>";
 }
mysqli_close($con); 
?>