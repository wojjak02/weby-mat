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
        <h1>Login</h1>
        <div class="container">
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Zadejte Email" name="email" id="email" required>

            <label for="heslo-znova"><b>Heslo</b></label>
            <input type="password" placeholder="Zadejte heslo" name="heslo" id="heslo"  passwordrules="required: upper; required: lower; required: digit; 
                 minlength: 25; allowed: [-().&@?'#,/&quot;+]; max-consecutive: 2" required>

            <hr>
            <button type="submit" class="register_tlacitko" name="submit">Login</button>    
            </div>        
        </form>

        <!-- INSERT -->
        <script>
            <?php 
                include('overeni.php'); 
                session_start(); 
                include 'db.php'; 

                    if(isset($_POST['submit']))
                    {    
                        $email = strtolower($_POST['email']);
                        $heslo = $_POST['heslo'];

                        $res = mysqli_query($conn, "SELECT * FROM uzivatel WHERE email='$email' ");
                        $result=mysqli_fetch_array($res);
                        if(count($result) > 0){ 
                            print_r($result['heslo']);
                            if(password_verify($heslo, $result["heslo"])){
                                echo "You are login Successfully ";
                                $_SESSION["user"] = $email;
                                header("location:index.php");
                            }else{
                                echo " login failed";
                            }
                        }
                        
                        
                            
                    }
                ?>
            </script>
    </div>
</body>
</html>