<?php

if (isset($_POST["submit"])) {
    $EmployeeID = $_POST['inputEmployeeID'];
    $firstName = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastName = $_POST["lastname"];
    $gender = $_POST["gender"];
    $position = $_POST["position"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    require_once 'db.php';
    require_once 'functions.php';

    if (emptyInputSignUp($firstName, $middlename, $lastName, $gender, $position, $email, $password, $passwordRepeat) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($password, $passwordRepeat) !== false) {
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }

    if (emailExist($conn, $email) !== false) {
        header("location: ../register.php?error=emailalreadyexist");
        exit();
    }

    createUser($conn, $EmployeeID, $firstName, $middlename, $lastName, $gender, $position, $email, $password);



} else {
    header("location: ../register.php");
}