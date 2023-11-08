<?php

session_start();

$dateOfBirthday = $_POST['dateOfBirthday'];

function dateOfBirthday($dateOfBirthday) {
    if (!isset($_SESSION['dateOfBirthday'])) {
        $_SESSION['dateOfBirthday'] = $dateOfBirthday;
        header("Location: /index.php");
        exit();
    } else {
        header("Location: /index.php");
        exit();
    }
}
dateOfBirthday($dateOfBirthday);