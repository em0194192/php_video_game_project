<?php
    //add access to functions
    include '../model/functions.php';
    
    //check for request method post
    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {                  
        //check hidden input action set to upload
        if(isset($_POST['action']) && $_POST['action'] === 'update') 
        {
            //retrieve and filter upload form inputs
            $gameTitle = filter_input(INPUT_POST, 'gameTitle', FILTER_SANITIZE_STRING);
            $gameGenre = filter_input(INPUT_POST, 'gameGenre', FILTER_SANITIZE_STRING);
            $gamePlatform = filter_input(INPUT_POST, 'gamePlatform', FILTER_SANITIZE_STRING);
            $gameID = filter_input(INPUT_POST, 'gameID', FILTER_SANITIZE_STRING);
            if(!isset($_FILES['image']) || $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE)
            {
                $game = getGameDB($gameID);
                $image = htmlspecialchars($game['gameImgLink']); 
            } else {
                $image = $_FILES['image'];
            }
            // Call the function to add the game - redirect based on success or failure of add
            if (updateGameDB($gameID, $gameTitle, $gameGenre, $gamePlatform, $image)) {
                //send back to show video games
                header("Location: ../view/show_video_games.php");
                //halt further code execution
                exit;
            } else {
                //send back to show video games - but with a query string for error message
                header("Location: ../view/show_video_games.php?error=invalid_update");
                //halt further code execution
                exit;
            }
        }
    }     
?>