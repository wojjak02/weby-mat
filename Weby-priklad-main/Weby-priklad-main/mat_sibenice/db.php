<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "mat_sibenice";

//pripojeni

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "chyba priponeni"
    or exit();
}



$nahodny = mysqli_query($con,"SELECT slovo FROM slova ORDER BY rand() LIMIT 5");

 while ($row = mysqli_fetch_assoc($nahodny)) {
    $kurvo =  $row["slovo"];
}

?>