<?php 

require './passwords.php';
$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;
$dateOfBirthday = $_POST['dateOfBirthday'] ?? null;

function existsUser($login) {

    $users = getUsersList();

    if (null !== $login) {
        if(array_key_exists($login, $users)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function checkPassword($login, $password) {
    $checkLogin = existsUser($login);
    
    if ($checkLogin === true && $password !== null) {
        $users = getUsersList();
        $user = $users[$login];
        if ($user['password'] === sha1($password)){
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
            if (!isset($_SESSION['login_time'])) {
                $_SESSION['login_time'] = time();
                $discount_expiry = $_SESSION['login_time'] + (24 * 60 * 60);
                $time_left = $discount_expiry - time();
                $time_left_formatted = gmdate("H:i:s", $time_left);
                $_SESSION['time_left_formatted'] = $time_left_formatted;
            }
            header("Location: /index.php");
            exit();
        } else {
            return false;
        }
    } else {
        header("Location: /pages/login.php");
        exit();
    }
}

function getCurrentUser() { // Вернуть текущий логин в сессии
    if (session_status() === PHP_SESSION_ACTIVE) {
        return $_SESSION['login'];
    } else {
        return null;
    };
}

function checkAuth ($login, $password) { // Проверка наличия авторизированной сессии
    if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
        header('Location: /index.php');
        exit();
    } else {
        checkPassword($login, $password);
    }

}

checkAuth ($login, $password);

 
