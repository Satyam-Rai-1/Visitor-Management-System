<?php
session_start();

include('connectiondb.php');

if(!$_SESSION['username'])
{
    header('Location: login.php');
}

?>