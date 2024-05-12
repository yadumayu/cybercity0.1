<!DOCTYPE html>
<html>
<head>
<title>Оценки</title>
<meta charset="utf-8" />
</head>
<style type="text/css">
   TABLE {
    width: 300px;
    border-collapse: collapse;
   }
   TD, TH {
    padding: 3px;
    border: 1px solid black;
   }
   TH {
    background: #b0e0e6;
   }
  </style>
<body>
	<h3>Оценки</h3>
	<?php
	require_once "config.php";

	$sql = "SELECT *
			FROM users";
	if($result = $DataBase->query($sql)){
		echo "<table>
				<tr>
					<th>Логин &nbsp</th>
					<th>Алгебра &nbsp</th>
					<th>Русский язык &nbsp</th>
					<th>Биология &nbsp</th>
					<th>Химия &nbsp</th>
					<th>История &nbsp</th>
				</tr>";
		foreach($result as $row){
			if ($row["status"] != 'admin'){
				echo "<tr>";
					echo "<td>" . $row["username"] . "</td>";
					echo "<td>" . $row["algebra"] . "</td>";
					echo "<td>" . $row["russian_language"] . "</td>";
					echo "<td>" . $row["Biology"] . "</td>";
					echo "<td>" . $row["Chemistry"] . "</td>";
					echo "<td>" . $row["History"] . "</td>";
					echo "<td><a href='UpdateGrade.php?id=" . $row["id"] . "'>Изменить</a></td>";
				echo "</tr>";
			}
			
		}
		echo "</table>";
		$result->free();
	} else{
		echo "Ошибка: " . $DataBase->error;
	}
	$DataBase->close();
	?>
	<a href="../source/MainPage.php">Вернуться на главную</a>
</body>
</html>