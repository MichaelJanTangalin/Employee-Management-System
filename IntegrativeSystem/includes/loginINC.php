<?php

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];


    require_once 'db.php';
    require_once 'functions.php';

    if (isset($remember)) {
        setcookie('getEmail', $_GET['email'], time() + 30);
        setcookie('getPassword', $_GET['password'], time() + 30);
    } else {
        setcookie('getEmail', $_GET['email'], 30);
        setcookie('getPassword', $_GET['password'], 30);
    }

    if (emptyInputLogin($email, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $password);

} else {
    header("location: ../login.php");
    exit();
}


$email_cookie = '';
$password_cookie = '';
$set_remember = "";

if (isset($_COOKIE['getEmail']) && isset($_COOKIE['getPassword'])) {
    $email_cookie = $_COOKIE['getEmail'];
    $password_cookie = $_COOKIE['getPassword'];
    $set_remember = "checked='checked'";
}