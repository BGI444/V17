<?php

$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = ""; 
$dbName = "productdb";


$verbindung = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);


if($verbindung->connect_error) {
    die("Connection failed: " . $verbindung->connect_error);
}

$dishes = [];
$sql = "SELECT speisenname, bild, beschreibung, preis, lagerbestand FROM produktsortiment;";
$result = $verbindung->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dishes[] = $row;
    }
}


  /*<?php foreach ($dishes as $dish): ?>
                <tr>
                    <td><?php echo htmlspecialchars($dish['speisenname'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="available"><?php echo (int)$dish['lagerbestand']; ?></td>
                    <td>
                        <input type="number" name="dishQuantity[<?php echo htmlspecialchars($dish['speisenname'], ENT_QUOTES, 'UTF-8'); ?>]" min="0" max="<?php echo (int)$dish['lagerbestand']; ?>" value="0">
                    </td>
                </tr>
                <?php endforeach; ?>*/

$verbindung->close();
?>

