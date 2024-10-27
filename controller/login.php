<?php
//initiate session for access to variables
session_start();
//include enables access to functions
include '../model/functions.php';

//Check if login form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //Retrieve and then filter the login inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    //Pass through checkLogin function to validate against list of usernames and passwords
    if (checkLoginDB($username, $password))
    {
        //checkLogin returns true on match - so set loggedIn to true (used to check if ok to show video games)
        $_SESSION['loggedIn'] = true;
        //redirect back to index now that user is logged in
        header("Location: ../index.php");
        //stop any further code
        exit;
    } else {
        //If checkLogin returns false, login failed, redirect back to login form with query string for errormessage
        header("Location: ../view/login_form.php?error=invalid");
    }
}