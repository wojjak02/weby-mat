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
<br>
    <div class="ibox">
        <div class="icontainer">
            <form action="addOddeleni.php">
            <button class="tlacitko">Přidat oddělení</button>
            </form>
            <table>
        <?php
            include 'db.php';
            $query = "SELECT * FROM oddeleni";
            $result = mysqli_query($conn,$query);
            echo "<table>"; 
            echo " <tr><th>Název oddělení</th><th>Zkratka</th><th>Město</th><th>Počet zaměstnanců</th><th>Smazat </th> </tr>";
            while($row = mysqli_fetch_array($result)){   
                $query2 = "SELECT count(jmeno) as pocet FROM zamestnanci WHERE oddeleni = {$row['id_oddeleni']}";
                $result2 = mysqli_query($conn,$query2);
                $data2 =  mysqli_fetch_array($result2);{}
            echo  "<tr style='background-color:{$row['barva']}'><td>" . htmlspecialchars($row['nazev']) . "</td><td>" . htmlspecialchars($row['zkratka']) . "</td><td>" . htmlspecialchars($row['mesto']) . "</td><td>" . $data2['pocet'] . "</td>" ; echo "<td style='background-color:red;'><a href='idelete.php?id=".$row['id_oddeleni']."'>Delete</a></td>" ; "</tr>"; 
            }

            echo "</table>"; 



            ?>
            </table>
        </div>
    </div>
</body>
</html>