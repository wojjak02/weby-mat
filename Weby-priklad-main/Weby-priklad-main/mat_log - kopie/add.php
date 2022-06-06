<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logovací system</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- header !-->
        <div class="header">
            <ul class="header">
                <li><a href="index.php">Logy</a></li>
                <li><a href="add.php">Přidat</a></li>
            </ul>
        </div>
        <!-- pridavani !-->
        <br>
        <div class="pridavani">         
            <form action="" method="post"> 
                <label for="zaznam">Druh záznamu : </label>
                <select name="zaznam" id="zaznam">
                    <option value="1">Informace</option>
                    <option value="2">Upozornění</option>
                    <option value="3">Chyba</option>
                    <option value="4">Kritická chyba</option>
                </select>
                <br>
                <label for="zaznam">Text :</label><br>
                <textarea maxlength="255" name="text"> </textarea>

               <br> <button type="submit" value="submit" name="submit" >Odeslat</button>
            </form>

            <script>
                <?php include 'db.php' ?>
                <?php
                    if(isset($_POST['submit']))
                    {    
                        $zaznam = $_POST['zaznam'];
                        $text = $_POST['text'];
                        $sql = "INSERT INTO zaznamy (typ_zaznamu,popis,cas)
                        VALUES ('$zaznam','$text',NOW())";
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
        <!-- footer !-->
        <div class="footer">nejaky footer text</div>
    </div>
</body>
</html>