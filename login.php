<?php
  include("service/db.php");
  session_start();
  if(isset($_SESSION["is_login"])){
    header("location: dashboard.php");
  }
  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $has_pw = hash("sha256", $username);
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$has_pw'";
    
    $result = $db->query($sql);
    
    if($result->num_rows > 0){
      $data = $result->fetch_assoc();
      $_SESSION["username"] = $data['username'];
      $_SESSION["is_login"] = true;
    }else{
      echo "Akun tidak ditemukan";
    }
    $db->close();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style type="text/css" media="all">
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body{
      box-sizing: border-box;
      width: 100%;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      padding: 5px;
      gap: 5px;
    }
  </style>
</head>
<body style="margin: 0; padding: 0; box-sizing: border-box;">
  <?php include "layout/header.html"?>
  
  <form action="login.php" method="POST" style="width: 300px; min-height: 500px;  box-sizing: border-box; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 5px; gap: 5px;">
    <h3 style="margin-top: 25px; margin-bottom: 25px;">Login</h3>
    <input type="text" name="username" id="username" placeholder="Masukan Username" style="width: 95%; height: 45px; border: 1px solid rgb(0,0,0,0.5); background-color: white; padding: 8px;"/>
    <input type="password" name="password" id="password" placeholder="Masukan Password" style="width: 95%; height: 45px; border: 1px solid rgb(0,0,0,0.5); background-color: white; padding: 8px;"/>
    <button type="submit" name="login" style="padding: 10px; border: 1px solid rgb(0,0,0,0.5); background-color: white; color: black; border-radius: 10px;">Masuk</button>
  </form>
  
  <?php include "layout/footer.html"?>
</body>
</html>