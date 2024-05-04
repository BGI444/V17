<?php
//In diesem Beispiel legen wir in unserer Datenbank 'Produktdatenbank' eine neuen Tabelle an


// Deklariere vier Variablen, die unsere Verbindungsinfos enthalten
$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPasswort = "";
$dbname = "productdb";

// Verbinde mit Server und Datenbank
$verbindung = mysqli_connect($dbServername, $dbUsername, $dbPasswort, $dbname);

// Überprüfung, ob die Verbindung geklappt hat
if ($verbindung->connect_error) {
  die("Der Verbindungsversuch ist fehlgeschlagen: " . $verbindung->connect_error);
}
echo "Sie sind mit dem Server verbunden.";

// Erstelle eine neue Tabelle namens 'produktsortiment' mit 6 Spalten
$sql = "CREATE TABLE produktsortiment (
    id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    speisenname VARCHAR(255) NOT NULL,
    beschreibung VARCHAR(255) NOT NULL,
    bild varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    preis DECIMAL(10, 2) NOT NULL,
    lagerbestand INT UNSIGNED NOT NULL
    )";
    
    if ($verbindung->query($sql) === TRUE) {
      echo "Die Tabelle produkt_sortiment wurde erfolgreich erstellt.";
    } else {
      echo "Fehler bei der Erstellung der Tabelle: " . $verbindung->error;
    }

// Verbindung mit dem Server beenden
mysqli_close($verbindung);

?>