<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM otazky WHERE test=1";
$sql2 = "SELECT * FROM odpovedi ORDER BY otazka";
$query = mysqli_query($conn,$sql);


$otazky =  mysqli_query($conn, $sql);
$odpovedi =  mysqli_query($conn, $sql2);

//ziskava otazky
while ($row = mysqli_fetch_assoc($otazky)) {
   echo "otazky.push('{$row['nazev']}');";
}
while ($row = mysqli_fetch_assoc($odpovedi)) {
  echo "odpovedi.push({
    'nazev':'{$row['nazev']}',
    'spravnost':{$row['spravnost']}
  });";
}


?>