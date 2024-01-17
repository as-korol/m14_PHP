<?php
session_start();
?>

<html>

<head>
    <title>SPA - День рождения</title>
    <link rel="stylesheet" href='/styles/login.css'>
    <meta charset="utf-8">
</head>

<body>
    <div class="header">
    </div>
    <div class="container">
        <div class="login">
            <?php if (isset($_SESSION['login'])) : ?>
                <form class="form" action="/sripts/general.php" method="POST">
                <h3>День рождения!</h3>
                <p>Введите дату</p>
                <input type="date" name="dateOfBirthday">
                <button type="submit">Сохранить</button>
                </form>
            <?php else : ?>
                <form class="form" action="/sripts/general.php" method="POST">
                    <h3>Авторизация</h3>
                    <p>Логин</p>
                    <input type="text" name="login">
                    <p>Пароль</p>
                    <input type="password" name="password">             
                    <button type="submit" value="Отправить">Войти</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer">
        <p>©Ваша красота 2000-2023. Все права защищены</p>
    </div>

</html>