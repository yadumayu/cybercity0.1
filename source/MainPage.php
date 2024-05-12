<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: authenticate.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Добро пожаловать</title>
</head>
<body>
	<p>
		Здравствуйте <b><?php echo $_SESSION["username"]; ?></b>
	</p>
	<?php
		if ($_SESSION['status'] === 'admin') {
			?>
			<div>
				<a href="CreateUser.php">Созать пользователя для входа в систему</a>
			</div>
			<div>
				<a href="AdminGrade.php">Изменить оценки</a>  
			</div>	
			<div>
				<a href="AdminInfo.php">Посмотреть информацию об учащихся</a>  
			</div>	
			<?	
		}
	?>
	<?php
			if ($_SESSION['status'] === 'student') {
			?>
			<div>
				<a href="StudentGrade.php">Посмотреть оценки</a>
			</div>	
			<?	
		}
	?>
	<a href="logout.php">Выйти</a>
</body>
</html>