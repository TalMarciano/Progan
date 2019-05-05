<?php
    session_start();
    require_once('init.php');
    global $user;
    global $session;
    $city = $_POST['value'];
    $result = $user->getProductPerCity($city);
    print_r($result);
    return $result;
?>