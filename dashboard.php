<?php
 session_start();
 if(isset($_POST['logout'])){
   session_unset();
   session_destroy();
   
   header("location: index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Selamat datang <?= $_SESSION["username"] ?> diwebsite kami</h1>
  <form method="POST">
    <button type="submit" name="logout">Logout</button>
  </form>
</body>
</html>