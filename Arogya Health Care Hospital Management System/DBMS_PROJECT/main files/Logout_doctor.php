<?php
session_start();

if (!isset($_SESSION['userSession'])) {
 header("Location: index_doctor.php");
} else if (isset($_SESSION['userSession'])!="") {
 header("Location: home_doctor.php");
}

if (isset($_GET['logout'])) {
 session_destroy();
 unset($_SESSION['userSession']);
 header("Location: index_doctor.php");
}
?>