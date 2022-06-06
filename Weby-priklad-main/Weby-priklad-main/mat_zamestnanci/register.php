<?php include('db.php') ?>
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
        <h1>Register</h1>
        <div class="container">
            <hr>
            <label for="jmeno"><b>Jméno</b></label>
            <input type="text" placeholder="Zadejte Jméno" name="jmeno" id="jmeno" required>

            <label for="prijmeni"><b>Příijmení</b></label>
            <input type="text" placeholder="Zadejte Příjmení" name="prijmeni" id="prijmeni" required>

            <label for="firma"><b>Název firmy</b></label>
            <input type="text" placeholder="Zadejte Název Firmy" name="firma" id="firma" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Zadejte Email" name="email" id="email" required>

            <label for="heslo-znova"><b>Heslo</b></label>
            <input type="password" placeholder="Zadejte heslo" name="heslo" id="heslo"  passwordrules="required: upper; required: lower; required: digit; 
                 minlength: 25; allowed: [-().&@?'#,/&quot;+]; max-consecutive: 2" required>

            <label for="heslo-znova"><b>Zopakujte heslo</b></label>
            <input type="password" placeholder="Repeat Password" name="heslo-znova" id="heslo-znova" required>
            <hr>
            <button type="submit" class="register_tlacitko" name="submit">Register</button>    
            </div>        
        </form>

        <!-- INSERT -->
        <script>
            <?php include('overeni.php') ?>

                <?php include 'db.php' ?>
                <?php

                    if(isset($_POST['submit']))
                    {    
                        if ($_POST['heslo'] !== $_POST['heslo-znova']) {
                            echo '<script>window.location.href = "db.php";</script>'; return;
                         }
                        $jmeno = $_POST['jmeno'];
                        $prijmeni = $_POST['prijmeni'];
                        $nazev_firmy = $_POST['firma'];
                        $email = strtolower($_POST['email']);
                        $heslo = PASSWORD_HASH($_POST["heslo"], PASSWORD_DEFAULT);
                        $sql = "INSERT INTO uzivatel (jmeno,prijmeni,nazev_firmy,email,heslo)
                        VALUES ('$jmeno','$prijmeni','$nazev_firmy','$email','$heslo')";
                        if (mysqli_query($conn, $sql)) {
                            mysqli_close($conn);
                            header("location:index.php");
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