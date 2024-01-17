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
        header("Location: /pages/birthdayAndAuth.php");
        exit();
    } else {
        $dateOfBirthday = strtotime($_SESSION['dateOfBirthday']);
        $today = strtotime('today');
        $nextBirthdayYear = date('Y', $today);
        $nextBirthday = strtotime(date('Y-m-d', $dateOfBirthday) . ' +' . $nextBirthdayYear - date('Y', $dateOfBirthday) . ' years');
        if ($nextBirthday < $today) {
            $nextBirthday = strtotime(date('Y-m-d', $nextBirthday) . ' +1 year');
        }
        $daysUntilBirthday = ($nextBirthday - $today) / (60 * 60 * 24);
    }
}

?>

<html>

<head>
    <title>SPA - салон</title>
    <link rel="stylesheet" href="./styles/index.css" <meta charset="utf-8">
</head>

<body>
    <div class="header">
        <?php if (!isset($_SESSION['login'])) : ?>
            <a href="./pages/birthdayAndAuth.php" class="enter">Войти</a>
            <?php else : ?>
            <a href="./sripts/exit.php" class="exit">Выйти</a>
            <p>Ваш логин: <?= $_SESSION['login'] ?></p>
            <p><?= $dateOfBirthday === $today ? 'У вас сегодня день рождение, поздравляем! Для вас подготовлена доп. акция.' : '' ?></p>
            <p><?= $dateOfBirthday !== $today ? 'Ваше следующее день рождение через <strong> ' . $daysUntilBirthday . '</strong> дня, заходите мы сделаем подарок для вас!' : '' ?></p>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="block">
            <?php if (isset($_SESSION['login'])) : ?>
                <h2>Релакс-день</h2>
                <p>Скидка истекает через: <strong><?= $_SESSION['time_left_formatted'] ?></strong></p>
                <p>Полный день релаксации в вашем SPA салоне!</p>
                <img src="./images/image.jpg" />
                <p><strong><?= ($one - 50) ?></strong> вместо <s><?= $one ?></s></p>
            <?php else : ?>
                <h2>Профессионализм и опыт наших специалистов</h2>
                <p>Мы понимаем, что каждый клиент уникален, поэтому мы предлагаем индивидуальный подход к каждому.</p>
            <?php endif; ?>
        </div>
        <div class="block">
            <?php if (isset($_SESSION['login'])) : ?>
                <h2>Двойное удовольствие</h2>
                <p>Скидка истекает через: <strong><?= $_SESSION['time_left_formatted'] ?></strong></p>
                <p>При бронировании массажа можно получить вторую услугу, такую как педикюр или чистка лица, бесплатно</p>
                <img src="./images/image1.jpg" />
                <p><strong><?= ($two - 200) ?></strong> вместо <s><?= $two ?></s></p>
            <?php else : ?>
                <h2>Уютная и расслабляющая атмосфера</h2>
                <p>Мы создали специальную обстановку, чтобы вы могли полностью расслабиться и насладиться процедурами.</p>
            <?php endif; ?>
        </div>
        <div class="block">
            <?php if (isset($_SESSION['login'])) : ?>
                <h2>Специальные тарифы на время</h2>
                <p>Скидка истекает через: <strong><?= $_SESSION['time_left_formatted'] ?></strong></p>
                <p><?= $dateOfBirthday !== $today ? 'На период, <strong>с 12:00 до 15:00</strong>, ТОЛЬКО СЕГОДНЯ! <strong>' . ($three - 100) . '</strong> вместо <s>' . $three . '</s>' : '' ?></p>
                <img src="./images/image2.jpg" />
                <p><?= $dateOfBirthday === $today ? 'Дополнительная скидка 5% в честь дня рождения! <strong>' . ($three - 100) * 0.95 . 'р</strong> вместо <s>' . $three .  '</s> за 60 минут' : '' ?></p>
            <?php else : ?>
                <h2>Профессионализм и опыт наших специалистов</h2>
                <p>Мы понимаем, что каждый клиент уникален, поэтому мы предлагаем индивидуальный подход к каждому.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer">
        <p>©Ваша красота 2000-2023. Все права защищены</p>
    </div>
</body>

</html>