<?php
// Połączenie z bazą danych
$conn = mysqli_connect("localhost", "root", "", "projektsklep");

// Sprawdzenie połączenia
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sprawdzenie czy parametry zostały przesłane
if(isset($_GET['id']) && isset($_GET['nazwa']) && isset($_GET['cena']) && isset($_GET['ilosc'])) {
    $id = $_GET['id'];
    $nazwa = $_GET['nazwa'];
    $cena = $_GET['cena'];
    $ilosc = $_GET['ilosc'];

    // Zapytanie SQL do aktualizacji danych
    $sql = "UPDATE produkty SET nazwa='$nazwa', cena='$cena', ilosc='$ilosc' WHERE id=$id";

    // Wykonanie zapytania do bazy danych
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
