<?php
//In diesem Beispiel erstellen wir auf unserem Server eine neue Datenbank

// Deklariere drei Variablen, die unsere Verbindungsinfos enthalten
$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPasswort = "";

// Verbinde mit Server
$verbindung = mysqli_connect($dbServername, $dbUsername, $dbPasswort);

// Überprüfung, ob die Verbindung geklappt hat
if ($verbindung->connect_error) {
  die("Der Verbindungsversuch ist fehlgeschlagen: " . $verbindung->connect_error);
}
echo "Sie sind mit dem Server verbunden.";

// Erstelle neue Datenbank namens 'customerDB'
$sql = "CREATE DATABASE productdb";
if (mysqli_query($verbindung, $sql)) {
  echo "Die Datenbank wurde erfolgreich erstellt";
} else {
  echo "Fehler bei der Erstellung der Datenbank: " . mysqli_error($verbindung);
}

// Verbindung mit dem Server beenden
mysqli_close($verbindung);

?>