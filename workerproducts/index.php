<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona pracownika</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../main-page/style.css">
    <script>
        function publish(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };
            xmlhttp.open("GET", "update.php?id=" + id + "&action=publish", true);
            xmlhttp.send();
        }

        function unpublish(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };
            xmlhttp.open("GET", "update.php?id=" + id + "&action=unpublish", true);
            xmlhttp.send();
        }

        function pdelete(id) {
            if (confirm("Czy na pewno chcesz usunąć ten produkt?")) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        location.reload();
                    }
                };
                xmlhttp.open("GET", "delete.php?id=" + id, true);
                xmlhttp.send();
            }
        }

        function edit(id) {
            var nazwaElement = document.getElementById('productworkernazwa' + id);
            var cenaElement = document.getElementById('productworkercena' + id);
            var iloscElement = document.getElementById('productworkerilosc' + id);
                
            var nazwaValue = nazwaElement.innerHTML;
            var cenaValue = cenaElement.innerHTML.slice(0, -3);
            var iloscValue = iloscElement.innerHTML.slice(7);
                
            nazwaElement.innerHTML = '<input type="text" class="productworkeritpnazwa" id="editNazwa' + id + '" value="' + nazwaValue + '">';
            cenaElement.innerHTML = '<input type="number" class="productworkeritpcena" id="editCena' + id + '" value="' + cenaValue + '">';
            iloscElement.innerHTML = '<input type="number" class="productworkeritpilosc" id="editIlosc' + id + '" value="' + iloscValue + '">';
                
            var buttonElement = document.getElementById('edit' + id);
            buttonElement.innerHTML = '<a onclick="update(' + id + ')">GOTOWE</a>';
        }

        function update(id) {
            var nazwaValue = document.getElementById('editNazwa' + id).value;
            var cenaValue = document.getElementById('editCena' + id).value;
            var iloscValue = document.getElementById('editIlosc' + id).value;
        
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };
            xmlhttp.open("GET", "edit.php?id=" + id + "&nazwa=" + nazwaValue + "&cena=" + cenaValue + "&ilosc=" + iloscValue, true);
            xmlhttp.send();
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
    
    <div style="display: flex; flex-wrap: wrap; justify-content: center;">
        <button onclick="location.href = './add'" class="productworkeredit" style="margin: 15px; height: 50px; width: 300px; background-color: aliceblue; font-size: 20px; border-radius: 5px;">Dodaj nowy produkt</button><br>
    </div>
    <main style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php
        $sqlquery = mysqli_query($conn, "SELECT * FROM produkty");

        if(mysqli_num_rows($sqlquery) > 0){
            while($h = mysqli_fetch_assoc($sqlquery)){
                echo "<div class='productworkerdiv'>
                <img class='productworkerimg' src='../images/".$h["zdjecie"]."'>
                <p id='productworkernazwa".$h["id"]."' class='productworkernazwa'>".$h["nazwa"]."</p>
                <p id='productworkercena".$h["id"]."' class='productworkercena'>".$h["cena"]." zł</p>
                <p id='productworkerilosc".$h["id"]."' class='productworkerilosc'>ilość: ".$h["ilosc"]."</p>
                
                <div class='btns'>";
                if($h["wswtl"]==0){
                    echo "<button id='hid".$h["id"]."' onclick='publish(".$h["id"].")' class='productworkerbtn productworkerhid'>
                    <img height='40px' src='../images/hide.png' alt='Upublicznij'>
                    </button>";
                }else{
                    echo "<button id='hid".$h["id"]."' onclick='unpublish(".$h["id"].")' class='productworkerbtn productworkerhid'>
                    <img height='40px' src='../images/show.png' alt='Ukryj'>
                    </button>";
                }
                    
                echo "<button id='edit".$h["id"]."' onclick='edit(".$h["id"].")' class='productworkerbtn productworkeredit'>
                    <img height='40px' src='../images/edit.png' alt='Edytuj'>
                    </button>
                    <button id='del".$h["id"]."' onclick='pdelete(".$h["id"].")' class='productworkerbtn productworkerdel'>
                    <img height='40px' src='../images/trash.png' alt='Usuń'></button>
                </div>
                </div>";
            }
        }
        ?>
        
    </main>
</body>
</html>