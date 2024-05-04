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

//Übernahme der Kundenangaben aus dem Formular in php-Variablen
$email = $_POST['email'];
$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$passwort = $_POST['passwort'];

// Eingabe der Kundendaten in die 'stammdaten' Tabelle
$sql = "INSERT INTO stammdaten (email, vorname, nachname, passwort)
VALUES ('$email', '$vorname', '$nachname', '$passwort')";
$rs = mysqli_query($verbindung, $sql);


//Überprüfung, ob die Daten eingegeben wurden
if($rs)
{
	echo "Die neuen Daten wurden erfolgreich eingegeben.";
} else {
      echo "Fehler bei der Dateneingabe: " . $verbindung->error;
    }

// Verbindung mit dem Server beenden
mysqli_close($verbindung);

?>