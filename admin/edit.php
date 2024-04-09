<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";

        if($_SESSION["upraw"]=="worker" or $_SESSION["upraw"]=="admin"){
            
        }else{
            echo "<script>
            location.href = '../main-page/'
            </script>";
        }
        ?>
    </div>

    <main style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php
        $sqlquery = mysqli_query($conn, "SELECT * FROM uzytkownicy WHERE id=".$_GET["userid"]);

        $h = mysqli_fetch_assoc($sqlquery);

        echo "<div class='useradmindivedit' style='display: flex; flex-direction: column;'>
        <form action='./' method='POST' style='display: flex; flex-direction: column;'>
        <input type='text' name='editloginedit' placeholder='nazwa użytkownika' class='useradminloginedit' value='".$h["login"]."'>

        <select name='edituprawedit' class='useradminuprawedit' value='".$h["upraw"]."'>
        <option name='user'   class='useradminuprawedit'>Użytkownik</option>
        <option name='worker' class='useradminuprawedit'>Pracownik</option>
        <option name='admin'  class='useradminuprawedit'>Administrator</option>
        </select>

        <input type='submit' class='useradminbtnedit' value='Zapisz zmiany'>
        <input type='hidden' name='userid' value=".$h["id"].">
        </form>

        <form action='./deleteuser.php' method='POST'>
        <input type='hidden' name='deluserid' value=".$h["id"].">
        <button type='submit' class='useradminbtndel'>Usuń użytkownika</button>
        </form>
        </div>";
        ?>
    </main>
</body>
</html>