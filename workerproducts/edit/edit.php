<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="http://localhost/sklep/main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "./menu.php";

        if($_SESSION["upraw"]=="worker" or $_SESSION["upraw"]=="admin"){
            
        }else{
            echo "<script>
            location.href = '../../main-page/'
            </script>";
        }
        ?>
    </div>
    
    <main>
        <?php
        $sqlprod = mysqli_query($conn, "UPDATE `produkty` SET `nazwa`='".$_POST["editname"]."',`cena`='".$_POST["editprice"]."',`ilosc`='".$_POST["editquantity"]."' WHERE id=".$_POST["ppid"]);

        $sqltrack_query = "SELECT * FROM tracks WHERE Pid='".$_POST["ppid"]."'";
        $t = mysqli_query($conn, $sqltrack_query);

        while($r = mysqli_fetch_assoc($t)){
            $sqlquery = "UPDATE `tracks` SET `nazwa`='".$_POST["kp".$r['id']]."' WHERE id=".$_POST["id".$r['id']];
            $daw = mysqli_query($conn, $sqlquery);
        }
        
        header("Location: ../")
        ?>
    </main>
</body>
</html>