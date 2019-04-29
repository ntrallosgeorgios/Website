<?php

    // reference logout.php lecture 9 session demo
    session_start();

    $_SESSION = array();

    session_destroy(); // destroy the session
    header("location:login.php"); // redirect to login page

?>