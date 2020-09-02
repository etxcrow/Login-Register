<?php

  //Params to connect to a Database
  $dbHost = "localhost";
  $dbUser = "root";
  $dbPass = "";
  $dbName = "phptutorial";

  //Connection to the Database
  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
  if (!$conn) {
    die("<p style='color:red;'>Conenction Failed To The Database!</p>");
  }
?>
