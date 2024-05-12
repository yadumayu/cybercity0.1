<?php
session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	header("location: MainPage.php");
	exit;
}

require_once "config.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){
	if ($stmt = $DataBase->prepare('SELECT id, password, status 
									FROM users WHERE username = ?')) {
		$stmt->bind_param('s', $_POST['username']);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows != 0){
			$stmt->bind_result($id, $password, $status);
			$stmt->fetch();
			if(password_verify($_POST['password'], $password)){
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['id'] = $id;
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['status'] = $status;
				header("location: MainPage.php");
			} else {
				echo '<h3 style="background-color: red">Неверный пароль</h3>';
			}
		} else {
			echo '<h3 style="background-color: red">Такого пользователя не сущесвует</h3>';
		}
		$stmt->close();
	}
}

include('../templates/login.php');

?>