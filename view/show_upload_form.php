<form action="." method="post" class="content border rounded shadow p-4" enctype="multipart/form-data">
<h1 style="text-align: center">Add A Game</h1>
    <div class="form-group mb-3">
        <label for="gameTitle" class="form-label">Title:</label>    
        <input type="text" class="form-control" name="gameTitle" id="gameTitle"></br>
        <label for="gameGenre" class="form-label">Genre:</label>
        <input type="text" class="form-control" name="gameGenre" id="gameGenre"></br>
        <label for="gamePlatform" class="form-label">Platform:</label>
        <input type="text" class="form-control" name="gamePlatform" id="gamePlatform"></br>
        <label for="image" class="form-label">Game Image:</label>
        <input type="file" class="form-control" name="image" accept="image/*" id="image">
        <input type="hidden" name="action" value="upload">
    </div>
    <input type="submit" class="btn btn-primary" value="Upload">
</form>