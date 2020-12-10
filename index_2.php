<? require_once 'connect1.php';?>
<html>
<head> <title> Сведения об играх </title> </head>
<body>
<h2>Сведения об играх:</h2>
<table border="1">
<tr>
<th>ID</th>
 <th>Название</th> <th> Жанр </th>
 <th> Разработчик </th> <th> Издатель </th>
 <th> Объем продаж </th> <th> Редактировать </th> <th> Уничтожить </th> </tr>
 </tr>
<?php
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
$result=mysqli_query($link, "SELECT id_games, games_name, games_genre, games_developer, games_publisher, games_sales
FROM games1"); // запрос на выборку сведений о пользователях
mysqli_select_db($link, "games");

while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['id_games'] . "</td>";
 echo "<td>" . $row['games_name'] . "</td>";
 echo "<td>" . $row['games_genre'] . "</td>";
 echo "<td>" . $row['games_developer'] . "</td>";
 echo "<td>" . $row['games_publisher'] . "</td>";
 echo "<td>" . $row['games_sales'] . "</td>";
 echo "<td><a href='edit_games.php?id_games=" . $row['id_games']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete_games.php?id_games=" . $row['id_games']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего игр: $num_rows </p>");
?>
<p> <a href="new_games.php"> Добавить игру </a>
<p> <a href="kluch.php">Ключи</a>
<p> <a href="stores.php">Магазины</a>
<p> <a href="gen_pdf.php">Скачать pdf-файл</a>
<p> <a href="gen_xls.php">Скачать xls-файл</a>
</body> </html>