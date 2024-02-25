<?php
include "db.php";

if (isset($_POST['submit'])) {

    $empID = $_POST['empID'];
    $empName = $_POST['empName'];
    $collegeDept = $_POST['collegeDept'];
    $officeDept = $_POST['officeDept'];
    date_default_timezone_set('Asia/Manila'); // Set the timezone to Philippines
    $breakOut = date("h:i:s A"); // Get the current time in 12-hour format

    echo $empID . "<br>";
    echo $empName . "<br>";
    echo $collegeDept . "<br>";
    echo $officeDept . "<br>";
    echo $breakOut . "<br>";

    session_start();

    // Check if the user has already timed in and started the break
    $currentDate = date('Y-m-d'); // Get the current date

    $sql_check_in = "SELECT BreakIn FROM employee_attendance WHERE employeeID = '$empID' AND Date = '$currentDate'";
    $result_check_in = $conn3->query($sql_check_in);

    $sql_check_break = "SELECT BreakIn, BreakOut FROM employee_attendance WHERE employeeID = '$empID' AND Date = '$currentDate'";
    $result_check_break = $conn3->query($sql_check_break);

    if ($result_check_in->num_rows > 0 && $result_check_break->num_rows > 0) {
        $row = $result_check_break->fetch_assoc();
        $breakInTime = $row['BreakIn'];
        $breakOutTime = $row['BreakOut'];

        if ($breakOutTime === null) {
            // User has timed in and started the break, update the BreakOut field
            $sql = "UPDATE employee_attendance SET BreakOut = '$breakOut' WHERE employeeID = '$empID' AND Date = '$currentDate'";
            $result = $conn3->query($sql);

            if ($result === TRUE) {
                // Data successfully updated in the database, set success message
                $message = "Break Out at " . $breakOut;
                $alert_type = "success";
            } else {
                // Error occurred, set error message
                $message = "Error: " . $conn3->error;
                $alert_type = "danger";
            }
        } else {
            // User has already timed out for the break, set error message
            $message = "You have already timed out for the break.";
            $alert_type = "danger";
        }
    } else {
        // User has not timed in or started the break, set error message
        $message = "You are not allowed to break out at this time.";
        $alert_type = "danger";
    }

    // Close the database connection
    $conn3->close();

    // Set session variables for message and alert type
    $_SESSION['message'] = $message;
    $_SESSION['alert_type'] = $alert_type;

    // Redirect to index.php
    header("Location: ../index.php");
}
?>