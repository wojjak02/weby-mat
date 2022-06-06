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
        <h1>Přidat oddělení</h1>
        <div class="container">
            <hr>
            <label for="jmeno"><b>Název</b></label>
            <input type="text" placeholder="Zadejte Název" name="jmeno" id="jmeno" required>

            <label for="prijmeni"><b>zkratka</b></label>
            <input type="text" placeholder="Zadejte Zkratku" name="prijmeni" id="prijmeni" required>

            <label for="firma"><b>město</b></label>
            <input type="text" placeholder="Zadejte Název Města" name="firma" id="firma" required>

            <label for="email"><b>barva</b></label>
            <input type="color" placeholder="Zadejte Barvu" name="email" id="email" required>

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
                        $sql = "INSERT INTO oddeleni (nazev,zkratka,mesto,barva)
                        VALUES ('$jmeno','$prijmeni','$nazev_firmy','$email')";
                        if (mysqli_query($conn, $sql)) {
                            echo "New record has been added successfully !";
                        } else {
                            echo "Error: " . $sql . ":-" . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                    }
                ?>
            </script>
    </div>
</body>
</html>