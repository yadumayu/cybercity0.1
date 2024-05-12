<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Добавить пользователя</title>
</head>
<body>
	<h3>Добавление пользователя</h3>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<h3>Данные для входа</h3>
		<p>
			Логин:<input type="text" name="username" required/>
			&nbsp
			Пароль:<input type="password" name="password" required/>
		</p>
		<hr>
		<h3>Личные данные</h3>
		<p>
			Фамилия:<input type="text" name="surname" />
		</p>
		<p>
			Имя:<input type="text" name="firstname" />
		</p>
		<p>
			Отчесво:<input type="text" name="patronymic" placeholder="Если есть"/>
		</p>
		<p>
			Дата рождения:<input type="date" name="dob" value="2023-04-12" />
		</p>
		<input type="submit" value="Добавить">
	</form>
	<hr>
	<a href="../source/MainPage.php">Вернуться на главную</a>
</body>
</html>