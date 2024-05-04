<?php
session_start();

$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = ""; 
$dbName = "productdb";

$verbindung = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orderSuccessful = false;

    foreach ($_POST['dishQuantity'] as $selectedDish => $dishQuantity) {
       
        $selectedDish = mysqli_real_escape_string($verbindung, $selectedDish);
       
        $dishQuantity = intval($dishQuantity);

        $dishUpdateQuery = "UPDATE produktsortiment SET lagerbestand = lagerbestand - ? WHERE speisenname = ? AND lagerbestand >= ?";

    
        if ($stmt = mysqli_prepare($verbindung, $dishUpdateQuery)) {
            mysqli_stmt_bind_param($stmt, "isi", $dishQuantity, $selectedDish, $dishQuantity);
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $orderSuccessful = true;
            }
            mysqli_stmt_close($stmt);
        }
    }


    mysqli_close($verbindung);

   
    if ($orderSuccessful) {
        $_SESSION['order_success'] = 'Vielen Dank für Ihre Bestellung';
    } else {
        $_SESSION['order_error'] = 'Fehler: Sie haben die Bestellmenge überschritten';
    }

    header('Location: OrderPage.php');
} else {
    header('Location: OrderPage.php');
}
?>
