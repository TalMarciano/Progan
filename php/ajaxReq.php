<?php
    session_start();
    require_once('init.php');
    global $user;
    global $session;
    $result = $user->getUserDetails();
    print_r($result);
    //$result = json_encode($result);
    return $result;
?>