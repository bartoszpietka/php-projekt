<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel pracownika</title>
    <link rel="stylesheet" href="../../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../../main-page/menu.php";
        ?>
    </div>

    <main>
        <?php
        $sqlquery = mysqli_query($conn, "DELETE FROM koszyki WHERE id=".$_POST["koszid"]);

        header("Location: ../")
        ?>
    </main>
</body>
</html>