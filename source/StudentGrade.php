<!DOCTYPE html>
<html>
<head>
    <title>Мои оценки</title>
    <meta charset="utf-8" />
    
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
                <h2>This is your grades</h2>
                <?php
                session_start();
                require_once "config.php";

                if(isset($_SESSION['username'])){
                    $user = $_SESSION['username'];
                    $sql = "SELECT algebra, russian_language, Biology, Chemistry, History FROM users WHERE username = ?";
                    if ($stmt = $DataBase->prepare($sql)) {
                        $stmt->bind_param("s", $user);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo "<table>
                                    <tr>
                                        <th>Math</th>
                                        <th>Russian</th>
                                        <th>Biology</th>
                                        <th>Chemistry</th>
                                        <th>History</th>
                                    </tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["algebra"] . "</td>";
                                echo "<td>" . $row["russian_language"] . "</td>";
                                echo "<td>" . $row["Biology"] . "</td>";
                                echo "<td>" . $row["Chemistry"] . "</td>";
                                echo "<td>" . $row["History"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<p>No grades found for this user.</p>";
                        }
                        $stmt->close();
                    } else {
                        echo "Ошибка: " . $DataBase->error;
                    }
                    $DataBase->close();
                } else {
                    echo "<p>Пожалуйста, войдите в систему, чтобы посмотреть ваши оценки.</p>";
                }
                ?>
                <a href="../source/MainPage.php">Go back</a>
            </div>
        </div>
    </div>
	<script src="main.js"></script>
</body>
</html>
