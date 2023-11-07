<?php 

require './passwords.php';
$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

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
            header("Location: /index.php");
            exit();
        } else {
            return false;
        }
    } else {
        return false;
    }

}

function getCurrentUser() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        return $_SESSION['login'];
    } else {
        return null;
    };
}

function checkAuth ($login, $password) {
    if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
        header('Location: /index.php');
        exit();
    } else {
        checkPassword($login, $password);
    }

}

checkAuth ($login, $password);