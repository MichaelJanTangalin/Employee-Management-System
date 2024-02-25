<?php
include "db.php";

if (isset($_POST['submit'])) {

    $empID = $_POST['empID'];
    $empName = $_POST['empName'];
    $collegeDept = $_POST['collegeDept'];
    $officeDept = $_POST['officeDept'];
    date_default_timezone_set('Asia/Manila'); // Set the timezone to Philippines
    $breakIn = date("h:i:s A"); // Get the current time in 12-hour format

    echo $empID . "<br>";
    echo $empName . "<br>";
    echo $collegeDept . "<br>";
    echo $officeDept . "<br>";
    echo $breakIn . "<br>";

    session_start();

    if (empty($empID) && empty($empName) && empty($collegeDept) && empty($officeDept)) {
        $message = "Empty Fields" . $conn3->error;
        $alert_type = "danger";
    } else {
        // Get the current date
        $currentDate = date('Y-m-d');

        // Check if the user is already timed in
        $sql_check_in = "SELECT BreakIn FROM employee_attendance WHERE employeeID = '$empID' AND Date = '$currentDate'";
        $result_check_in = $conn3->query($sql_check_in);

        if ($result_check_in->num_rows > 0) {
            // User is already timed in, update the BreakIn field
            $sql = "UPDATE employee_attendance SET BreakIn = '$breakIn' WHERE employeeID = '$empID' AND Date = '$currentDate'";
            $result = $conn3->query($sql);

            if ($result === TRUE) {
                // Data successfully updated in the database, set success message
                $message = "Break In at " . $breakIn;
                $alert_type = "success";
            } else {
                // Error occurred, set error message
                $message = "Error: " . $conn3->error;
                $alert_type = "danger";
            }
        } else {
            // User is not yet timed in, set error message
            $message = "You are not yet timed in.";
            $alert_type = "danger";
        }

        // Close the database connection
        $conn3->close();

    }

    // Set session variables for message and alert type
    $_SESSION['message'] = $message;
    $_SESSION['alert_type'] = $alert_type;

    // Redirect to index.php
    header("Location: ../index.php");

}
?>