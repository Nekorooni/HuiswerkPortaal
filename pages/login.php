<?php

if(isset($_POST['username'])) {

    //Validate input!
    //Register user
    $inputUser = htmlspecialchars($_POST['username']);
    $inputPass = htmlspecialchars($_POST['password']);
    $user = User::login($inputUser, $inputPass);

    if($user) {
          $_SESSION['username'] = $user->getUsername();
          $_SESSION['role'] = $user->getRole();
          App::redirect("home");

    } else {
        App::addError("invalid combination");
    }
}
?>
<div class="container">
    <div class="row">
        <form action="?page=login" method="POST">
            <div class="form-group">
                <label for="username">Leerling nr.</label>
                <input type="text" class="form-control" id="username" placeholder="Nummer" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
