<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('overeni.php') ?>

<ul>
  <li><a href="index.php">Oddělení</a></li>
  <li><a href="zamestnanci.php">Zamestnanci</a></li>
  

  <?php
   if(!isset($_SESSION['user'])){
    echo '<li style="float:right; display:none;"><a href="logout.php" >Odhlasit</a></li>';
    echo '<li style="float:right;"><a href="login.php" >Přihlásit</a></li>';
    echo '<li style="float:right;"><a href="register.php" >Registrovat</a></li>';
    }else{
      echo '<li style="float:right;"><a href="logout.php" >Odhlasit</a></li>';
    }
  ?>
</ul>
</body>
</html>