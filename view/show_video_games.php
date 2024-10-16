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
        include "../model/functions.php";
    ?>
<div class="content border rounded shadow p-4">
  <div class="card-group">
    <?php
      $games = getGames();

      foreach($games as $game){
        $title = htmlspecialchars($game[0]);
        $genre = htmlspecialchars($game[1]);
        $platform = htmlspecialchars($game[2]);
        $imagesource = htmlspecialchars($game[3]);
      
        echo "
        <div class='card'>
          <img src='$imagesource' class='card-img-top' alt='$title'>
          <div class='card-body'>
            <h5 class='card-title'>Title:$title</h5>
            <p class='card-text'>Genre:$genre</p>
            <p class='card-text'>Platform:$platform</p>
          </div>
        </div>
        ";
      
      
      }
    ?>
  </div>
</div>
    </body>
    </html>