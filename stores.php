<? require_once 'connect1.php';?>
<html>
<head> <title> Сведения о магазинах </title> </head>
<body>
<h2>Сведения о магазинах:</h2>
<table border="1">
<tr>
<th>id магазина</th>
 <th>название</th> <th> url </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
 </tr>
<?php
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
$result=mysqli_query($link, "SELECT id_stores, stores_name, stores_url FROM stores"); // запрос на выборку сведений о пользователях
mysqli_select_db($link, "stores");

while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['id_stores'] . "</td>";
 echo "<td>" . $row['stores_name'] . "</td>";
 echo "<td>" . $row['stores_url'] . "</td>";
 echo "<td><a href='edit_stores.php?id_stores=" . $row['id_stores']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete_stores.php?id_stores=" . $row['id_stores']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего магазинов: $num_rows </p>");
?>
<p> <a href="new_stores.php"> Добавить магазин </a>
<p> <a href="index_2.php"> Вернуться назад </a>
</body> </html>