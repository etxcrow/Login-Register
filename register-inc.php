<?php

  if (isset($_POST['submit'])) {
    //Add database connection
    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];

    if(empty($username)  || empty($password) || empty($confirmPass)) {
      header("Location: ../LearnDb/register.php?error=emptyfields&username=".$username);
      exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
      header("Location: ../LearnDb/register.php?error=invalidusername&username=".$username);
      exit();
    }
    elseif ($password !== $confirmPass){
      header("Location: ../LearnDb/register.php?error=passwordsdoesnotmatch&username=".$username);
      exit();
    }
    else {
     $sql = "SELECT username FROM users WHERE username = ?";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("Location: ../LearnDb/register.php?error=sqlerror");
       exit();
     }
     else {
       mysqli_stmt_bind_param($stmt, "s", $username);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_store_result($stmt);

       $rowCount = mysqli_stmt_num_rows($stmt);
       if ($rowCount > 0) {
         header("Location: ../LearnDb/register.php?error=usernametaken");
         exit();
       }
       else {
         $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("Location: ../LearnDb/register.php?error=sqlerror");
         exit();
         }
         else {
           $hashPass = password_hash($password, PASSWORD_DEFAULT);

           mysqli_stmt_bind_param($stmt, "ss", $username, $hashPass);
           mysqli_stmt_execute($stmt);
           header("Location: ../LearnDb/register.php?success=registered");
           exit();
         }
       }
     }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }

 ?>
