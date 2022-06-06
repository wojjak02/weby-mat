<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mat_log";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_GET['search'])){

  $query = "SELECT * FROM zaznamy INNER JOIN druh_zaznamu ON zaznamy.typ_zaznamu = druh_zaznamu.id_druhu  WHERE typ_zaznamu = {$_GET['search']}";
  $result = mysqli_query($conn,$query);
  $list = [];
  while($row = mysqli_fetch_array($result)){   
    array_push($list, $row);
  }
  echo json_encode($list);

}

