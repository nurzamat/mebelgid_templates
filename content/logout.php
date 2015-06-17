<?php
include_once 'header.php';

if (isset($_SESSION['user']))
{
    destroySession();
    header("Location: login.php");
    exit();
}
?>