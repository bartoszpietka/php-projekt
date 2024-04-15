<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie produktu</title>
    <link rel="stylesheet" href="http://localhost/sklep\main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "./menu.php";

        if($_SESSION["upraw"]=="worker" or $_SESSION["upraw"]=="admin"){
            
        }else{
            echo "<script>
            location.href = '../../main-page/'
            </script>";
        }
        ?>
    </div>

    <main style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php

        $sqlquery = mysqli_query($conn, "SELECT * FROM produkty WHERE id=".$_POST["ii"]);

        $h = mysqli_fetch_assoc($sqlquery);

        echo "<div class='workereditdiv'>
        <img class='workereditimg' src='../../images/".$h["zdjecie"]."'>

        <form action='./edit.php' method='post' class='rrrr'>
            <input type='hidden' name='ppid' value='".$_POST["ii"]."'>
            <input name='editname' placeholder='Nazwa' class='workereditnazwa' value='".$h["nazwa"]."' style='border: 0;'>
            <input name='editprice' placeholder='Cena' class='workereditcena' type='number' value='".$h["cena"]."' style='border: 0;'>
            <input name='editquantity' placeholder='Ilość' class='workereditilosc' type='number' value='".$h["ilosc"]."' style='border: 0;'>";
        
            $sqltrack_query = "SELECT * FROM tracks WHERE Pid='".$h["id"]."'";
            $t = mysqli_query($conn, $sqltrack_query);

            echo "<div class='workeredittrack'>";
            while($r = mysqli_fetch_assoc($t)){
                echo "<div style='height: 19px;'><input type='hidden' name='id".$r["id"]."' value='".$r["id"]."'><input name='kp".$r["id"]."' value='".$r["nazwa"]."' style='margin-top: 0; padding-top: 0; border: 0;'></div>";
            }

            echo "</div>
            <button type='submit' style='margin-top: 300px; height: 30px; width: 100px; height: 30px; color: #509950; background-color: #00000000; font-size: 20px; border: 1px solid #509950; border-radius: 5px; cursor: pointer;'>Gotowe</button>
            </form>";
        ?>
    </main>
</body>
</html>
