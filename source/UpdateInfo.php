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
						$username = $row["username"];
						$status = $row["status"];
						$surname = $row["surname"];
						$firstname = $row["firstname"];
						$patronymic = $row["patronymic"];
						$dob = $row["dob"];
					}
					echo "<h3>Обновление пользователя</h3>
					<form method='post'>
						<input type='hidden' name='id' value='$userid' />
						<p>Логин: <input type='text' name='username' value='$username' /></p>
						<p>Статус: <input type='text' name='status' value='$status' /></p>
						<p>Фамилия: <input type='text' name='surname' value='$surname' /></p>
						<p>Имя: <input type='text' name='firstname' value='$firstname' /></p>
						<p>Отчество: <input type='text' name='patronymic' value='$patronymic' /></p>
						<p>Дата рождения: <input type='date' name='dob' value='$dob' /></p>
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
			$username = mysqli_real_escape_string($DataBase, $_POST["username"]);
			$status = mysqli_real_escape_string($DataBase, $_POST["status"]);
			$surname = mysqli_real_escape_string($DataBase, $_POST["surname"]);
			$firstname = mysqli_real_escape_string($DataBase, $_POST["firstname"]);
			$patronymic = mysqli_real_escape_string($DataBase, $_POST["patronymic"]);
			$dob = mysqli_real_escape_string($DataBase, $_POST["dob"]);
			  
			$sql = "UPDATE users 
					SET username = '$username', 
						status = '$status', 
						surname = '$surname', 
						firstname = '$firstname', 
						patronymic = '$patronymic',
						dob = '$dob'
					WHERE id = '$userid'";

			if($result = mysqli_query($DataBase, $sql)){
				header("Location: AdminInfo.php");
			} else{
				echo "Ошибка: " . mysqli_error($DataBase);
			}
		}
		else{
			echo "Некорректные данные";
		}
	?>
	<a href="../source/AdminInfo.php">Вернуться на главную</a>
</body>
</html>