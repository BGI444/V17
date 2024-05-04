<?php
//In diesem Beispiel legen wir in unserer Datenbank 'kundenDB' eine neuen Tabelle an


// Deklariere vier Variablen, die unsere Verbindungsinfos enthalten
$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPasswort = "";
$dbname = "customerdb";

// Verbinde mit Server und Datenbank
$verbindung = mysqli_connect($dbServername, $dbUsername, $dbPasswort, $dbname);

// Überprüfung, ob die Verbindung geklappt hat
if ($verbindung->connect_error) {
  die("Der Verbindungsversuch ist fehlgeschlagen: " . $verbindung->connect_error);
}
echo "Sie sind mit dem Server verbunden.";

// Erstelle eine neue Tabelle namens 'stammdaten' mit sieben Spalten
$sql = "CREATE TABLE stammdaten (
  email VARCHAR(255) NOT NULL PRIMARY KEY,
    vorname VARCHAR(50) NOT NULL,
    nachname VARCHAR(50) NOT NULL,
    passwort VARCHAR(255) NOT NULL
    )";
    
    if ($verbindung->query($sql) === TRUE) {
      echo "Die Tabelle kunden_stammdaten wurde erfolgreich erstellt.";
    } else {
      echo "Fehler bei der Erstellung der Tabelle: " . $verbindung->error;
    }

// Verbindung mit dem Server beenden
mysqli_close($verbindung);

?>