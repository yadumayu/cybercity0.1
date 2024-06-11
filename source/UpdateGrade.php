<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="main.css">
</head>
<body>
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
				<div class="content">
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
									echo "<h3>Rating updates</h3>
									<form method='post'>
										<input type='hidden' name='id' value='$userid' />
										<p>Algebra: <input type='number' name='algebra' value='$algebra' /></p>
										<p>Russian: <input type='number' name='russian_language' value='$russian_language' /></p>
										<p>Biology: <input type='number' name='Biology' value='$Biology' /></p>
										<p>Chemistry: <input type='number' name='Chemistry' value='$Chemistry' /></p>
										<p>History: <input type='number' name='History' value='$History' /></p>
										<input type='submit' value='Save'>
									</form>";
								}
							}
							else{
								echo "<div>The user was not found</div>";
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
							echo "Incorrect data";
						}
					?>
					<a href="../source/MainPage.php">Go back</a>
				</div>
			</div>
		</div>
	<script src="main.js"></script>
</body>
</html>