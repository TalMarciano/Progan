<?php
    session_start();
    require_once('init.php');
    global $user;
    global $session;
    $result = $user->getUserPerCity();
    print_r($result);
    return $result;
?>