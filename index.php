<?php

use Steampixel\Route;

require_once("config.php");
require_once('class/user.class.php');

Route::add('/', function() {
    echo "Main Page";
});

Route::add('/login', function() {
    //echo "Login Page";
    global $twig;
    $twig->display('login.html.twig');
});

Route::add('/register', function() {
    //echo "Register Page";
    global $twig;
    $twig->display('register.html.twig');
});

Route::run('/OP4HpTest');
?>