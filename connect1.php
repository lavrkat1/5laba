<?php
$host = 'localhost';
$database = 'f0474070_games';
$user = 'f0474070_root';
$password = 'root';
//require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("ошибка" . mysqli_error($link));
//$query = "SELECT * FROM f0474070_games.games";
//$result = mysqli_query($link, $query) or die("ошибка" . mysqli_error($link));
//if($result)
//{
//}
//mysqli_close($link);
?>
