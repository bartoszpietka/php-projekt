<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo "<title>".$_GET["n"]."</title>"
    ?>
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        ?>
    </div>
    
    <main style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php

        $sqlquery = mysqli_query($conn, "SELECT * FROM produkty WHERE id=".$_GET["p"]);

        $h = mysqli_fetch_assoc($sqlquery);

        echo "<div class='prodproductdiv'>
        <img class='prodproductimg' src='../images/".$h["zdjecie"]."'>

        <div class='freeeeee'>
            <p class='prodproductnazwa'>".$h["nazwa"]."</p>
            <p class='prodproductcena'>".$h["cena"]." zł</p>
            <p class='prodproductilosc'>ilość: ".$h["ilosc"]."</p>
            
            <form class='prodproductbtndiv' action='../addtocart/' method='post'>
                <input name='addprod' type='hidden' value=".$h["id"].">
                <input name='Kilosc' min='1' max='".$h["ilosc"]."' value='1' type='number' class='prodproductipt'>
                <button class='prodproductbtn'>Dodaj do koszyka</button>
            </form>
        </div>
        </div>";
        ?>
    </main>
</body>
</html>