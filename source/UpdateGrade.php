<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Замена</title>
</head>
<body>
	<?php
		if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])){
			$userid = mysqli_real_escape_string($DataBase, $_GET["id"]);

			$sql = "SELECT * FROM users WHERE id = '$userid'";
			if($result = mysqli_query($DataBase, $sql)){
				if(mysqli_num_rows($result) > 0){
					foreach($result as $row){
						$algebra = $row["algebra"];
						$russian_language = $row["russian_language"];
						$Biology = $row["Biology"];
						$Chemistry = $row["Chemistry"];
						$History = $row["History"];
					}
					echo "<h3>Обновления оценок</h3>
					<form method='post'>
						<input type='hidden' name='id' value='$userid' />
						<p>Алгебра: <input type='number' name='algebra' value='$algebra' /></p>
						<p>Русский язык: <input type='number' name='russian_language' value='$russian_language' /></p>
						<p>Биология: <input type='number' name='Biology' value='$Biology' /></p>
						<p>Химия: <input type='number' name='Chemistry' value='$Chemistry' /></p>
						<p>История: <input type='number' name='History' value='$History' /></p>
						<input type='submit' value='Сохранить'>
					</form>";
				}
			}
			else{
				echo "<div>Пользователь не найден</div>";
			}
			mysqli_free_result($result);
		} 

		elseif (isset($_POST["id"])) {
      
			$userid = mysqli_real_escape_string($DataBase, $_POST["id"]);
			$algebra = mysqli_real_escape_string($DataBase, $_POST["algebra"]);
			$russian_language = mysqli_real_escape_string($DataBase, $_POST["russian_language"]);
			$Biology = mysqli_real_escape_string($DataBase, $_POST["Biology"]);
			$Chemistry = mysqli_real_escape_string($DataBase, $_POST["Chemistry"]);
			$History = mysqli_real_escape_string($DataBase, $_POST["History"]);
			  
			$sql = "UPDATE users 
					SET algebra = '$algebra', 
						russian_language = '$russian_language', 
						Biology = '$Biology', 
						Chemistry = '$Chemistry', 
						History = '$History' 
					WHERE id = '$userid'";

			if($result = mysqli_query($DataBase, $sql)){
				header("Location: AdminGrade.php");
			}
		}
		else{
			echo "Некорректные данные";
		}
	?>
	<a href="../source/AdminGrade.php">Вернуться на главную</a>
</body>
</html>