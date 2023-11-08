<?php

function getUsersList() {
    
    $users = [
        'a.korol' => ['password' => sha1(00123), 'birthday' => sha1('10.02.2005')],
        'r.markidonov' => ['password' => sha1(500239), 'birthday' => sha1('02.10.1988')], 
        's.betskova' => ['password' => sha1(10291), 'birthday' => sha1('28.02.2001')], 
        'v.vahrushev' => ['password' => sha1(98730), 'birthday' => sha1('15.02.1996')], 
        'd.kolesov' => ['password' => sha1(402019), 'birthday' => sha1('07.02.1995')]      
    ];

    return $users;
}