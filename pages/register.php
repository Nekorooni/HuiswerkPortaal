<?php

if(isset($_POST['username'])) {

    $inputUser = htmlspecialchars($_POST['username']);
    $inputPass = htmlspecialchars($_POST['password']);
    $inputPas2 = htmlspecialchars($_POST['repeat']);
    $inputMail = htmlspecialchars($_POST['email']);

    //Validate input
    $errors = [];

    if(strlen($inputPass) < 8) {
      array_push($errors, "Password should be at least 8 characters!");
    }

    if($inputPass != $inputPas2) {
      array_push($errors, "Passwords do not match!");
    }

    if(count($errors) > 0) {
      foreach($errors as $error) {
        App::addError($error);
      }
    } else {
      //Register user
      $user = User::register($inputUser, $inputMail, $inputPass, 'student');
      if($user) {
          echo $user->getUsername();

          // session_start();
          $_SESSION['username'] = $user->getUsername();
          $_SESSION['role'] = $user->getRole();
          App::redirect("home");
      }
    }
}
?>
<div class="container">
    <div class="row"><h3>Registeren</h3></div>
    <div class="row">
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
                <label for="repeat">Repeat</label>
                <input type="password" class="form-control" id="repeat" placeholder="Password" name="repeat" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
