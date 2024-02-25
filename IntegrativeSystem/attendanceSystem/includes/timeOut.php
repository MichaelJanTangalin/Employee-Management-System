<?php
include "db.php";



if (isset($_POST['submit'])) {

    $empID = $_POST['empID'];
    $empName = $_POST['empName'];
    $collegeDept = $_POST['collegeDept'];
    $officeDept = $_POST['officeDept'];
    date_default_timezone_set('Asia/Manila'); // Set the timezone to Philippines
    $timeOut = date("h:i:s A"); // Get the current time in 12-hour format


    echo $empID . "<br>";
    echo $empName . "<br>";
    echo $collegeDept . "<br>";
    echo $officeDept . "<br>";
    echo $timeOut . "<br>";



    session_start();

    if (empty($empID) && empty($empName) && empty($collegeDepts) && empty($officeDept)) {
        $message = "Empty Fields" . $conn3->error;
        $alert_type = "danger";
    } else {
        // Prepare the SQL statements
        $currentDate = date("Y-m-d");
        $sql = "SELECT TimeIn FROM employee_attendance WHERE employeeID = '$empID' AND DATE(Date) = '$currentDate'";
        $result = $conn3->query($sql);

        if ($result->num_rows == 0) {
            // User hasn't timed in yet, set error message
            $message = "You have not timed in yet today";
            $alert_type = "danger";
        } else {
            $row = $result->fetch_assoc();
            if ($row["TimeOut"] != null) {
                // User has already timed out, set error message
                $message = "You have already timed out";
                $alert_type = "danger";
            } else {
                // User has timed in and not timed out yet, update the TimeOut column
                $sql = "UPDATE employee_attendance
        SET TimeOut = '$timeOut'
        WHERE employeeID = '$empID' AND DATE(Date) = '$currentDate'";

                // Execute the SQL statement
                if ($conn3->query($sql) === TRUE) {
                    // Data successfully inserted in database, set success message
                    $message = "Time Out at " . $timeOut;
                    $alert_type = "success";

                    // Select the attendance records for the current date
                    $sql = "SELECT TimeIn, BreakIn, BreakOut, TimeOut, TotalHours 
            FROM employee_attendance 
            WHERE employeeID = '$empID' 
            AND DATE(Date) = '$currentDate'";
                    $result = $conn3->query($sql);
                    $row = $result->fetch_assoc();

                    // Calculate the total hours and minutes for the attendance record
                    $timeInTimestamp = strtotime($row["TimeIn"]);
                    $durationInSeconds = strtotime($row["TimeOut"]) - $timeInTimestamp;
                    $breakDurationInSeconds = strtotime($row["BreakOut"]) - strtotime($row["BreakIn"]);
                    $totalDurationInSeconds = $durationInSeconds - $breakDurationInSeconds;
                    $totalDurationInMinutes = $totalDurationInSeconds / 60;
                    $totalHours = floor($totalDurationInMinutes / 60);
                    $totalMinutes = $totalDurationInMinutes % 60;

                    // Format the total hours and minutes
                    $totalHoursString = sprintf("%d hr", $totalHours);
                    $totalMinutesString = sprintf("%d mins", $totalMinutes);
                    $totalTimeString = "$totalHoursString $totalMinutesString";

                    if ($row["TotalHours"] !== $totalTimeString) {
                        // Update the total hours column in the database
                        $sql = "UPDATE employee_attendance 
                SET TotalHours = '$totalTimeString' 
                WHERE employeeID = '$empID' 
                AND DATE(Date) = '$currentDate'";
                        $conn3->query($sql);
                    }

                    // Set success message with total hours worked
                    $message = "Time Out at " . $timeOut . "<br>" . "Total Hours Worked: " . $totalTimeString;
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
    }

    // Set session variables for message and alert type
    $_SESSION['message'] = $message;
    $_SESSION['alert_type'] = $alert_type;

    // Redirect to index.php
    header("Location: ../index.php");



}


?>