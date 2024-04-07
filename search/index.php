<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukaj</title>
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php"
        ?>
    </div>

    <!--
        <form action="../search/" id="searchform" style="grid-area: searchbar; display: flex; justify-content: center;">
            <input type="text" id="searchinput" name="s">
            <button id="searchbutton" type="submit">
                <img src="../images/search.png" alt="wyszukaj" style="height: 19px;">
            </button>
        </form>
    -->
    <main style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php

        $sqlquery = mysqli_query($conn, "SELECT * FROM produkty WHERE wswtl=1 AND nazwa LIKE '%".$_GET["s"]."%'");

        if(mysqli_num_rows($sqlquery) > 0){
            while($h = mysqli_fetch_assoc($sqlquery)){
                echo "<div class='productdiv'>
                <img class='productimg' src='../images/".$h["zdjecie"]."'>";
                if(strlen($h["nazwa"])>=30){
                    echo "<p class='productnazwa'>".substr($h["nazwa"], 0, 30)."...</p>";
                }else{
                    echo "<p class='productnazwa'>".$h["nazwa"]."</p>";
                }
                echo "<p class='productcena'>".$h["cena"]." zł</p>
                <p class='productilosc'>ilość: ".$h["ilosc"]."</p>
                <form class='productbtndiv' action='../product' method='get'>
                    <input name='p' type='hidden' value=".$h["id"].">
                    <input name='n' type='hidden' value=".$h["nazwa"].">
                    <button class='productbtn'>Zobacz Produkt</button>
                </form>
                </div>";
            }
        }else{
            echo "<h1 style='color: #505050;'>Nie znaleziono pasujących wyników...</h1>";
        }
        ?>
    </main>
</body>
</html>