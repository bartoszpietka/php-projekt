<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        ?>
    </div>

    <main>
        <form action="" method="POST" class="formlogin" style="display: flex; flex-direction: column;">
            <input type="text" name="login" placeholder="nazwa użytkownika" class="loginform">
            <input type="text" name="haslo" placeholder="hasło" class="loginform">
            <input type="submit" class="loginform" value="Zarejestruj się">
            <?php
            if(isset($_POST["login"], $_POST["haslo"])){
                $login = $_POST["login"];
                $password = $_POST["haslo"];
            
                function szyfr($password){
                    return md5($password);
                }
            
                $szsz = szyfr($password);
            
                $insert = "INSERT INTO uzytkownicy (`login`, `haslo`, `upraw`, `pfp`) VALUES ('$login','$szsz','user','basic.png')";
            
                if(mysqli_query($conn, $insert)){
                    echo "<p style='color: black;'>Pomyślnie utworzono konto</p>";
                }else{
                    echo "<p style='color: red;>Wystąpił błąd przy dodawaniu konta</p>";
                }
            }
            ?>
            <p id="logintext">Posiadasz już konto? <a href="../login/" style="color: #ac3a43;">Zaloguj się</a></p>
        </form>
    </main>

</body>
</html>