<html>
<head> <title> Сведения о ключах </title> </head>
<body>
<h2>Сведения о ключах:</h2>
<table border="1">
<tr>
<th>ID ключа</th>
 <th>дата приобретения</th> <th> дата окончания </th>
 <th> игра </th> <th> магазин </th>
 <th> стоимость </th> <th> ключ </th> <th> Редактировать </th> <th> Уничтожить </th> </tr>
 </tr>
<?php
 $mysqli = new mysqli("localhost", "f0474070_root", "root", "f0474070_games");
            if ($mysqli->connect_errno) {
                echo "Невозможно подключиться к серверу";
            }
$result=$mysqli->query("SELECT kluch.id_kluch, kluch.kluch_date, kluch.kluch_date_end, games1.games_name as games, stores.stores_name as stores, kluch.kluch_cost, kluch.kluch_name
FROM kluch 
LEFT JOIN games1 ON kluch.id_games=games1.id_games
LEFT JOIN stores ON kluch.id_stores=stores.id_stores"); // запрос на выборку сведений о пользователях

 $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){// для каждой строки из запроса
					$id_kluch = $row['id_kluch'];
                    $kluch_date = $row['kluch_date'];
                    $kluch_date_end = $row['kluch_date_end'];
                    $games = $row['games'];
                    $stores = $row['stores'];
                    $kluch_cost = $row['kluch_cost'];
                    $kluch_name = $row['kluch_name'];
					
					$kluch_date = date('d-m-Y', strtotime($kluch_date));
                    $kluch_date_end = date('d-m-Y', strtotime($kluch_date_end));

					echo "<tr>";
                    echo "<td>$id_kluch</td><td>$kluch_date</td><td>$kluch_date_end</td><td>$games</td><td>$stores</td><td>$kluch_cost</td><td>$kluch_name</td>";
                
 echo "<td><a href='edit_kluch.php?id_kluch=" . $row['id_kluch']
. "'>Редактировать</a></td>"; //Запуск редактирования
 echo "<td><a href='delete_ kluch.php?id_kluch=" . $row['id_kluch']
. "'>Удалить</a></td>"; //запуск удаления
 echo "</tr>";
                    $counter++;
                }
            }
            print "</table>";
            print("<p>Всего игр: $counter </p>");
        ?>
<p> <a href="new_kluch.php"> Добавить ключ </a>
<p> <a href="index_2.php"> Вернуться назад </a>
</body> </html>
