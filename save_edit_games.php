<html><body>
<?php
$mysqli = new mysqli("localhost", "f0474070_root", "root", "f0474070_games");
if ($mysqli->connect_errno){
    echo"Невозможно подключиться к серверу";} // установление соединения с сервером

$id_games=$_GET['id_games'];
    
$games_name=$_GET['games_name'] ;   
$games_genre=$_GET['games_genre'];
$games_developer= $_GET['games_developer'];
$games_publisher=$_GET['games_publisher'];
$games_sales=$_GET['games_sales'];

$zapros="UPDATE games1 SET games_name='$games_name', games_genre='$games_genre',
games_developer='$games_developer', games_publisher='$games_publisher', games_sales='$games_sales' 
WHERE id_games='$id_games'";

$result = $mysqli->query ($zapros);

if ($result) 
{echo 'Все сохранено. <a href="index_2.php"> Вернуться к списку игр </a>'; }
else { echo 'Ошибка сохранения. <a href="index_2.php">Вернуться к списку игр</a> '; }
?>
</body></html>