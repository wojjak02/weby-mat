<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php include('overeni.php') ?>

<?php include "./header.php" ?>
            <div class="zcontainer">
            <br>
            <form action="addZamestnanec.php">
            <button class="tlacitko">Přidat zaměstnance</button>
            </form>
            <br>
            <table>
        <?php
            include 'db.php';
            $query = "SELECT * FROM zamestnanci INNER JOIN oddeleni ON zamestnanci.oddeleni = oddeleni.id_oddeleni";
            $result = mysqli_query($conn,$query);
            echo "<table>"; 
            echo " <tr><th>Název oddělení</th><th>Jméno</th><th>Přijmení</th><th>Datum nástupu</th><th>Smazat</th><th>Detaily</th><th>Upravit</th> </tr>";
            while($row = mysqli_fetch_array($result)){
            echo  "<tr><td>" . htmlspecialchars($row['nazev']) . "</td><td>" . htmlspecialchars($row['jmeno']) . "</td><td>" . htmlspecialchars($row['prijmeni']) . "</td><td>" . htmlspecialchars($row['datum_nastupu']) ; echo "<td style='background-color:red;'><a href='delete.php?id=".$row['id_zamestnance']."'>Delete</a></td>" ; echo "<td style='background-color:blue;'><a href='detail.php?id=".$row['id_zamestnance']."'>Detail</a></td>" ; echo "<td style='background-color:blue;'><a href='update_zamestnanci.php?id=".$row['id_zamestnance']."'>Úprava</a></td>" . "</td></tr>"; 
            }

            echo "</table>"; 



            ?>
            </table>
            </div>
</body>
</html>