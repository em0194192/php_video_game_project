<?php
session_start();
include '../model/functions.php';

//If form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //Retrieve and then filter the login inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (checkLogin($username, $password))
    {
        $_SESSION['loggedIn'] = true;
        header("Location: ../index.php");
        exit;
    } else {
        header("Location: ../view/login_form.php?error=invalid");

    }
}