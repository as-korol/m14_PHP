<?php 

$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

function getUsersList() {
    $users = [
        'user0' => ['password' => sha1(123), 'birthday' => sha1('10.02.2005')],
        'user1' => ['password' => sha1(312), 'birthday' => sha1('02.10.1988')], 
        'user2' => ['password' => sha1(213), 'birthday' => sha1('28.02.2001')], 
        'user3' => ['password' => sha1(321), 'birthday' => sha1('15.02.1996')], 
        'user4' => ['password' => sha1(132), 'birthday' => sha1('07.02.1995')]      
    ];

    return $users;
}

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
        } else {
            return false;
        }
    } else {
        return false;
    }

}

echo  checkPassword($login, $password);