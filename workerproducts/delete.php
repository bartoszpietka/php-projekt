<?php
// Połączenie z bazą danych
$conn = mysqli_connect("localhost", "root", "", "projektsklep");

// Sprawdzenie połączenia
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sprawdzenie czy parametr "id" został przesłany
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Zapytanie SQL do usunięcia produktu o podanym id
    $sql = "DELETE FROM produkty WHERE id=$id";

    // Wykonanie zapytania do bazy danych
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
