<!DOCTYPE html>
<?php
  include("database.php")
 ?>
<html>
<head>
  <title>Database Example</title>
  <meta charset="utf-8">
  <style>
  html {
    width: 100%;
    height: 100%;
    font-family: Helvetica, Arial, sans-serif;
    background-color: #ffffff;
  }
  body {
    padding: 0;
    margin: 0;
  }
  header {
    height: 60px;
    background-color: #f2f2f2;
    box-shadow: 0 0 10px #000;
  }
  ul {
    float: right;
    position: relative;
    right:10%;
  }
  ul li {
    display: inline;
    list-style: none;
  }
  ul li a {
    text-decoration:  none;
    color: #000000;
    font-size: 15px;
    padding: 0px 0px 0px 20px;
  }
  h1 {
    text-transform: uppercase;
    font-size: 48px;
    color: #000000;
  }
  p a {
  color: #666;
  }
  div {
  width: 100%;
  margin: 0 auto;
  text-align: center;
  }
  input {
    display: block;
    margin: 20px auto;
    text-align: center;
    box-shadow: 0 0 10px #666;
    width: 240px;
    height: 30px;
    background-color: #f2f2f2;
  }
  button {
    width: 240px;
    height: 60px;
    background-color: #000000;
    color: #ffffff;
  }
  </style>
</head>
<body>
  <div>
  <h1>Register</h1>
  <form action="register-inc.php" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="confirmPassword" placeholder="confirmPassword">
    <button type="submit" name='submit'>Register</button>
 </div>
<?php
  include('database.php');
  include('register-inc.php');

  $sql = "SELECT * FROM users";
  $result = mysqli_query($conn, $sql);
  $rowCount = mysqli_num_rows($result);
  if ($rowCount > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      //echo "Username: ".$row['username']. "/Password: ".$row['password']. "<br>";
    }
  }
  else {
    //echo "No Result Found!";
  }

 ?>
</body>
</html>
