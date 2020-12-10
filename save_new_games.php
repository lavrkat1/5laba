<?php
$link= mysqli_connect("localhost", "f0474070_root", "root", "f0474070_games"); 
if (mysqli_connect_errno()){
printf("Не удалось подключиться: %s\n", mysql_connect_error());
exit();
} // установление соединения с сервером и подключение к базе данных:
 // Строка запроса на добавление записи в таблицу:
mysqli_query($link,"INSERT INTO games1 SET games_name='" . $_GET['games_name']
."', games_genre='".$_GET['games_genre']."', games_developer='"
.$_GET['games_developer']."', games_publisher='".$_GET['games_publisher'].
"', games_sales='".$_GET['games_sales']. "'");
 if (mysqli_affected_rows($link)>0) // если нет ошибок при выполнении запроса
 { print "<p>Спасибо, Ваша игра добавлена в базу данных.";
 print "<p><a href=\"index_2.php\"> Вернуться к списку
игр </a>"; }
 else { print "Ошибка сохранения. <a href=\"index_2.php\">
Вернуться к списку игр </a>"; 
     mysqli_close($link);
 }
?>
