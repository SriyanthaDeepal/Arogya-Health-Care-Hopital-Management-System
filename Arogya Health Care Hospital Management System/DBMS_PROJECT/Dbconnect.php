<?php

  $DBhost = "127.0.0.1";//phpadmin gives us some host
  $DBuser = "root";//oracle gives us anonymous here username is root
  $DBpass = "";
  $DBname = "hospital_management";
  
  $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
?>