<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona administratora</title>
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
        $sqlquery = mysqli_query($conn, "SELECT * FROM uzytkownicy");

        if(mysqli_num_rows($sqlquery) > 0){
            while($h = mysqli_fetch_assoc($sqlquery)){
                echo "<form class='useradmindiv' action='edit.php' method='get'>
                <p id='useradminlogin-".$h["login"]."' class='useradminlogin'>Nazwa użytkownika: ".$h["login"]."</p>
                <p id='useradminupraw-".$h["login"]."' class='useradminupraw'>Uprawnienia: ".$h["upraw"]."</p>

                <input type='hidden' name='userid' value=".$h["id"].">
                <button type='submit' class='useradminbtn'>
                <img height='40px' src='../images/edit.png' alt='Edytuj użytkownika'>
                </button>
                </form>";
            }
        }

        
        if(isset($_POST["editloginedit"], $_POST["edituprawedit"])){
            $id = $_POST["userid"];
            $login_edited = $_POST["editloginedit"];
            $upraw_edited = $_POST["edituprawedit"];

            $sql = mysqli_query($conn, "UPDATE `uzytkownicy` SET `login`='$login_edited',`upraw`='".strtolower($upraw_edited)."' WHERE id=$id");

            header("Refresh:0");
        }
        ?>
    </main>
</body>
</html>