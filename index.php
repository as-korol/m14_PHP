<?php
session_start();
if (isset($_SESSION['login_time'])) {
    $discount_expiry = $_SESSION['login_time'] + (24 * 60 * 60);
    $time_left = $discount_expiry - time();
    $_SESSION['time_left_formatted'] = gmdate("H:i:s", $time_left);
}
if (!isset($_SESSION['dateOfBirthday'])) {
    header("Location: /birthday.php");
    exit();
} else {
    $today = strtotime('today');
    $nextBirthday = strtotime(date('Y-m-d', strtotime('+' . (date('Y', $today) - date('Y', $dateOfBirthday)) . ' years', $dateOfBirthday)));
    $daysUntilBirthday = ($nextBirthday - $today) / (60*60*24);
}

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
            <p><?= isset($_SESSION['login']) ? 'Ваш логин: ' . $_SESSION['login'] : ''; ?></p>
        </div>
        <div class="container"> 
            <div class="block">
                <h2><?= isset($_SESSION['login']) ? 'Релакс-день' : 'Профессионализм и опыт наших специалистов'?></h2>
                <p><?= (isset($_SESSION['auth']) && isset($_SESSION['time_left_formatted'])) ? 'Скидка истекает через : <strong>' . $_SESSION['time_left_formatted'] . '</strong>'  : 'Мы понимаем, что каждый клиент уникален, поэтому мы предлагаем индивидуальный подход к каждому.' ?></p>
                <p><?= isset($_SESSION['auth']) && isset($_SESSION['time_left_formatted']) ? 'Полный день релаксации в вашем SPA салоне!' : '' ?></p>
                <p><?= isset($_SESSION['auth']) && isset($_SESSION['time_left_formatted']) ? '<strong>3500р</strong> вместо <s>5000р</s>' : '' ?></p>
            </div>
            <div class="block">
                <h2><?= isset($_SESSION['login']) ? 'Двойное удовольствие' : 'Уютная и расслабляющая атмосфера'?></h2>
                <p><?= isset($_SESSION['auth']) && isset($_SESSION['time_left_formatted']) ? 'Скидка истекает через : <strong> ' . $_SESSION['time_left_formatted'] . '</strong>'  : 'Мы создали специальную обстановку, чтобы вы могли полностью расслабиться и насладиться процедурами.' ?>; </p>
                <p><?= isset($_SESSION['auth']) && isset($_SESSION['time_left_formatted']) ? 'При бронировании массажа можно получить вторую услугу, такую как педикюр или чистка лица, бесплатно' : '' ?></p>
                <p><?= isset($_SESSION['auth']) && isset($_SESSION['time_left_formatted']) ? '<strong>0р</strong> вместо <s>6000р</s>' : '' ?></p>
            </div>
            <div class="block">
                <h2><?= isset($_SESSION['login']) ? 'Специальные тарифы на время' : 'Профессионализм и опыт наших специалистов'?></h2>
                <p><?= isset($_SESSION['auth']) && isset($_SESSION['time_left_formatted']) ? 'Скидка истекает через :  <strong> ' . $_SESSION['time_left_formatted'] . '</strong>' : 'Мы понимаем, что каждый клиент уникален, поэтому мы предлагаем индивидуальный подход к каждому.' ?>; </p>
                <p><?= isset($_SESSION['auth']) && isset($_SESSION['time_left_formatted']) ? 'На период, <strong>с 12:00 до 15:00</strong>, ТОЛЬКО СЕГОДНЯ!' : '' ?></p>
                <p><?= isset($_SESSION['auth']) && isset($_SESSION['time_left_formatted']) ? '<strong>1000р за 60 минут</strong> вместо <s>3000р</s> за 60 минут' : '' ?></p>
            </div>
        </div>
        <div class="footer">
            <p>©Ваша красота 2000-2023. Все права защищены</p>
        </div>
    </body>
</html>
