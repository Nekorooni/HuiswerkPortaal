<?php

$auth = [];
//Define your roles here
$auth['guest'] = [];
$auth['user'] = [];
$auth['student'] = [];
$auth['teacher'] = [];
$auth['admin'] = [];

//Define pages for each role. Is a user is not authenticated to visit a page
//he is automatically redirected to the first page in the list of pages he is
//allowed to visit.
array_push($auth['guest'], 'login');
array_push($auth['guest'], 'register');

array_push($auth['user'], 'home');
array_push($auth['user'], 'account');
array_push($auth['user'], 'logout');

array_push($auth['student'], 'home');
array_push($auth['student'], 'huiswerk');
array_push($auth['student'], 'account');
array_push($auth['student'], 'logout');

array_push($auth['teacher'], 'home');
array_push($auth['teacher'], 'account');
array_push($auth['teacher'], 'logout');

array_push($auth['admin'], 'admin');
array_push($auth['admin'], 'logout');

//Determine page
if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

//Determine role
if(!isset($_SESSION['role'])) {
    $_SESSION['role'] = 'guest';
}

//Check to see if the role can visit the requested page
if(array_search($page, $auth[$_SESSION['role']]) === false) {
    //If not, redirect him to the first page in the list
    header("location: ?page=" . $auth[$_SESSION['role']][0]);
    exit();
}
