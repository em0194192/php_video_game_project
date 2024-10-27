<?php
//initiate session for access to variables
session_start();
//include enables access to functions
include '../model/functions.php';

//check if "form" (logout button) is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) 
{
    //Set loggedIn to false
    $_SESSION['loggedIn'] = false;
    //redirect back to index page 
    header("Location: ../index.php");
    //halt any further execution on page
    exit();
}