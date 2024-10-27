<?php
    include "../model/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    //start session for access to session variables
    session_start();
    //check query string for error message via get request (from login.php header url on checkLogin returning false)
    $errorMessage = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
    ?>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form action="../controller/login.php" method="post" class="content border rounded shadow p-4">
            <h1 style="text-align: center">Login</h1>
            <div class="form-group mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" id="usernamefield">
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" id="passwordfield">
            </div>
            <input type="submit" class="btn btn-primary" value="Sign In">
            <?php
                if ($errorMessage)
                {
                    echo "<p style='color: red;'>Invalid Username and/or Password!</p>";
                }
            ?>
        </form>
    </div>

</body>
</html>




