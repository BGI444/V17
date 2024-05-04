<?php
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

// SQL-Abfrage zum Einfügen von Datensätzen in die Tabelle
$sql = "INSERT INTO produktsortiment (speisenname, beschreibung, bild, preis, lagerbestand) VALUES 
        ('Wildgulasch mit Semmelknödeln', 'Zartes Wildfleisch in Rotweinsauce mit Semmelknödel', 'wildgulasch.jpeg', 19.90, 10),
        ('Apfelstrudel mit Vanillesauce', 'klassischer österreichischer Apfelstrudel', 'C:\xampp\htdocs\WPWendtner\img\apfelstrudel.jpeg', 7.50, 34),
        ('Kürbisrisotto mit Kürbiskernen und Parmesan', 'Cremiges Risotto, verfeinert mit köstlichem Kürbispüree', 'risotto.jpeg', 14.50, 20),
        ('
Spargel mit Sauce Hollandaise', 'Frischer Spargel mit Sauce Hollandaise und neuen Kartoffeln', 'spargelmitkartoffeln.jpeg', 14.50, 8)";

// Überprüfen, ob die Datensätze erfolgreich eingefügt wurden
if ($verbindung->query($sql) === TRUE) {
  echo "Datensätze wurden erfolgreich eingefügt.";
} else {
  echo "Fehler beim Einfügen der Datensätze: " . $verbindung->error;
}

// SQL-Abfrage zum Lesen der Datensätze aus der Tabelle
$sql = "SELECT * FROM Produktsortiment";
$result = $verbindung->query($sql);

// Überprüfen, ob Datensätze vorhanden sind
if ($result->num_rows > 0) {
  // Datensätze vorhanden, Ausgabe der Informationen
  while ($row = $result->fetch_assoc()) {
    echo "Speisenname: " . $row["speisenname"] . "<br>";
    echo "Beschreibung: " . $row["beschreibung"] . "<br>";
    echo "Bild: <img src='" . $row["bild"] . "' alt='Bild'><br>";
    echo "Preis: " . $row["preis"] . "<br>";
    echo "Lagerbestand: " . $row["lagerbestand"] . "<br><br>";
  }
} else {
  echo "Keine Datensätze gefunden.";
}

// Verbindung mit dem Server beenden
mysqli_close($verbindung);
?>
