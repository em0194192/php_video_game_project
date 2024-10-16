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