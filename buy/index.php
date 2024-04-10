<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kupowanie</title>
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        
        if($_SESSION["user"] == ""){
            echo "<script>
            location.href = '../login/'
            </script>";
        }
        ?>
    </div>
    
    <main style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php
        $shrqueru = mysqli_query($conn, "UPDATE produkty p
        JOIN (
            SELECT productID, SUM(Kilosc) AS sum_kilosc
            FROM koszyki
            GROUP BY productID
        ) k ON p.id = k.productID
        SET p.ilosc = p.ilosc - k.sum_kilosc;
        ");
        $delquery = mysqli_query($conn, "DELETE FROM `koszyki` WHERE userID='".$_SESSION["id"]."'");

        header("Location: ../cart/");
        ?>
    </main>
</body>
</html>