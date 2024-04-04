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
        
    </main>
</body>
</html>