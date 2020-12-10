<html>
<head>
<title>  Редактирование данных об игре </title>
</head>
<body>
<?php
$mysqli= new mysqli("localhost", "f0474070_root", "root", "f0474070_games");
if ($mysqli->connect_errno) {
echo "Невозможно подключиться к серверу"; 
}// установление соединения с сервером
$id_games = $_GET['id_games'];

$result = $mysqli->query("SELECT games_name, games_genre, games_developer, games_publisher, games_sales
FROM games1 WHERE id_games='$id_games'");
if ($result){
 while ($gm = $result->fetch_array()) {
 $games_name = $gm['games_name'];
 $games_genre = $gm['games_genre'];
 $games_developer = $gm['games_developer'];
 $games_publisher = $gm['games_publisher'];
 $games_sales = $gm['games_sales'];
 }}
 
print "<form action='save_edit_games.php' method='get'>";
print "Название: <input name='games_name' size='30' type='varchar'
value='$games_name'>";
print "<br>Жанр: <input name='games_genre' size='30' type='varchar'
value='$games_genre'>";
print "<br>Разработчик: <input name='games_developer' size='30' type='varchar'
value='$games_developer'>";
print "<br>Издатель: <input name='games_publisher' size='30' type='varchar'
value='$games_publisher'>";
print "<br>Объем продаж: <input name='games_sales' size='11' type='int'
value='$games_sales'>";
print "<input type='hidden' name='id_games' size='11' type='int'
value='$id_games'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
print "<p><a href='index_2.php'> Вернуться к списку игр </a>";
?>
</body>
</html>