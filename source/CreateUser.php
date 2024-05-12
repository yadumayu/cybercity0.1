<?php
require_once "config.php";
if (isset($_POST["username"]) && isset($_POST["password"])){
	$username = mysqli_real_escape_string($DataBase, trim($_POST["username"]));
	$password = mysqli_real_escape_string($DataBase, password_hash(trim($_POST["password"]), PASSWORD_DEFAULT));
	$surname = mysqli_real_escape_string($DataBase, trim($_POST["surname"]));
	$firstname = mysqli_real_escape_string($DataBase, trim($_POST["firstname"]));
	$patronymic = mysqli_real_escape_string($DataBase, trim($_POST["patronymic"]));
	$dob = mysqli_real_escape_string($DataBase, trim($_POST["dob"]));
	
	$sql = "INSERT INTO Users (username, password, status, surname, firstname,patronymic, dob) VALUES ('$username', '$password', 'student' ,'$surname', '$firstname', '$patronymic', '$dob')";
	if(mysqli_query($DataBase, $sql)){
        echo "<h3 style='background-color: green'>Данные успешно добавлены</h3>";
    } else{
        echo "Ошибка: " . mysqli_error($DataBase);
    }
    mysqli_close($DataBase);
}

include '../templates/TemplatesCreateUser.php'

?>