<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logovací system</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}
.active {
    background-color:red;
}
    </style>
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
        
        <form action="" method="post"> 
                <label for="zaznam">Druh záznamu : </label>
                <select name="zaznam" id="zaznam">
                    <option value="1">Informace</option>
                    <option value="2">Upozornění</option>
                    <option value="3">Chyba</option>
                    <option value="4">Kritická chyba</option>
                </select>
            </form>

        <!-- logy !-->
        <div class="box" id='box'>
            <!-- page 1 - 0,20 -->
            <!-- page 2 - 20,40 -->
            <!-- page 3 - 40,60 -->
            <?php
            $list = 0;

            if(isset($_GET['page'])){
                $list = intval($_GET['page']);
            }
             include 'db.php';
             $pred = $list*20;
             $po = $list*20 + 20;
            $query = "SELECT * FROM zaznamy INNER JOIN druh_zaznamu ON zaznamy.typ_zaznamu = druh_zaznamu.id_druhu LIMIT {$pred},{$po}";
            $i = 0;
            $result = mysqli_query($conn,$query);
            echo "<table>"; 

            while($row = mysqli_fetch_array($result)){   
            echo "<tr><td>" . htmlspecialchars($row['nazev']) . "</td><td>" . htmlspecialchars($row['popis']) . "</td><td>" . htmlspecialchars($row['cas']) . "</td></tr>"; 
            }

            echo "</table>"; 



            ?>

</div>
<?php 

    if(true){
        if(!isset($_GET['page'])) $_GET['page'] = 1;
        ?>
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="index.php?page=<?= intval($_GET['page']) -1 ?>"><?= intval($_GET['page']) -1 ?></a>
        <a href="#" class="active"><?= $_GET['page'] ?></a>
        <a href="index.php?page=<?= intval($_GET['page']) +1 ?>"><?= intval($_GET['page']) +1 ?></a>
        <a href="#">&raquo;</a>
    </div>
        <?php 
    }
?>
  
        <!-- footer !-->
        <div class="footer">nejaky footer text</div>
        <script>
            $("#zaznam").change((e) => {
                $.get(`http://localhost/mat_log/db.php?search=${e.currentTarget.value}`, (data) => {
                    const json = JSON.parse(data)
                    let html = ""
                    for(let s of json){
                        html+=`<div>
                        <p style='color:#${s['barva']}'>${s['nazev']}</p>
                        <p>${s['popis']}</p><td>${s['cas']}</td>
                        </div>`
                    }
                    $("#box").html(html)
                })
            })
        </script>
    </div>
</body>
</html>