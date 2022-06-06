<?php

$letters = "abcdefghijklmnopqrstuvwxyz";
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="db.php">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Šibenicce</title>
</head>
<body>
    <div class="cointainer">
        <h1 class="text-center">Šibenice</h1>
        <div id="keyboard"> </div>
        <div id="btnKeyboard"></div>
    </div>
            
                <?php
                    /*
                    $max = strlen($letters) -1;
                    for($i = 0; $i<=$max; $i++){
                        echo "<button type='submit' name='lp' value='". $letters[$i] . "'>". $letters[$i]. "</button>";
                    };
                   */
                ?>
             <script type="text/javascript">

            var slovicko = "<?php echo $kurvo ?>";
            document.write(slovicko); 
            var slovickoArr = [];

            //klavesnicey
            var zbyvajiciPismena = slovicko.length;
                    const vytvorTlacitko = () =>{
                        let start = 'a';
                        let end = 'z';
                        for(var i = start.charCodeAt(); i <= end.charCodeAt(); i++){
                            var newBtn = document.createElement('button')
                            $(newBtn).addClass('btn-info')
                            $(newBtn).text(String.fromCharCode(i))
                            $('btnKeyboard').append(newBtn)

                        }
                    }
                                // podtrzitka
            const pocetPodt = () => {
                        for(var slovo of slovicko){
                            var button = document.createElement('button')
                            $(button).addClass('btn-info')
                            $(button).text('_')
                            $('keyboard').append(button)
                        }
                    }
                  
                    pocetPodt();
                    vytvorTlacitko();


             
            </script>


        

</body>
</html>