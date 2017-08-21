<?php

    include_once 'psl-config.php';
    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    /*$error_msg = "";
 
    if (isset($_POST['Email'], $_POST['Message'])) {
        // Sanitize and validate the data passed in
        $Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
        $Email = filter_var($Email, FILTER_VALIDATE_EMAIL);
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            // Not a valid email
            $error_msg .= '<p class="error">The email address you entered is not valid</p>';
        }
    }*/    
    $u_Email   = $conn->real_escape_string($_POST['Email']);
    $u_Phonenumber   = $conn->real_escape_string($_POST['Phonenumber']);
    $u_Message = $conn->real_escape_string($_POST['Message']);
    $query   = "INSERT into contactmsg(Email,Phonenumber,Message) VALUES('" . $u_Email . "','" . $u_Phonenumber . "','" . $u_Message . "')";
    $success = $conn->query($query);

    if (!$success) {
            die("Couldn't enter data: ".$conn->error);

    }

    //echo "Thank You For Contacting Us <br>";
    header('Location: ../thanksmsg.php');
    $conn->close();

?>
