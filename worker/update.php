<?php
var_dump($_GET); 

// Połączenie z bazą danych
$conn = mysqli_connect("localhost", "root", "", "projektsklep");

// Sprawdzenie połączenia
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sprawdzenie czy parametr "id" został przesłany i czy akcja jest poprawna
if(isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    // Aktualizacja wartości kolumny `wswtl` w tabeli `produkty` na podstawie akcji
    if ($action === "publish") {
        $sql = "UPDATE produkty SET `wswtl`='1' WHERE id=$id";
    } elseif ($action === "unpublish") {
        $sql = "UPDATE produkty SET `wswtl`='0' WHERE id=$id";
    }

    // Wykonanie zapytania do bazy danych
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>
