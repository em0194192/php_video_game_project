<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
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
        //start the session for access to session variables
        session_start(); 
                
        //Ensure Functions are accessible
        include "../model/functions.php";

        $id = filter_input(INPUT_GET, 'id') ;
        if($id)
        {
            $game = getGameDB($id);
            $gameID = htmlspecialchars($game['gameID']);
            $gameTitle = htmlspecialchars($game['gameTitle']);
            $gameGenre = htmlspecialchars($game['gameGenre']);
            $gamePlatform = htmlspecialchars($game['gamePlatform']);
            $file = "file";
            $button ="Update";
            $formAction = "../controller/update.php";
            $hiddenAction = "update";
        } else {
            $gameID = "";
            $gameTitle = "";
            $gameGenre = "";
            $gamePlatform = "";
            $file = "hidden";
            $button ="Upload";
            $formAction = "../controller/upload.php";
            $hiddenAction = "upload";
        }
    ?>
    
    <form action="<?=$formAction?>" method="post" class="content border rounded shadow p-4" enctype="multipart/form-data">
        <h1 style="text-align: center">Add A Game</h1>
        <div class="form-group mb-3">
            <label for="gameTitle" class="form-label">Title:</label>    
            <input type="text" class="form-control" name="gameTitle" value="<?=$gameTitle?>" id="gameTitle"></br>
            <label for="gameGenre" class="form-label">Genre:</label>
            <input type="text" class="form-control" name="gameGenre" value="<?=$gameGenre?>" id="gameGenre"></br>
            <label for="gamePlatform" class="form-label">Platform:</label>
            <input type="text" class="form-control" name="gamePlatform" value="<?=$gamePlatform?>" id="gamePlatform"></br>
            <label for="image" class="form-label">Game Image:</label>
            <input value="<?=$gamePlatform?>" class="form-control" name="image" accept="image/*" id="image">
            <input type="hidden" name="action" value="<?=$hiddenAction?>">
            <input type="hidden" name="gameID" value="<?=$gameID?>">
        </div>
            <input type="submit" class="btn btn-primary" value="<?=$button?>">
    </form>
    
</body>
</html>


