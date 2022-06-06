<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Quiz</title>
</head>
<body>

    <form method=POST>
        
    <div id="questionScreen" class="box" >
        
    <div class="head">
        <h1>Quizzs</h1>
        <div class="head-right">
            <a href="">Profil</a>
            <a href="">Žebříček</a>
        </div>
    </div>
        <div id="qList">
            
            <div class="footer" method=POST>
                <input type="submit" name="submit" value="Submit">
            </d>
        </div>
    </div>

    <div id="resultScreen" class="box" style="display:none;">
        <div class="title">Výsledky</div>
        <div class="resultBox">
            <label>Otázky :</label>
            <span id="totalQuestion"></span>
            <label>Správně  :</label>
            <span id="correctAnswer"></span>
            <label>Špatně :</label>
            <span id="wrongAnswer"></span>
            <label>Procentuální úspěšnost :</label>
            <span id="procento"></span>
        </div>
        <div class="buttonBox">
            <a href="">Začít znovu</a>
        </div>
    </div>

    
    <script>
        const otazky = [];
        const odpovedi = [];
    <?php include 'db.php'; ?>
        let index = 0
        for(let i = 0; i <otazky.length;i++){
            let inputy = ""
            
            for(let j=0;j<3;j++){
                if(odpovedi[index].spravnost == 0){
                    inputy+=`<input type="radio" name="otazka${i}" value="${j}s">
                        <label for="odpoved1" style='color:red'>${odpovedi[index].nazev}</label><br>`
                }else{
                    inputy+=`<input type="radio" name="otazka${i}" value="${j}">
                        <label for="odpoved1">${odpovedi[index].nazev}</label><br>`
                }
             
                index++
            }
            $('#qList').prepend(
                `<div class="header">
                
                <div class="questionBox" style="margin-left:250px;">
                    ${otazky[i]} 
                </div>
                <div class="optionBox" style="padding-let:100px;">
                    <div>
                        ${inputy}  
                    </div>
                </div>
            </div>`
            )
        }


    </script>

    </form>

    <?php 
        session_start();
        $_SESSION['pocet'] = mysqli_num_rows($otazky);
        if(isset($_POST["submit"])){
          
            
            for($i = 0;$i<$_SESSION['pocet'];$i++){
                echo $_POST["otazka$i"];
                if (strpos($_POST["otazka$i"], 's') !== false) { 
                    echo 'true';
                }
            }

            ?>
            <script>
                let pocetDobre = 0 
                <?php 
                    $spatne = 0;
                 for($i = 0;$i<$_SESSION['pocet'];$i++){
                    if (strpos($_POST["otazka$i"], 's') !== false) { 
                        $spatne++;
                        ?>
                        pocetDobre++;
                        <?php
                    } 
                }
                $spatne = $_SESSION['pocet'] - $spatne;
                
                
    
                ?>
                var procenta = pocetDobre * 20;
                var picovina = otazky.length;
                $("#qList").css('display',"none")
                $('#resultScreen').css("display","block")
                $("#totalQuestion").text("<?=$_SESSION['pocet'] ?>");
                $("#correctAnswer").text(pocetDobre)
                $("#wrongAnswer").text("<?= $spatne ?>")
                $("#procento").text(procenta +" %")
                

            </script>
            <?php
        }
    ?>
</body>




</html>