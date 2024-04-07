<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuń użytkownika</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../main-page/style.css">
    <script>
        function deluser(userId) {
            if(confirm("Czy na pewno chcesz usunąć użytkownika?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "deleteuser.php?userid=" + userId, true);
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                        alert(xhr.responseText);
                    }
                };
                xhr.send();
            }
        }
    </script>
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
        $sqlquery = mysqli_query($conn, "DELETE FROM uzytkownicy WHERE id=".$_POST["deluserid"]);

        header('Location: ./');
        ?>
    </main>
</body>
</html>