<?php

$dateOfBirthday = $_POST['dateOfBirthday'];

function dateOfBirthday($dateOfBirthday) {
    if (!isset($_SESSION['dateOfBirthday'])) {
        session_start();
        $_SESSION['dateOfBirthday'] = $dateOfBirthday;
    } else {
        header("Location: /index.php");
        exit();
    }
}


