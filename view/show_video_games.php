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
            height: 100vh; 
            margin: 0; 
            background: linear-gradient(to top right, lightblue, #d5a6e6); /* background gradient tl to tr blue to purple */
        }
        .content {
            background-color: white; 
            padding: 20px; 
            border-radius: 8px; 
            max-width: 600px; 
            margin: auto; 
            position: relative; 
        }
        .container {
            display: flex; 
            justify-content: space-between; 
            width: 80%; 
        }
        img {height:150px;width:150px;}
    </style>
</head>
<body>
  <?php
    include "../model/functions.php";
  ?>
  <div class="container mt-4">
    <div class="content border rounded shadow p-4">
      <div class="card-group">
        <?php
          session_start();
          if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
              header("Location: view/login_form.php");
              exit;
          }
          
          $games = getGamesDB();

          foreach($games as $game)
          {
            $title = htmlspecialchars($game['gameTitle']);
            $genre = htmlspecialchars($game['gameGenre']);
            $platform = htmlspecialchars($game['gamePlatform']);
            $imagesource = htmlspecialchars($game['gameImgLink']);
      
            echo "
            <div class='card'>
              <img src='../view/images/$imagesource' class='card-img-top' alt='$title'>
              <div class='card-body'>
                <h5 class='card-title'>Title: $title</h5>
                <p class='card-text'>Genre: $genre</p>
                <p class='card-text'>Platform: $platform</p>
              </div>
            </div>
            ";
          }
        ?>
      </div>
          <?php
            echo '<div class="d-flex justify-content-center">';
            echo '<a href="show_upload_form.php" class="btn btn-primary mt-4 ms-40">Upload New Video Game</a>';
            echo '</div>';
          ?>
    </div>
  </div>



</div>
    </body>
    </html>