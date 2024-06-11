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
	<link rel="stylesheet" href="main.css">
	<title>Добро пожаловать</title>
</head>
<body>
	<?php
		if ($_SESSION['status'] === 'admin') {
			?>
			<div class="container">
				<div class="left">
					<h1>CyberSity</h1>
					<div class="switch-wrapper">
						<p class="switch-label">day/night</p>
						<label class="switch">
							<input type="checkbox" id="themeToggle">
							<span class="slider round"></span>
						</label>
					</div>
				</div>
				<div class="right">
					<div class="content" style="max-width: 600px;">
						<h1>Hello <b><?php echo $_SESSION["username"]; ?></b></h1>
						<div style="display: flex; align-items: center; justify-content: space-between;">
							<h2>Create a user to log in</h2>
							<a href="CreateUser.php">Create</a>
						</div>
						<div style="display: flex; align-items: center; justify-content: space-between;">
							<h2>Change grades</h2>
							<a href="AdminGrade.php">Change</a>
						</div>
						<div style="display: flex; align-items: center; justify-content: space-between;">
							<h2>View student information</h2>
							<a href="AdminInfo.php">View</a>
						</div>
						<div class="logout"><a href="logout.php">Log out</a></div>
					</div>
				</div>
			</div>
			<?	
		}
	?>
	<?php
			if ($_SESSION['status'] === 'student') {
			?>
			<div class="container">
				<div class="left">
					<h1>CyberSity</h1>
					<div class="switch-wrapper">
						<p class="switch-label">day/night</p>
						<label class="switch">
							<input type="checkbox" id="themeToggle">
							<span class="slider round"></span>
						</label>
					</div>
				</div>
				<div class="right">
					<div class="content" style="max-width: 600px;">
						<h1>Hello <b><?php echo $_SESSION["username"]; ?></b></h1>
						<div style="display: flex; align-items: center; justify-content: space-between;">
							<h2>You can find information about your grades here.</h2>
							<a href="StudentGrade.php" style="display: inline-flex; align-items: center; padding: 5px 10px; margin-left: 10px; text-decoration: none; background-color: #6E44FF; color: #FFF; border-radius: 5px;">Find out!</a>
						</div>
						<div class="logout"><a href="logout.php">Log out</a></div>
					</div>
				</div>
			</div>
			<?	
		}
	?>
	<script src="main.js"></script>
</body>
</html>