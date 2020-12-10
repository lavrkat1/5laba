<?php
$mysqli = new mysqli("localhost", "f0474070_root", "root", "f0474070_games") or die ("Невозможно
подключиться к серверу");
$id_kluch = $_GET['id_kluch'];
$result = $mysqli->query("DELETE FROM kluch WHERE id_kluch='$id_kluch'");
header("Location: kluch.php");
exit;
?>
