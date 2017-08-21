<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
//sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['username'], $_POST['p'])) {
    $username = $_POST['username'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($username, $password, $mysqli) == true) {
        // Login success 
		//$_SESSION['username']=$username;
		sec_session_start();
        header('Location: ../indexforuser.php');
    } else {
        // Login failed 
        header('Location: ../error.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}
