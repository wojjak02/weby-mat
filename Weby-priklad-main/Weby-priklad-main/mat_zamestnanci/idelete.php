<?php
include('overeni.php')

include "db.php";

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"DELETE FROM oddeleni WHERE id_oddeleni = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:oddeleni.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>