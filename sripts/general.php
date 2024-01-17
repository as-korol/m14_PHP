<?php

session_start();

function dataCheck()
{
    global $login, $password, $users;
    $user = $users[$login];

    if (array_key_exists($login, $users)) {
        if ($user['password'] === sha1($password)) {
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function sessions()
{
    $checkLogin = dataCheck();

    if ($checkLogin === true) {
        if (!isset($_SESSION['login_time'])) {
            $_SESSION['login_time'] = time();
            $discount_expiry = $_SESSION['login_time'] + (24 * 60 * 60);
            $time_left = $discount_expiry - time();
            $time_left_formatted = gmdate("H:i:s", $time_left);
            $_SESSION['time_left_formatted'] = $time_left_formatted;
            header("Location: /index.php");
            exit();
        }
    } else {
        header("Location: /pages/birthdayAndAuth.php");
        exit();
    }
}



function getUsersList()
{ // Логины и пароли пользователей в sha1

    $users = [
        'a.korol' => ['password' => sha1(123123), 'birthday' => sha1('10.02.2005')],
        'r.markidonov' => ['password' => sha1(500239), 'birthday' => sha1('02.10.1988')],
        's.betskova' => ['password' => sha1(10291), 'birthday' => sha1('28.02.2001')],
        'v.vahrushev' => ['password' => sha1(98730), 'birthday' => sha1('15.02.1996')],
        'd.kolesov' => ['password' => sha1(402019), 'birthday' => sha1('07.02.1995')]
    ];

    return $users;
}

function dateOfBirthday()
{
    global $dateOfBirthday;
    if (!isset($_SESSION['dateOfBirthday'])) {
        $_SESSION['dateOfBirthday'] = $dateOfBirthday;
        header("Location: /index.php");
        exit();
    } else {
        header("Location: /index.php");
        exit();
    }
}

if (isset($_SESSION['login'])) {
    if(!isset($_SESSION['dateOfBirthday'])) {
        $dateOfBirthday = $_POST['dateOfBirthday'];
        dateOfBirthday();
    } else {
        header('Location: /index.php');
        exit();
    }
} else {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $users = getUsersList();
    sessions();
}
