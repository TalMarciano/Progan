<?php
    session_start();
    require_once('init.php');
    global $user;
    global $session;
    $result = $user->getUserOrders();
    print_r($result);
    return $result;
?>