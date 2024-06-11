<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="main.css">
    
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="content">
			<div class="switch-wrapper">
                <p class="switch-label">day/night</p>
                <label class="switch">
                    <input type="checkbox" id="themeToggle">
                    <span class="slider round"></span>
                </label>
            </div>
                <h1>CyberSity</h1>
                <p>
                    Welcome to our school's online diary! Here, every student and parent can find all the essential information about current grades, class schedules, upcoming events, and much more. We strive to make the educational process transparent and convenient for everyone involved. Use our tools to stay informed about all school news and achieve success in your studies. Begin your journey to new knowledge with us!
                </p>
            </div>
        </div>
        <div class="right">
            <div class="content">
                <h2>Welcome back</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="username" id="username" placeholder="Username" required>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="submit" value="Sign in">
                </form>
            </div>
        </div>
    </div>

    <?php if ($message): ?>
        <div class="notification <?php echo $message_type; ?>" id="notification"><?php echo $message; ?></div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var notification = document.getElementById("notification");
                notification.style.bottom = "20px";
                setTimeout(function() {
                    notification.style.bottom = "-50px";
                }, 5000);
            });
        </script>
    <?php endif; ?>
</body>
<script src="main.js"></script>
</html>

