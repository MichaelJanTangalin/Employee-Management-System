<?php
include "db.php";

if (isset($_POST['deleteData'])) {


    $getempNum = $_POST['deleteEmpID'];

    $sql = "SELECT * FROM employee WHERE employeeID = '$getempNum'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empID = $row['employeeID'];
            $Salutation = $row['Salutation'];
            $firstName = $row['firstName'];
            $middleName = $row['middleName'];
            $lastName = $row['lastName'];
            $gender = $row['gender'];
            $dateOfBirth = $row['dateOfBirth'];
            $age = $row['age'];
            $dateHired = $row['dateHired'];
            $endOfContract = $row['endOfContract'];
        }
    }

    $sql = "INSERT INTO employee(employeeID, Salutation, firstName, middleName, lastName, gender, dateOfBirth, age, dateHired, endOfContract)
				   VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn2);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=error");
        exit();
    }
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssss",
        $empID,
        $Salutation,
        $firstName,
        $middleName,
        $lastName,
        $gender,
        $dateOfBirth,
        $age,
        $dateHired,
        $endOfContract
    );

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    $sql = "SELECT * FROM employeeaddress WHERE employeeID = '$getempNum'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empID = $row['employeeID'];
            $houseNum = $row['houseNum'];
            $street = $row['street'];
            $city = $row['city'];
            $barangay = $row['barangay'];
            $province = $row['province'];
            $zip = $row['zip'];
            $email = $row['email'];
            $phoneNumber = $row['phoneNumber'];
        }
    }

    $sql = "INSERT INTO employeeaddress(employeeID, houseNum, street, city, barangay, province, zip, email, phoneNumber)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn2);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssssssss",
        $empID,
        $houseNum,
        $street,
        $city,
        $barangay,
        $province,
        $zip,
        $email,
        $phoneNumber
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT * FROM currentemployment WHERE employeeID = '$getempNum'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empID = $row['employeeID'];
            $jobCategory = $row['jobCategory'];
            $employmentStatus = $row['employmentStatus'];
            $collegeDepartment = $row['collegeDepartment'];
            $officeDepartment = $row['officeDepartment'];
        }
    }

    $sql = "INSERT INTO currentemployment(employeeID, jobCategory, employmentStatus, collegeDepartment, officeDepartment)
    VALUES(?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn2);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $empID,
        $jobCategory,
        $employmentStatus,
        $collegeDepartment,
        $officeDepartment
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT * FROM personalinformation WHERE employeeID = '$getempNum'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empID = $row['employeeID'];
            $bloodType = $row['bloodType'];
            $civilStatus = $row['civilStatus'];
            $religion = $row['religion'];
            $placeOfBirth = $row['placeOfBirth'];
            $nationality = $row['nationality'];
            $sssID = $row['sssID'];
            $tinID = $row['tinID'];
            $philHealthID = $row['philHealthID'];
            $pagIbigID = $row['pagIbigID'];
        }
    }

    //echo $empID;
    //echo $bloodType;
    //echo $civilStatus;
    //echo $religion;
    //echo $placeOfBirth;
    //echo $nationality;
    //echo $sssID;
    //echo $tinID;
    //echo $philHealthID;
    //echo $pagIbigID;

    $sql = "INSERT INTO personalinformation(employeeID, bloodType, civilStatus, religion, placeOfBirth, nationality, sssID, tinID, philHealthID, pagIbigID)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn2);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssss",
        $empID,
        $bloodType,
        $civilStatus,
        $religion,
        $placeOfBirth,
        $nationality,
        $sssID,
        $tinID,
        $philHealthID,
        $pagIbigID
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);




    $sql = "SELECT * FROM employeefamily WHERE employeeID = '$getempNum'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empID = $row['employeeID'];
            $familyName = $row['name'];
            $relationshipStats = $row['relationship'];

            $sql = "INSERT INTO employeefamily(employeeID, name, relationship)
            VALUES(?, ?, ?)";
            $stmt = mysqli_stmt_init($conn2);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../index.php?error=error");
                exit();
            }

            mysqli_stmt_bind_param(
                $stmt,
                "sss",
                $empID,
                $familyName,
                $relationshipStats
            );

            if (!empty($result)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }

    $sql = "SELECT * FROM employeedependents WHERE employeeID = '$getempNum'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empID = $row['employeeID'];
            $dependentName = $row['dependentName'];
            $dependentDob = $row['dependentdateOfBirth'];
            $dependentAddress = $row['dependentAddress'];
            $dependentRelationship = $row['dependentRelationship'];
        }
    }

    $sql = "INSERT INTO employeedependents(employeeID, dependentName, dependentdateOfBirth, dependentAddress, dependentRelationship)
    VALUES(?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn2);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $empID,
        $dependentName,
        $dependentDob,
        $dependentAddress,
        $dependentRelationship
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    $sql = "SELECT * FROM emergencycontacts WHERE employeeID = '$getempNum'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empID = $row['employeeID'];
            $name = $row['name'];
            $relationship = $row['relationship'];
            $address = $row['address'];
            $contact = $row['contact'];
        }
    }

    $sql = "INSERT INTO emergencycontacts(employeeID, name, relationship, address, contact)
    VALUES(?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn2);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $empID,
        $name,
        $relationship,
        $address,
        $contact
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    $sql = "DELETE FROM employee WHERE employeeID='$getempNum'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: ../index.php?success=Employee Data has been Archived");
    exit;

} else {
    header("Location: ../index.php?error=error");
}


?>