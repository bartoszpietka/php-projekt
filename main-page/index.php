<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona głowna</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "menu.php";
        ?>
    </div>
    
    <main style="padding-left: 10vh; display: flex; flex-wrap: wrap;">
        <?php

        $sqlquery = mysqli_query($conn, "SELECT * FROM produkty");

        if(mysqli_num_rows($sqlquery) > 0){
            while($h = mysqli_fetch_assoc($sqlquery)){
                echo "<div class='productdiv'>
                <img class='productimg' src='../images/".$h["zdjecie"]."'>
                <p class='productnazwa'>".$h["nazwa"]."</p>
                <p class='productcena'>".$h["cena"]." zł</p>
                <p class='productilosc'>ilość: ".$h["ilosc"]."</p>
                <div class='productbtndiv'>
                    <button class='productbtn'>Dodaj do koszyka</button>
                </div>
                </div>";
            }
        }
        ?>
    </main>
</body>
</html>