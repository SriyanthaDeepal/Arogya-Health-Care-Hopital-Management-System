<html>
<head><center><h1>THIS IS ROOMS TABLE DISPLAY</h1></center></head>
<style>
body
{
    border-style: solid;
    border-width: 15px;
}
</style>
<body bgcolor="#000066">
<center>
<img src="room.jpg" alt="Mountain View" style="width:304px;height:228px;">
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
    echo 'connected';

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
  
// Perform queries 
if($query_sql=mysqli_query($con,"SELECT * FROM rooms,hospital where hospital.H_ID=rooms.H_ID"))
{
	//echo '<br/>connected';
}
else
{echo '<br/>not connected';}
//mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) 
//VALUES ('Glenn','Quagmire',33)");

  //to fetch the data from the database
  
//  echo '<br/>the data in the table is<br/>';
  
  if(mysqli_num_rows($query_sql) == NULL)
  {echo 'No query provided so far';}
 else
 {
echo "<table border='1'>";
echo "<tr> <th>'H_ID'</th>  <th>'H_Name'</th><th>'Room_No'</th> <th>'rtype'</th> <th>'noofbeds'</th></tr>";
// keeps getting the next row until there are no more to get
while($row =mysqli_fetch_assoc($query_sql)) {

// Print out the contents of each row into a table
    echo "<tr><td>"; 
    echo $row['H_ID'];
    echo "</td><td>"; 
    echo $row['H_name'];
    echo "</td><td>";
    echo $row['R_No'];
    echo "</td><td>";
    echo $row['rtype'];
    echo "</td><td>";
    echo $row['noofbeds'];

echo "</td></tr>";        
} 
echo "</table>";
 }
mysqli_close($con); 
?>
</center></body></html>