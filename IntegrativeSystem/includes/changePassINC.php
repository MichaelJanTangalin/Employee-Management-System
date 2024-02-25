<?php
require_once 'db.php';

if (isset($_POST["submit"])) {
    $session = $_POST['session'];
    $newpassword = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

    if ($newpassword != $passwordRepeat) {
        // Passwords do not match
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
        echo "<script>window.location.href = '../index.php';</script>";
        exit();
    } else {
        // Update password in the database
        $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT); // Hash the new password
        $updatePassword = "UPDATE users SET password = '$hashedPassword' WHERE email = '$session'";

        if ($conn->query($updatePassword) === TRUE) {
            // Password updated successfully
            echo "<script>alert('Your Password Has been Updated');</script>";
            echo "<script>window.location.href = '../index.php';</script>";
        } else {
            // Error updating password
            echo "<script>alert('$conn->error');</script>";
            echo "<script>window.location.href = '../index.php';</script>";
        }
    }
}
?>