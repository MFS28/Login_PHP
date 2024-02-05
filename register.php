<?php
  include("service/db.php");
  $message = "";
  if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $has_pw = hash("sha256", $username);
    try{
      $sql = "INSERT INTO users (username,password) VALUES ('$username','$has_pw')";
      if($db->query($sql)){
         $message = "Akun telah dibuat silahkan Login";
      }else{
         $message = "Akun sudah ada";
      }
    }
    catch(mysqli_sql_exception){
      $message = "Akun sudah ada";
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
  
  <form action="" method="POST" style="width: 300px; min-height: 500px;  box-sizing: border-box; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 5px; gap: 5px;">
    <h3 style="margin-top: 25px; margin-bottom: 25px;">Masukan Akun</h3>
    <i><?php echo $message?></i>
    <input type="text" name="username" id="username" placeholder="Masukan Username" style="width: 95%; height: 45px; border: 1px solid rgb(0,0,0,0.5); background-color: white; padding: 8px;"/>
    <input type="password" name="password" id="password" placeholder="Masukan Password" style="width: 95%; height: 45px; border: 1px solid rgb(0,0,0,0.5); background-color: white; padding: 8px;"/>
    <button type="submit" name="register" style="padding: 10px; border: 1px solid rgb(0,0,0,0.5); background-color: white; color: black; border-radius: 10px;">Daftar Sekarang</button>
  </form>
  
  <?php include "layout/footer.html"?>
</body>
</html>