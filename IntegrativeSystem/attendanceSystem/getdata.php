<?php
include '../includes/db.php';
// select data from table
$empID = $_POST['empID'];

$sql = "SELECT * FROM employee 
INNER JOIN currentemployment ON employee.employeeID = currentemployment.employeeID WHERE employee.employeeID = '$empID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['employeeID'] = $row['employeeID'];
        $data['empName'] = $row['Salutation'] . "." . " " . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'];
        $data['gender'] = $row['gender'];
        $data['college'] = $row['collegeDepartment'];
        $data['office'] = $row['officeDepartment'];

    }
    echo json_encode($data);
}


?>