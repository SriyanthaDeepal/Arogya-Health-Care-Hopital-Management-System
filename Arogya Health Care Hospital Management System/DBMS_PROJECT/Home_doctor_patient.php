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