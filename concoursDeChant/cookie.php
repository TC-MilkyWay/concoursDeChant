<?php 

$echomail = '';

if (isset($_COOKIE['mail']))
{
    session_start();
    $_SESSION['mail'] = $_COOKIE['mail'];
    $echomail = $_SESSION['mail'];

} ?>