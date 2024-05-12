<!DOCTYPE html>
<html>
<head>
<title>Информация</title>
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
	<h3>Все пользователи</h3>
	<form method="post" action="AdminInfo.php" id="searchform" >
        <p>Поиск: <input type="text" name="search" id=""> <input type="submit" value="Поиск"></p>
        <hr>
    </form>
	<?php
	require_once "config.php";

	$sort_list = array(
		'id_asc'   => '`id`',
		'id_desc'  => '`id` DESC',
		'username_asc'  => '`username`',
		'username_desc' => '`username` DESC',
		'status_asc'   => '`status`',
		'status_desc'  => '`status` DESC',
		'surname_asc'   => '`surname`',
		'surname_desc'  => '`surname` DESC',
		'firstname_asc'   => '`firstname`',
		'firstname_desc'  => '`firstname` DESC',
		'patronymic_asc'  => '`patronymic`',
		'patronymic_desc' => '`patronymic` DESC', 
		'dob_asc'   => '`dob`',
		'dob_desc'  => '`dob` DESC',  
	);

	/* Проверка GET-переменной */
	$sort = @$_GET['sort'];
	if (array_key_exists($sort, $sort_list)) {
		$sort_sql = $sort_list[$sort];
	} else {
		$sort_sql = reset($sort_list);
	}
	/* Функция вывода ссылок */
	function sort_link_th($title, $a, $b) {
		$sort = @$_GET['sort'];
	
		if ($sort == $a) {
			return '<a class="active" href="?sort=' . $b . '">' . $title . ' <i>▲</i></a>';
		} elseif ($sort == $b) {
			return '<a class="active" href="?sort=' . $a . '">' . $title . ' <i>▼</i></a>';  
		} else {
			return '<a href="?sort=' . $a . '">' . $title . '</a>';  
		}
	}

	if($_SERVER["REQUEST_METHOD"] === "POST"){
		$name=mysqli_real_escape_string($DataBase ,$_POST['search']) ; 
		$sql = "SELECT *
				FROM users 
				WHERE id LIKE N'%$name%'
				OR username LIKE N'%$name%' 
				OR status LIKE N'%$name%' 
				OR surname LIKE N'%$name%' 
				OR firstname LIKE N'%$name%' 
				OR patronymic LIKE N'%$name%' 
				OR DATE_FORMAT(dob, '%Y-%m-%d') LIKE N'%$name%'
				ORDER BY {$sort_sql}";
	} 
	else{ 
		$sql = "SELECT *
		FROM users ORDER BY {$sort_sql}";
	} 


	if($result = $DataBase->query($sql)){?>
			<table>
				<tr>
					<th><?php echo sort_link_th('id', 'id_asc', 'id_desc'); ?></th>
					<th><?php echo sort_link_th('Логин', 'username_asc', 'username_desc'); ?></th>
					<th><?php echo sort_link_th('Статус', 'status_asc', 'status_desc'); ?></th>
					<th><?php echo sort_link_th('Фамилия', 'surname_asc', 'surname_desc'); ?></th>
					<th><?php echo sort_link_th('Имя', 'firstname_asc', 'firstname_desc'); ?></th>
					<th><?php echo sort_link_th('Отчество', 'patronymic_asc', 'patronymic_desc'); ?></th>
					<th><?php echo sort_link_th('Дата рождения', 'dob_asc', 'dob_desc'); ?></th>
				</tr>
		<?php
		foreach($result as $row){
			if ($row["status"] != 'admin'){
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["username"] . "</td>";
				echo "<td>" . $row["status"] . "</td>";
				echo "<td>" . $row["surname"] . "</td>";
				echo "<td>" . $row["firstname"] . "</td>";
				echo "<td>" . $row["patronymic"] . "</td>";
				echo "<td>" . $row["dob"] . "</td>";
				echo "<td><a href='UpdateInfo.php?id=" . $row["id"] . "'>Изменить</a></td>";
				echo "<td>
						<form action='DeleteUser.php' method='post'>
							<input type='hidden' name='id' value='" . $row["id"] . "' />
							<input type='submit' value='Удалить'>
						</form>
					</td>";
				echo "</tr>";
			}
			
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