<!DOCTYPE html>
<html>
<head>
<title>Мои оценки</title>
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
	<?php
	require_once "config.php";

	$user = $_SESSION['username'];
	$sql = "SELECT algebra, russian_language, Biology, Chemistry, History
			FROM users  WHERE username = '$user'";
	if($result = $DataBase->query($sql)){
		echo "<table>
				<tr>
					<th>Алгебра &nbsp</th>
					<th>Русский язык &nbsp</th>
					<th>Биология &nbsp</th>
					<th>Химия &nbsp</th>
					<th>История &nbsp</th>
				</tr>";
		foreach($result as $row){
			echo "<tr>";
				echo "<td>" . $row["algebra"] . "</td>";
				echo "<td>" . $row["russian_language"] . "</td>";
				echo "<td>" . $row["Biology"] . "</td>";
				echo "<td>" . $row["Chemistry"] . "</td>";
				echo "<td>" . $row["History"] . "</td>";
			echo "</tr>";
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