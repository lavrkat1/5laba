<html><body>
<?php
$mysqli = new mysqli("localhost", "f0474070_root", "root", "f0474070_games");
if ($mysqli->connect_errno){
    echo"Невозможно подключиться к серверу";} // установление соединения с сервером

$id_kluch=$_GET['id_kluch'];    
$kluch_date=$_GET['kluch_date'] ;    
$kluch_date_end=$_GET['kluch_date_end'];
$id_games=$_GET['id_games'];
$id_stores=$_GET['id_stores'];
$kluch_cost=$_GET['kluch_cost'];
$kluch_name=$_GET['kluch_name'];

$result = $mysqli->query ("UPDATE kluch SET kluch_date='$kluch_date', kluch_date_end='$kluch_date_end' , 
id_games='$id_games', id_stores='$id_stores', kluch_cost='$kluch_cost', kluch_name='$kluch_name'
WHERE id_kluch='$id_kluch'");

    
if ($result) 
{echo 'Все сохранено. <a href="kluch.php"> Вернуться к списку ключей </a>'; }
else { echo 'Ошибка сохранения. <a href="kluch.php">Вернуться к списку ключей</a> '; }
?>
</body></html>