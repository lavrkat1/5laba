 <?php
    $mysqli = new mysqli("localhost", "f0474070_root", "root", "f0474070_games");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $kluch_date = $_GET['kluch_date'];
    $kluch_date_end = $_GET['kluch_date_end'];
    $id_games = $_GET['id_games'];
    $id_stores = $_GET['id_stores'];
    $kluch_cost = $_GET['kluch_cost'];
    $kluch_name = $_GET['kluch_name'];

    // Выполнение запроса
    $result = $mysqli->query("INSERT INTO kluch
        SET kluch_date='$kluch_date', kluch_date_end='$kluch_date_end',
        id_games='$id_games', id_stores='$id_stores',
        kluch_cost='$kluch_cost', kluch_name ='$kluch_name'"
    );

if ($result){
print "<p>Внесение данных прошло успешно!";
print "<p><a href='kluch.php'> Вернуться к списку </a>";
}
else{
print "Ошибка сохранения <a href='kluch.php'> Вернуться к списку </a>";
}
   
?>