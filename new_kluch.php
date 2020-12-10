<html>
<head> <title> Добавление нового ключа </title> </head>
<body>
<H2>Добавление нового ключа:</H2>
<form action="save_new_kluch.php" method="get">
<?
$mysqli= new mysqli("localhost", "f0474070_root", "root", "f0474070_games");
if ($mysqli->connect_errno) {
echo "Невозможно подключиться к серверу"; 
}
//id игры
   $result = $mysqli->query("SELECT id_games, games_name FROM games1");
    echo "<br>Игра: <select name='id_games'>"; 

    if ($result){
    while ($row = $result->fetch_array()){
    $id_games = $row['id_games'];
    $games_name = $row['games_name'];
    echo "<option value='$id_games'>$games_name</option>";
    }
    }
	 echo "</select>";
//id цифрового магазина
	 $result = $mysqli->query("SELECT id_stores, stores_name FROM stores");
     echo "<br>Магазин: <select name='id_stores'>";

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
?>


<p><input name="add" type="submit"  value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
<p><a href="kluch.php"> Вернуться к списку ключей </a>
</form>
</body>
</html>
