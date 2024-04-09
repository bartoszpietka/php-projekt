<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="icon" type="image/x-icon" href="../../images/icon.png">
    <style>
        #header{
            display: grid;
            grid-template-columns: 8% 9% 65% 7% 8%;
            grid-template-rows: 140px;
            grid-template-areas: "homepage panels searchbar userprofile shoppingcart";
            align-items: center;
        }
    </style>
</head>
<body>
    <div id="header">
        <a href="http://localhost/sklep/main-page/" style="color: #00000000; grid-area: homepage;">
            <img src="../../images/logo.png" alt="Strona główna" style="margin: 20px; height: 100px;">
        </a>
        
        <div style="grid-area: panels; display: flex; z-index: 2;">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "projektsklep");

        if($_SESSION["upraw"] == "admin"){
            echo "<a href='../../admin' style='margin-left: 100px;'>
            <img src='../../images/adminpanel.png' alt='Panel administratora' style='height: 60px;'>
            </a>";
        }

        if($_SESSION["upraw"] == "admin" or $_SESSION["upraw"] == "worker"){
            echo "<a href='../../worker' style='margin-left: 15vh;'>
            <img src='../../images/workerpanel.png' alt='Panel pracownika' style='height: 60px;'>
            </a>";
        }
        ?></div>

        <form action="../../search/" id="searchform" style="grid-area: searchbar; display: flex; justify-content: center;">
            <input type="text" id="searchinput" name="searchedphrase">
            <button id="searchbutton" type="submit">
                <img src="../../images/search.png" alt="wyszukaj" style="height: 19px;">
            </button>
        </form>
        
        <?php
        if($_SESSION["czyzalogowano"] == false){
            echo "<button style='font-size: 20px; background-color: #10101000; border: 2px solid white; width: 130px;' onclick='zaloguj()'>Zaloguj się</button>";

            $_SESSION["czyzalogowano"] = false;

            $_SESSION["user"] = "";

            $_SESSION["upraw"] = "";
        }else{
            $q = mysqli_query($conn, "SELECT * FROM uzytkownicy");
            $row = mysqli_fetch_assoc($q);

            echo "<a href='../../cart/'>
                <img src='../../images/scart.png' alt='Koszyk' style='margin: 0; height: 60px; border: 0;'>
            </a>
            
            <button style='font-size: 20px; background-color: #10101000; border: 2px solid white; width: 130px;' onclick='wyloguj()'>Wyloguj się</button>";
        }
        ?>
    </div>
    
    <script>
        function zaloguj(){
            window.location.assign("../../login/")
        }

        function wyloguj(){
            window.location.assign("../../logout/")
        }
    </script>
</body>
</html>