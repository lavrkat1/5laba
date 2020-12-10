<html>
<head>
<title>  Редактирование данных о ключах </title>
</head>
<body>
<?php


$mysqli= new mysqli("localhost", "f0474070_root", "root", "f0474070_games");
if ($mysqli->connect_errno) {
echo "Невозможно подключиться к серверу"; 
}// установление соединения с сервером
$id_kluch1 = $_GET['id_kluch'];
$prod = mysqli_query($mysqli,"SELECT
			kluch.id_kluch,
			kluch.kluch_date,
			kluch.kluch_date_end,
			kluch.kluch_cost,
			kluch.kluch_name,

			games1.id_games as id_games,
			games1.games_name as games_name,

			stores.id_stores as id_stores,
			stores.stores_name as stores_name

			FROM kluch
			LEFT JOIN games1 ON kluch.id_games=games1.id_games
			LEFT JOIN stores ON kluch.id_stores=stores.id_stores
			WHERE kluch.id_kluch='$id_kluch1'"
		);

		if ($prod){
			$prod = $prod->fetch_array();

			$id_kluch = $prod['id_kluch'];
			$kluch_date = $prod['kluch_date'];
			$kluch_date_end = $prod['kluch_date_end'];
			$kluch_cost = $prod['kluch_cost'];
			$kluch_name = $prod['kluch_name'];
			
			$id_stores = $prod['id_stores'];
			$stores_name = $prod['stores_name'];

			$id_games = $prod['id_games'];
			$games_name = $prod['games_name'];
			
		}


 
print "<form action='save_edit_kluch.php' method='get'>";

//работа с играми
$result = $mysqli->query("SELECT id_games, games_name FROM games1 WHERE id_games <> '$id_games' ");
echo "<br>Игра:<select name='id_games'>";
echo "<option selected value='$id_games'>$games_name</option>";
   if ($result){
    while ($row = $result->fetch_array()){
    $id_games = $row['id_games'];
    $games_name = $row['games_name'];
    echo "<option value='$id_games'>$games_name</option>";
  
    }
    }
	 echo "</select>";

//работа с магазинами

	 $result = $mysqli->query("SELECT id_stores, stores_name FROM stores WHERE id_stores <> '$id_stores' ");
     echo "<br>Магазин: <select name='id_stores'>";
      echo "<option selected value='$id_stores'>$stores_name</option>";

     if ($result){
     while ($row = $result->fetch_array()){
      $id_stores = $row['id_stores'];
      $stores_name = $row['stores_name'];
      echo "<option value='$id_stores'>$stores_name</option>";
      }
      }
       echo "</select>";
	   

print "<br> дата приобретения: <input name='kluch_date' placeholder='dd-mm-yyyy' type='date' value=$kluch_date>";
print "<br> дата окончания: <input name='kluch_date_end' placeholder='dd-mm-yyyy' type='date' value=$kluch_date_end>";
print "<br> стоимость: <input name='kluch_cost' size='11' type='int' value=$kluch_cost>";
print "<br> ключ: <input name='kluch_name' size='11' type='int'value=$kluch_name>";
print "<input type='hidden' name='id_kluch' size='11' value=$id_kluch1>";
print "<input  name='save' type='submit' value='Сохранить'>";
print "</form>";
print "<p><a href='kluch.php'> Вернуться к списку ключей </a>";
?>
</body>
</html>