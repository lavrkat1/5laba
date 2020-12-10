<?php
$mysqli = new mysqli("localhost", "f0474070_root", "root", "f0474070_games") or die ("Невозможно
подключиться к серверу");
$id_games = $_GET['id_games'];
$result = $mysqli->query("DELETE FROM games1 WHERE id_games='$id_games'");
header("Location: index_2.php");
exit;
?>
