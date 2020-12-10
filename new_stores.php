<html>
<head> <title> Добавление нового магазина </title> </head>
<body>
<H2>Добавление нового магазина:</H2>
<form action="save_new_stores.php" method="get">
 Название: <input name="stores_name" size="30" type="varchar">
<br>url: <input name="stores_url" size="30" type="varchar">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="stores.php"> Вернуться к списку магазинов </a>
</body>
</html>
