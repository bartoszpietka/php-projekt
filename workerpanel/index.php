<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel pracownika</title>
    <link rel="stylesheet" href="../main-page/style.css">
</head>
<body>
    <div id="menu">
        <?php
        include "../main-page/menu.php";
        ?>
    </div>

    <main style="display: flex; flex-wrap: wrap; justify-content: center;">
        <div style="height: 100px; width: 500px; display: flex; flex-direction: row; align-items: center; justify-content: center;">
            <button onclick="produkty()" class="productworkeredit" style="margin: 15px; height: 50px; width: 300px; background-color: aliceblue; font-size: 20px; border-radius: 5px;">Produkty</button>
            <button onclick="koszyki()" class="productworkeredit" style="margin: 15px; height: 50px; width: 300px; background-color: aliceblue; font-size: 20px; border-radius: 5px;">Koszyki</button>
        </div>
    </main>

    <script>
        function produkty() {
            window.location.assign("../workerproducts/")
        }

        function koszyki() {
            window.location.assign("../workercarts/")
        }
    </script>
</body>
</html>