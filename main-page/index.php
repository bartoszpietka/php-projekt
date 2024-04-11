<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "menu.php";
        ?>
    </div>
    
    <main style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php

        $sqlquery = mysqli_query($conn, "SELECT * FROM produkty WHERE wswtl=1");

        if(mysqli_num_rows($sqlquery) > 0){
            while($h = mysqli_fetch_assoc($sqlquery)){
                echo "<div class='productdiv'>
                <img class='productimg' src='../images/".$h["zdjecie"]."'>";
                if(strlen($h["nazwa"])>=30){
                    echo "<p class='productnazwa'>".substr($h["nazwa"], 0, 30)."...</p>";
                }else{
                    echo "<p class='productnazwa'>".$h["nazwa"]."</p>";
                }
                echo "<p class='productcena'>".$h["cena"]." zł</p>";
                if($h["ilosc"]>0){
                    echo "<p class='productilosc' style='margin-left: 90px;'>ilość: ".$h["ilosc"]."</p>";
                }else{
                    echo "<p class='productilosc' style='color: red'>brak w magazynie</p>";
                }
                echo "<form class='productbtndiv' action='../product' method='get'>
                    <input name='p' type='hidden' value=".$h["id"].">
                    <input name='n' type='hidden' value=".$h["nazwa"].">
                    <button class='productbtn'>Zobacz Produkt</button>
                </form>
                </div>";
            }
        }
        ?>
    </main>
</body>
</html>