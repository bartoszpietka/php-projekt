<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj do koszyka</title>
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        ?>
    </div>
    
    <main>
        <?php
        $userID = $_SESSION["id"];
        $productID = $_POST['addprod'];
        $Kilosc = $_POST['Kilosc'];

        echo $userID.", ".$productID.", ".$Kilosc;

        $sql = "INSERT INTO `koszyki`(`userID`, `productID`, `Kilosc`)
        VALUES ('$userID','$productID','$Kilosc')";
        echo $sql;
        if(mysqli_query($conn, $sql)) {
            echo "Produkt został dodany do koszyka.";
        } else {
            echo "Wystąpił błąd: " . mysqli_error($conn);
        }

        header("location: ../cart/");
        ?>
    </main>
</body>
</html>