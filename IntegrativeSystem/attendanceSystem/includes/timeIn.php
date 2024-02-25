<?php
include "db.php";

if (isset($_POST['submit'])) {
    $empID = $_POST['empID'];
    $empName = $_POST['empName'];
    $collegeDept = $_POST['collegeDept'];
    $officeDept = $_POST['officeDept'];
    date_default_timezone_set('Asia/Manila'); // Set the timezone to Philippines
    $timeIn = date("h:i:s A"); // Get the current date and time in 24-hour format

    session_start();

    if (empty($empID) || empty($empName) || empty($collegeDept) || empty($officeDept)) {
        $message = "Empty Fields" . $conn3->error;
        $alert_type = "danger";
    } else {
        // Check if the employee exists in the employee table
        $sql_check_employee = "SELECT * FROM employee WHERE employeeID='$empID'";
        $result_check_employee = $conn3->query($sql_check_employee);
        if ($result_check_employee->num_rows > 0) {
            // Employee already exists, check if there is a time in entry for the current date
            $sql_check_attendance = "SELECT * FROM employee_attendance WHERE employeeID='$empID' AND DATE(Date) = CURDATE()";
            $result_check_attendance = $conn3->query($sql_check_attendance);
            if ($result_check_attendance->num_rows > 0) {
                // There is already a time in entry for the current date, set error message
                $message = "You have already timed in for today";
                $alert_type = "danger";
            } else {
                // There is no time in entry for the current date, insert data into employee_attendance table
                $sql_insert_attendance = "INSERT INTO employee_attendance (employeeID, employeeName, TimeIn)
                    VALUES ('$empID', '$empName', '$timeIn')";

                if ($conn3->query($sql_insert_attendance) === TRUE) {
                    // Data successfully inserted in database, set success message
                    $message = "Time In at " . $timeIn;
                    $alert_type = "success";
                } else {
                    // Error occurred, set error message
                    $message = "Error: " . $conn3->error;
                    $alert_type = "danger";
                }
            }
        } else {
            // Employee does not exist, insert data into employee and employee_attendance tables
            $sql_insert_employee = "INSERT INTO employee (employeeID, employeeName, collegeDepartment, officeDepartment)
                VALUES ('$empID', '$empName', '$collegeDept', '$officeDept')";
            $sql_insert_attendance = "INSERT INTO employee_attendance (employeeID, employeeName, TimeIn)
                VALUES ('$empID', '$empName', '$timeIn')";

            if ($conn3->query($sql_insert_employee) === TRUE && $conn3->query($sql_insert_attendance) === TRUE) {
                // Data successfully inserted in database, set success message
                $message = "Time In at " . $timeIn;
                $alert_type = "success";
            } else {
                // Error occurred, set error message
                $message = "Error: " . $conn3->error;
                $alert_type = "danger";
            }
        }
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