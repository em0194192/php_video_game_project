
<form action="." method="post" class="content border rounded shadow p-4">
<h1 style="text-align: center">Login</h1>
<?php
    // if($error1)
    // {
    //     echo $error1;
    // }
    // if($error2)
    // {
    //     echo $error2;
    // }
    // if($error3)
    // {
    //     echo $error3;
    // }
?>
    <div class="form-group mb-3">
        <label for="usernamefield" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" id="usernamefield">
    </div>
    <div class="form-group mb-3">
        <label for="passwordfield" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" id="passwordfield">
    </div>

    <input type="submit" class="btn btn-primary" value="Sign In">
</form>

