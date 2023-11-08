<?php

function getUsersList() {
    
    $users = [
        'user0' => ['id' => 1, 'password' => sha1(123), 'birthday' => sha1('10.02.2005')],
        'user1' => ['id' => 2, 'password' => sha1(123), 'birthday' => sha1('02.10.1988')], 
        'user2' => ['id' => 3, 'password' => sha1(123), 'birthday' => sha1('28.02.2001')], 
        'user3' => ['id' => 4, 'password' => sha1(123), 'birthday' => sha1('15.02.1996')], 
        'user4' => ['id' => 5, 'password' => sha1(123), 'birthday' => sha1('07.02.1995')]      
    ];

    return $users;
}