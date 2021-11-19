<?php 

    session_start();
    session_unset($_SESSION['login']);
    session_unset($_SESSION['role']);
    session_unset($_SESSION['email']);
    session_destroy();
    header('Location: home.php');
?>