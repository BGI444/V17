<?php
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

// Übernahme der Kundenangaben aus dem Formular in php-Variablen
$emailHTML = $_POST['email'];
$passwortHTML = $_POST['passwort'];

// Initialisiere eine Variable, um den Anmeldestatus zu verfolgen
$anmeldungErfolgreich = "nein";

// Wir rufen alle Werte in der Datenbanktabelle stammdaten ab
$query = $verbindung->query("SELECT * FROM stammdaten ORDER BY email ASC");

// Mit einer if-Abfrage checken wir, ob in stammdaten MINDESTENS ein Kunde existiert 
if ($query->num_rows > 0) {
    // Durchlaufen der Kunden in der Datenbank
    while ($row = $query->fetch_assoc()) {
        // Übernahme von E-Mail und Passwort aus der Datenbank
        $email = $row["email"];
        $passwort = $row["passwort"];
        
        // Überprüfung, ob die eingegebenen Daten mit denen in der Datenbank übereinstimmen
        if ($email == $emailHTML && $passwort == $passwortHTML) {
            // Benutzer erfolgreich angemeldet
            $anmeldungErfolgreich = "ja";
            break;
        }
    }
}

// Ausgabe der entsprechenden Meldung basierend auf dem Anmeldestatus
if ($anmeldungErfolgreich == "ja") {
    echo "Sie wurden erfolgreich angemeldet.";
} else {
    // Anmeldefehler, wenn keine Übereinstimmung gefunden wurde
    echo "Anmeldung fehlgeschlagen. Bitte überprüfen Sie Ihre Eingaben.";
}

// Verbindung mit dem Server beenden
mysqli_close($verbindung);
?>
