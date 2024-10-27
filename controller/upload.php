<?php
    //add access to functions
    include '../model/functions.php';

    //check for request method post
    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {                  
        //check hidden input action set to upload
        if(isset($_POST['action']) && $_POST['action'] === 'upload') 
        {
            //retrieve and filter upload form inputs
            $gameTitle = filter_input(INPUT_POST, 'gameTitle', FILTER_SANITIZE_STRING);
            $gameGenre = filter_input(INPUT_POST, 'gameGenre', FILTER_SANITIZE_STRING);
            $gamePlatform = filter_input(INPUT_POST, 'gamePlatform', FILTER_SANITIZE_STRING);
            $image = $_FILES['image'];

            // Call the function to add the game - redirect based on success or failure of add
            if (addGameDB($gameTitle, $gameGenre, $gamePlatform, $image)) {
                header("Location: ../view/show_video_games.php");
                //halt further code execution
                exit;
            } else {
                //send back to show video games with a query string for error message
                header("Location: ../view/show_video_games.php?error=invalid");
                //halt further code execution
                exit;
            }
        }
    }     
?>