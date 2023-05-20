<?php
session_start();

if (!isset($_SESSION['userSession'])) {				
 header("Location: index_room_patient.php");
} else if (isset($_SESSION['userSession'])!="") {		//accessing index and home html pages correctly
 header("Location: home_room_patient.php");
}

if (isset($_GET['logout'])) {
 session_destroy();
 unset($_SESSION['userSession']);
 header("Location: index_room_patient.php");
}
?>