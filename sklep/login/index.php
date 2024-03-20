<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        ?>
    </div>
    
    <div style="height: 800px; width: 400px;">
        <form action="" method="post">
            <input type="text" name="login">
            <input type="text" name="haslo">
            <button type="submit">Zaloguj się</button>
        </form>

        <p>Nie posiadasz konta? <a href="../register/">Zarejestruj się</a></p>
    </div>
</body>
</html>