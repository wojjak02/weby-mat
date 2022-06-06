<?php include('db.php') ?>
<?php include('overeni.php') ?>

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
    <div class="box">
        <form action="" method="post">
        <h1>Přidat zaměstnance</h1>

        <div class="container">
            <hr>
            <select name="jmeno">
                
            <?php 
            $sql2 = mysqli_query($conn, "SELECT * FROM oddeleni");
            while ($row = mysqli_fetch_array($sql2)){
                echo "<option value='{$row['id_oddeleni']}'>{$row['nazev']}</option>";
            }
            ?>
            </select>
            <br>
            <label for="prijmeni"><b>Jméno</b></label>
            <input type="text" placeholder="Zadejte Jméno" name="prijmeni" id="prijmeni" required>

            <label for="firma"><b>Přijmení</b></label>
            <input type="text" placeholder="Zadejte Příjmení" name="firma" id="firma" required>

            <label for="email"><b>Datum nástupu</b></label>
            <input type="date" placeholder="Zadejte datum nástupu" name="email" id="email" max="<?php echo date("Y-m-d"); ?>" required>

            <hr>
            <button type="submit" class="register_tlacitko" name="submit">Přidat</button>    
            </div>        
        </form>
        <!-- INSERT -->
        <script>
                <?php include 'db.php' ?>
                <?php

                    if(isset($_POST['submit']))
                    {    
                        $jmeno = $_POST['jmeno'];
                        $prijmeni = $_POST['prijmeni'];
                        $nazev_firmy = $_POST['firma'];
                        $email = $_POST['email'];
                        $sql = "INSERT INTO zamestnanci (oddeleni,jmeno,prijmeni,datum_nastupu)
                        VALUES ('$jmeno','$prijmeni','$nazev_firmy','$email')";
                        if (mysqli_query($conn, $sql)) {
                            echo "New record has been added successfully !";
                        } else {
                            echo "Error: " . $sql . ":-" . mysqli_error($conn);
                        }
                        header('Location: zamestnanci.php');
                        mysqli_close($conn);
                    }
                ?>
            </script>
    </div>
</body>
</html>