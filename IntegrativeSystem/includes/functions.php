<?php

function emptyInputSignUp($firstName, $middlename, $lastName, $gender, $position, $email, $password, $passwordRepeat)
{
    $result = false;

    if (empty($firstName) || empty($middlename) || empty($lastName) || empty($gender) || empty($position) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    }

    return $result;
}

function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }

    return $result;
}

function pwdMatch($password, $passwordRepeat)
{
    $result = false;
    if ($password !== $passwordRepeat) {
        $result = true;
    }

    return $result;
}

function emailExist($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;

        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $EmployeeID, $firstName, $middlename, $lastName, $gender, $position, $email, $password)
{
    $sql = "INSERT INTO users(employeeID, firstName, middleName, lastName, gender, position, email, password) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $EmployeeID, $firstName, $middlename, $lastName, $gender, $position, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../register.php?error=none");
    exit();

}


function emptyInputLogin($email, $password)
{
    $result = false;

    if (empty($email) || empty($password)) {
        $result = true;
    }
    return $result;
}

function loginUser($conn, $email, $password)
{
    $emailExist = emailExist($conn, $email);

    if ($emailExist === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();

    }

    $passwordHASHED = $emailExist["password"];
    $checkPassword = password_verify($password, $passwordHASHED);

    if ($checkPassword === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    } elseif ($checkPassword === true) {
        session_start();
        $_SESSION["empID"] = $emailExist["employeeID"];
        $_SESSION["loggedIn"] = $emailExist["email"];
        $_SESSION["Position"] = $emailExist["position"];
        $_SESSION["FirstName"] = $emailExist["firstName"];
        $_SESSION["MiddleName"] = $emailExist["middleName"];
        $_SESSION["LastName"] = $emailExist["lastName"];
        header("location: ../index.php");
        exit();

    }
}

?>