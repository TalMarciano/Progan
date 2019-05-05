<?php
    session_start();
    require_once('init.php');
    global $session;
    $session->logout();
?>