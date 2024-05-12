<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
	</head>
	<body>
		<div>
			<h1>Логин</h1>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<input type="text" name="username" placeholder="Логин" id="username" required>
				<input type="password" name="password" placeholder="Пароль" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>