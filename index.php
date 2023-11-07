<?php
session_start();
/* $discount_expiry = $_SESSION['login_time'] + (24 * 60 * 60);
$time_left = $discount_expiry - time();
$time_left_formatted = gmdate("H:i:s", $time_left); */
?>

<html>
    <head>
        <title>SPA - салон</title>
        <link rel="stylesheet" href="./styles/index.css"
        <meta charset="utf-8">
    </head>
    <body>
        <div class="header">
            <a href="./pages/login.php" class="enter">Войти</a>
            <a href="./sripts/exit.php" class="exit">Выйти</a>
            <p><?php echo isset($_SESSION['login']) ? 'Ваш логин: ' . $_SESSION['login'] : ''; ?></p>
        </div>
        <div class="container"> 
            <div class="block">
                <h2>Профессионализм и опыт наших специалистов</h2>
                <p><?php echo $time_left_formatted?></p>
            </div>
            <div class="block">
                <h2>Уютная и расслабляющая атмосфера</h2>
                <p>Мы создали специальную обстановку, чтобы вы могли полностью расслабиться и насладиться процедурами.</p>
            </div>
            <div class="block">
                <h2>Индивидуальный подход</h2>
                <p>Мы понимаем, что каждый клиент уникален, поэтому мы предлагаем индивидуальный подход к каждому.</p>
            </div>
        </div>
        <div class="footer">
            <p>©Ваша красота 2000-2023. Все права защищены</p>
        </div>
    </body>
</html>
