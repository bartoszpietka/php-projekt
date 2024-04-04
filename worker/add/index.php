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

    <main>
        <form action="" method="post" class="formlogin" style="display: flex; flex-direction: column;">
            <input type="file" name="zdjecie" style="margin: 5px; margin-bottom: 20px; color: #ac3a43; width: 310px; font-size: 18px; background-color: #00000000;">
            <input type="text" name="nazwa" placeholder="nazwa*" class="loginform">
            <input type="text" name="cena" placeholder="cena*" class="loginform">
            <input type="text" name="ilosc" placeholder="ilosc*" class="loginform">
            <input type="submit" class="loginform" value="Utwórz produkt">
            <?php
            if(isset($_POST["nazwa"], $_POST["cena"], $_POST["ilosc"])){
                $nazwa = $_POST["nazwa"];
                $cena = $_POST["cena"];
                $ilosc = $_POST["ilosc"];

                if(isset($_POST["zdjecie"])){
                    $zdjecie = $_POST["zdjecie"];

                    $resz = mysqli_query($conn, "INSERT INTO `produkty`(`nazwa`, `cena`, `ilosc`, `zdjecie`, `wswtl`) VALUES ('$nazwa','$cena','$ilosc','$zdjecie','0')");

                    if($resz){
                        echo "<p style='color: black;'>Dodano produkt</p>";
                    }else{
                        echo "<p style='color: black;'>Dodanie produktu nie powiodło się</p>";
                    }
                }else{
                    $res = mysqli_query($conn, "INSERT INTO `produkty`(`nazwa`, `cena`, `ilosc`, `wswtl`) VALUES ('$nazwa','$cena','$ilosc','0')");
                
                    if($res){
                        echo "<p style='color: black;'>Dodano produkt</p>";
                    }else{
                        echo "<p style='color: black;'>Dodanie produktu nie powiodło się</p>";
                    }
                }
            }else{
                echo "";
            }
            ?>
            <p style="margin-top: 100px;"></p>
        </form>

    </main>
</body>
</html>
