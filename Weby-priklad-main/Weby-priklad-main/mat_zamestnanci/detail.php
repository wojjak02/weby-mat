<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php

include "db.php";
include "header.php";
include('overeni.php') 

$id = $_GET['id']; 

$result = mysqli_query($conn,"SELECT * FROM zamestnanci INNER JOIN oddeleni ON zamestnanci.oddeleni = oddeleni.id_oddeleni WHERE id_zamestnance = '$id'"); 
echo "<br>";

echo "<table style='margin-left: 50px;'>";

echo "<tr><td>Nazev Oddělení</tr></td>";
while($row = mysqli_fetch_array($result)){
    echo "<h1 style='margin-left: 50px;'>" . htmlspecialchars($row['jmeno']) . " " . htmlspecialchars($row['prijmeni']) . "</h1>";
    echo  "<tr style='background-color:{$row['barva']}'><td>" . htmlspecialchars($row['nazev']) .  "</tr></td>";
}
echo "</table>";
?>
</body>
</html>