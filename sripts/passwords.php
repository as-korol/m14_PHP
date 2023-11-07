<?php

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