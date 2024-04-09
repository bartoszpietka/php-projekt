<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj do koszyka</title>
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        ?>
    </div>

    <main style="display: flex; flex-wrap: wrap; padding-top: 10px;">
        <?php
        $sqlquery = mysqli_query($conn, "SELECT p.id, p.nazwa, p.cena, p.ilosc, p.zdjecie, k.Kilosc, k.id, u.login
        FROM koszyki k
        JOIN uzytkownicy u ON k.userID = u.id
        JOIN produkty p ON k.productID = p.id");

        if(mysqli_num_rows($sqlquery) > 0){
            while($r = mysqli_fetch_assoc($sqlquery)){
                echo "<div class='workercartdiv'>
                <img src='../images/".$r["zdjecie"]."' alt='".$r["nazwa"]."' class='usercartimg'>
                <p class='usercartp usercartlogin'>".$r["login"]."</p>

                <form action='./delfromcart/' method='POST' style='margin-left: 50px;'>
                        <input name='koszid' type='hidden' value='".$r["id"]."'>
                        <button type='submit' style='margin-left: 40px; border: 0; background-color: #00000000;'>
                        <img style='height: 40px;' src='../images/trash.png' alt='Usuń produkt'>
                        </button>
                </form>

                <p class='usercartp usercartnazwa'>".$r["nazwa"]."</p>
                <p class='usercartp usercartcena'>".$r["cena"]."</p>
                <p class='usercartp usercartilosc'>".$r["Kilosc"]."</p>
                </div>";
            }
        }
        ?>
    </main>
</body>
</html>