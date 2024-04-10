<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        
        if($_SESSION["user"] == ""){
            echo "<script>
            location.href = '../login/'
            </script>";
        }
        ?>
    </div>
    
    <main style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php
        $sqlquery = mysqli_query($conn, "SELECT p.id, p.nazwa, p.cena, p.ilosc, p.zdjecie, k.Kilosc, k.id
        FROM koszyki k
        JOIN uzytkownicy u ON k.userID = u.id
        JOIN produkty p ON k.productID = p.id
        WHERE u.login = '".$_SESSION["user"]."'");
        ?>
        <div style="margin: 20px; background-color: white; padding: 0 0 18px 0; width: 530px;">
            <?php
            echo "<p style='color: black; margin: 20px;'>Koszyk użytkownika⠀<b style='color: black;'>".$_SESSION["user"]."</b></p>";
            if(mysqli_num_rows($sqlquery)>0){
                while($h = mysqli_fetch_assoc($sqlquery)){
                    echo "<div class='usercartdiv'>
                    <img src='../images/".$h["zdjecie"]."' class='usercartimg'>
                    <p class='usercartp usercartnazwa'>".$h["nazwa"]."</p>
                    <p class='usercartp usercartcena'>".$h["cena"]." zł</p>
                    <p class='usercartp usercartilosc'>Ilość: ".$h["Kilosc"]."</p>

                    <form action='./delfromcart/' method='POST'>
                        <input name='koszid' type='hidden' value='".$h["id"]."'>
                        <button type='submit' style='margin-left: 40px; border: 0; background-color: #00000000;'>
                        <img style='height: 40px;' src='../images/trash.png' alt='Usuń produkt'>
                        </button>
                    </form>
                    </div>";
                }
            }

            $sqlsum = mysqli_query($conn, "SELECT SUM(p.cena * k.Kilosc) AS suma_cen
            FROM koszyki k
            JOIN uzytkownicy u ON k.userID = u.id
            JOIN produkty p ON k.productID = p.id
            WHERE u.login = '".$_SESSION["user"]."'");

            $suma = mysqli_fetch_assoc($sqlsum);

            echo "<form id='divcartbottom' action='../buy/' method='post'>
            <p id='sum' style='margin-left: 20px; color: black; font-size: 20px;'>Suma: " . $suma['suma_cen'] . "</p>";
            if(mysqli_num_rows($sqlquery)>0){
                echo "<button id='buybtn'>Kup teraz</button>";
            }
            echo "</form>";
            ?>
        </div>
    </main>
</body>
</html>