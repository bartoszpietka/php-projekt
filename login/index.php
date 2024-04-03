<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body id="bodylogin">
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        ?>
    </div>
    
    <div id="divloginmenu">
        <form action="" method="post" id="formlogin" style="display: flex; flex-direction: column;">
            <input type="text" name="login" placeholder="nazwa użytkownika" id="inputlogin" class="loginform">
            <input type="password" name="haslo" placeholder="hasło" id="inputpassword" class="loginform">
            <input type="submit" id="buttonlogin" class="loginform" value="Zaloguj się">
    <?php
    if(isset($_POST["login"], $_POST["haslo"])){
        $login = $_POST["login"];
        $password = $_POST["haslo"];

        function szyfr($password){
            return md5($password);
        }

        $szsz = szyfr($password);

        $sql = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='$szsz'";
        $res = mysqli_query($conn, $sql);


        if(mysqli_num_rows($res) > 0){
            //zalogowano

            $_SESSION["czyzalogowano"] = true;

            $row = mysqli_fetch_assoc($res);

            $_SESSION["user"] = $row["login"];

            $_SESSION["upraw"] = $row["upraw"];

            header("location: ../index.php");
        }else{
            //niezalogowano

            $_SESSION["czyzalogowano"] = false;

            $_SESSION["user"] = "";

            $_SESSION["upraw"] = "";

            echo "<p style='color: black;'>nie udało się zalogować</p>";
        }
    }
    ?>
            <p id="registertext">Nie posiadasz konta? <a href="../register/" style="color: #ac3a43;">Zarejestruj się</a></p>
        </form>
    </div>

</body>
</html>