<?php

session_start();

if (isset($_SESSION['auth'])) {

    $one = 3500; // Прайс на услуги. Релакс-день
    $two = 6000; // Прайс на услуги. Двойное удовольствие. Релакс-день
    $three = 1000; // Прайс на услуги. Специальные тарифы на время

    if (isset($_SESSION['login_time'])) {
        $discount_expiry = $_SESSION['login_time'] + (24 * 60 * 60);
        $time_left = $discount_expiry - time();
        $_SESSION['time_left_formatted'] = gmdate("H:i:s", $time_left);
    }
    if (!isset($_SESSION['dateOfBirthday']) && isset($_SESSION['login'])) {
        header("Location: /pages/birthday.php");
        exit();
    } else {
        $dateOfBirthday = strtotime($_SESSION['dateOfBirthday']);
        $today = strtotime('today');
        $nextBirthday = strtotime('+' . (date('Y', $today) - date('Y', $dateOfBirthday)) . ' years', $dateOfBirthday);
        $daysUntilBirthday = ($nextBirthday - $today) / (60*60*24);
    }
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
            <?= !isset($_SESSION['login']) ?'<a href="./pages/login.php" class="enter">Войти</a>' : '' ?>  
            <?= isset($_SESSION['login']) ? '<a href="./sripts/exit.php" class="exit">Выйти</a>' : '' ?>
            <p><?= isset($_SESSION['login']) ? 'Ваш логин: ' . $_SESSION['login'] : ''; ?></p>
            <p><?= isset($_SESSION['login']) ? '|До вашего дня рождения осталось ' . $daysUntilBirthday . '|' : '' ?></p>
            <p><?= isset($_SESSION['login']) ? '|Ваше следующее день рождение через ' . $daysUntilBirthday . '|' : '' ?></p>
        </div>
        <div class="container"> 
            <div class="block">
                <h2><?= isset($_SESSION['login']) ? 'Релакс-день' : 'Профессионализм и опыт наших специалистов'?></h2>
                <p><?= isset($_SESSION['login']) ? 'Скидка истекает через : <strong>' . $_SESSION['time_left_formatted'] . '</strong>'  : 'Мы понимаем, что каждый клиент уникален, поэтому мы предлагаем индивидуальный подход к каждому.' ?></p>
                <p><?= isset($_SESSION['login'])  ? 'Полный день релаксации в вашем SPA салоне!' : '' ?></p>
                <p><?= isset($_SESSION['login']) ? '<strong>' . ($one - 50) . '</strong> вместо <s>'. ($one) .'</s>' : '' ?></p>
        
            </div>
            <div class="block">
                <h2><?= isset($_SESSION['login']) ? 'Двойное удовольствие' : 'Уютная и расслабляющая атмосфера'?></h2>
                <p><?= isset($_SESSION['login']) ? 'Скидка истекает через : <strong> ' . $_SESSION['time_left_formatted'] . '</strong>'  : 'Мы создали специальную обстановку, чтобы вы могли полностью расслабиться и насладиться процедурами.' ?></p>
                <p><?= isset($_SESSION['login']) ? 'При бронировании массажа можно получить вторую услугу, такую как педикюр или чистка лица, бесплатно' : '' ?></p>
                <p><?= isset($_SESSION['login']) ? '<strong>' . ($two - 200) . '</strong> вместо <s>' . ($two) . '</s>' : '' ?></p>
            </div>
            <div class="block">
                <h2><?= isset($_SESSION['login']) ? 'Специальные тарифы на время' : 'Профессионализм и опыт наших специалистов'?></h2>
                <p><?= isset($_SESSION['login'])  ? 'Скидка истекает через :  <strong> ' . $_SESSION['time_left_formatted'] . '</strong>' : 'Мы понимаем, что каждый клиент уникален, поэтому мы предлагаем индивидуальный подход к каждому.' ?></p>
                <p><?= isset($_SESSION['login'])  ? 'На период, <strong>с 12:00 до 15:00</strong>, ТОЛЬКО СЕГОДНЯ!' : '' ?></p>
                <p><?= isset($_SESSION['login']) && $dateOfBirthday === $today ? 'Дополнительная скидка 5% в честь дня рождения! <strong>' . ($three - 10) * 0.95 . 'р</strong> вместо <s>' . $three .  '</s> за 60 минут' : '' ?></p>
            </div>
        </div>
        <div class="footer">
            <p>©Ваша красота 2000-2023. Все права защищены</p>
        </div>
    </body>
</html>
