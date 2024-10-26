<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            height: 100vh; /* Full height */
            margin: 0; /* Remove default margin */
            background: linear-gradient(to top right, lightblue, #d5a6e6); /* background gradient tl to tr blue to purple */
        }
        .content {
            background-color: white; /* Set a background color for the div */
            padding: 20px; /* Add some padding */
            border-radius: 8px; /* round the corners */
            max-width: 600px; /* set a max width */
            margin: auto; /* Center the div horizontally */
            position: relative; /* For positioning */
            top: 50%; /* Center the div vertically */
            transform: translateY(-50%); /* Adjust to center */
        }
    </style>
</head>
<body>
    <?php
        //include "view/navbar.php";
        include "model/functions.php";
        //include "view/show_upload_form.php";
    ?>
    
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <?php

                if ($_SERVER['REQUEST_METHOD'] == "POST") //check for post - validate form if POST
                {                  
                    if(isset($_POST['action']) && $_POST['action'] === 'upload') //check for form submission
                    {
                        //retrieve and filter upload form inputs
                        $gameTitle = filter_input(INPUT_POST, 'gameTitle', FILTER_SANITIZE_STRING);
                        $gameGenre = filter_input(INPUT_POST, 'gameGenre', FILTER_SANITIZE_STRING);
                        $gamePlatform = filter_input(INPUT_POST, 'gamePlatform', FILTER_SANITIZE_STRING);
                        $image = $_FILES['image'];

                        echo($gameTitle);
                        // Call the function to add the game - message based on success or failure of add
                        if (addGameDB($gameTitle, $gameGenre, $gamePlatform, $image)) {
                            //header("Location: view/show_video_games.php");
                            exit;
                        } else {
                            //header("Location: view/show_error.php");
                        }
                    }
                    
                    //Retrieve and then filter the login inputs
                    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

                    //Validate - Check for empty input fields
                    if(!$username)
                    {
                        //username error message
                        $error1 ='<div class="alert alert-danger" role="alert">Username cannot be empty.</div>';
                    }
                    if(!$password)
                    {
                        //password error message
                        $error2 ='<div class="alert alert-danger" role="alert">Password cannot be empty.</div>';
                    }
                    
                    //compare the username and password to csv
                    $isLoggedIn = checkLogin($username, $password);

                    //conditionally show the videogames via include
                    if($isLoggedIn){
                        header("Location: view/show_video_games.php");
                        exit;
                    } else {
                        include "view/show_login_form.php";
                        $error3 = "Username or Password Incorrect.";
                    }
                }     
                else 
                {
                    include "view/show_login_form.php";
                }
            
        ?>
    </div>
    
    
    
</body>
</html>