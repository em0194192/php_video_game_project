<?php
    include '../model/functions.php';
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
                header("Location: ../view/show_video_games.php");
                exit;
            } else {
                echo '<h1>Something went wrong with addGameDB</h1>';
                //header("Location: view/show_error.php");
            }
        }
    }     
?>