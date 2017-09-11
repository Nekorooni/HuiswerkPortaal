<?php

session_start();
//Include models

spl_autoload_register(function ($class_name) {
    if(file_exists('model/' . $class_name . '.php')) {
        include 'model/' . $class_name . '.php';
    }
    else{
        include 'class/' . $class_name . '.php';
    }
});

//handle all page authentication in this file
include 'core/authentication.php';
?>
<!doctype html>
<html lang="en">
<head>
    <?php include('core/head.php');?>
</head>
<body>
<?php include('core/header.php');?>
<div class="container">
    <div class="row">
        <?php include "pages/" . $page . ".php";?>
    </div>
</div>
<?php
include 'core/footer.php';
App::displayErrors();
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>