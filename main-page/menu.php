<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #header{
            display: grid;
            grid-template-columns: 8% 7% 70% 7% 8%;
            grid-template-rows: 140px;
            grid-template-areas: "homepage null searchbar userprofile shoppingcart";
            align-items: center;
        }
    </style>
</head>
<body>
    <div id="header">
        <a href="http://localhost/sklep/main-page/" style="color: #00000000; grid-area: homepage;">
            <img src="../images/logo.png" alt="logo" style="margin: 20px; height: 100px;">
        </a>
        
        <div style="grid-area: null;"></div>

        <form action="../search/" id="searchform" style="grid-area: searchbar; display: flex; justify-content: center;">
            <input type="text" id="searchinput" name="searchedphrase">
            <button id="searchbutton" type="submit">
                <img src="../images/search.png" alt="wyszukaj" style="height: 19px;">
            </button>
        </form>
        
        <?php
        $conn = mysqli_connect("localhost", "root", "", "projektsklep");

        if($_SESSION["czyzalogowano"] == false){
            echo "<button style='font-size: 20px; background-color: #10101000; border: 2px solid white; width: 130px;' onclick='zaloguj()'>Zaloguj się</button>";

            $_SESSION["czyzalogowano"] = false;

            $_SESSION["user"] = "";

            $_SESSION["upraw"] = "";
        }else{
            $q = mysqli_query($conn, "SELECT * FROM uzytkownicy");
            $row = mysqli_fetch_assoc($q);
            $pfp = $row['pfp'];

            echo "<a href=''>
                <img src='../pfp/$pfp' alt='strona użytkownika' style='margin: 20px; height: 60px; border: 0; border-radius: 100%;'>
            </a>
            
            <button style='font-size: 20px; background-color: #10101000; border: 2px solid white; width: 130px;' onclick='wyloguj()'>Wyloguj się</button>";
        }
        ?>
    </div>
    
    <script>
        function zaloguj(){
            window.location.assign("../login/")
        }

        function wyloguj(){
            window.location.assign("../logout/")
        }
    </script>
</body>
</html>