<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wylogowywanie</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        ?>
    </div>

    <?php
    $_SESSION["czyzalogowano"] = false;

    $_SESSION["user"] = "";

    $_SESSION["upraw"] = "";

    $_SESSION["id"] = "";

    echo "<script>
    setTimeout(() => {
    location.href = '../main-page/'
    }, '10');
    </script>";
    ?>
</body>
</html>