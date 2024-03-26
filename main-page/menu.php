<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #header{
            display: grid;
            grid-template-columns: 33% 52% 15%;
            grid-template-rows: 140px;
            grid-template-areas: "homepage searchbar shoppingcart";
            align-items: center;
        }
    </style>
</head>
<body>
    <div id="header">
        <a href="http://localhost/sklep/main-page/" style="color: #10101000; grid-area: homepage;">
            <img src="../images/logo.png" alt="logo" style="margin: 20px; height: 100px;">
        </a>

        <form action="../search/" id="searchform" style="grid-area: searchbar;">
            <input type="text" id="searchinput" name="searchedphrase">
            <button id="searchbutton" type="submit">
                <img src="../images/search.png" alt="wyszukaj" style="height: 19px;">
            </button>
        </form>
        
        <form action="../login/" method="post">
            <button style="font-size: 20px; background-color: #10101000;">Zaloguj się</button>
        </form>
    </div>
    
</body>
</html>