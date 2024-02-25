<?php

require_once 'db.php';


if (isset($_POST["submit"])) {

    //Employee Information

    $employeeID = $_POST['inputEmployeeID'];
    $Salutation = $_POST['salutation'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $middleName = $_POST['middleName'];
    $gender = $_POST['gender'];
    $DoB = $_POST['DOB'];
    $age = $_POST['age'];
    $DH = $_POST['dateHired'];
    $EoC = $_POST['endContract'];

    //echo $employeeID . "<br>";
    //echo $Salutation . "<br>";
    //echo $firstName . "<br>";
    //echo $lastName . "<br>";
    //echo $middleName . "<br>";
    //echo $gender . "<br>";
    //echo $DoB . "<br>";
    //echo $age . "<br>";
    //echo $DH . "<br>";
    //echo $EoC . "<br>";

    $sql = "INSERT INTO employee(employeeID, Salutation, firstName, middleName, lastName, gender, dateOfBirth, age, dateHired, endOfContract)
				   VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dataEntry.php?error=error");
        exit();
    }
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssss",
        $employeeID,
        $Salutation,
        $firstName,
        $middleName,
        $lastName,
        $gender,
        $DoB,
        $age,
        $DH,
        $EoC
    );

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);



    //Address

    $houseNum = $_POST['houseNum'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $finalCity = $city;

    //echo $houseNum . "<br>";
    //echo $street . "<br>";





    if ($city == "Others") {
        $finalCity = $_POST['specifyCity'];
        $finalBarangay = $_POST['specifyBarangay'];

    } else if ($city == "QC") {
        $finalBarangay = $_POST['qcBarangay'];

    }


    //echo $finalCity . "<br>";
    //echo $finalBarangay . "<br>";

    $province = $_POST['inputProvince'];
    $zip = $_POST['zip'];
    $email = $_POST['inputEmail'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO employeeaddress(employeeID, houseNum, street, city, barangay, province, zip, email, phoneNumber)
				   VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dataEntry.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssssssss",
        $employeeID,
        $houseNum,
        $street,
        $finalCity,
        $finalBarangay,
        $province,
        $zip,
        $email,
        $phone
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    //Current Employment Records
    $jobCategory = $_POST['jobCategory'];
    $employmentStatus = $_POST['employmentStatus'];
    $departmentCollege = $_POST['collegeDepartment'];
    $departmentOffice = $_POST['officeDepartment'];

    //echo $jobCategory . "<br>";
    //echo $employmentStatus . "<br>";
    //echo $department . "<br>";

    $sql = "INSERT INTO currentemployment(employeeID, jobCategory, employmentStatus, collegeDepartment, officeDepartment)
    VALUES(?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dataEntry.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $employeeID,
        $jobCategory,
        $employmentStatus,
        $departmentCollege,
        $departmentOffice
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);



    //Personal Information
    $bloodType = $_POST['blood'];
    $civilStatus = $_POST['civilStatus'];
    $religion = $_POST['religionChoice'];
    $finalReligion;

    //echo $bloodType . "<br>";
    //echo $civilStatus . "<br>";
    //echo $religion . "<br>";


    if ($religion == "INC") {
        $finalReligion = $religion;
    } else if ($religion == "NonINC") {
        $finalReligion = $_POST['specifyReligion'];
    }

    //echo $finalReligion . "<br>";

    $PoB = $_POST['PoB'];
    $nationality = $_POST['nationality'];
    $sssID = $_POST['SSSID'];
    $tinID = $_POST['TIN'];
    $philhealthID = $_POST['philhealthID'];
    $pagibigID = $_POST['pagibigID'];

    //echo $PoB . "<br>";
    //echo $nationality . "<br>";
    //echo $sssID . "<br>";
    //echo $tinID . "<br>";
    //echo $philhealthID . "<br>";
    //echo $pagibigID . "<br>";

    $sql = "INSERT INTO personalinformation(employeeID, bloodType, civilStatus, religion, placeOfBirth, nationality, sssID, tinID, philHealthID, pagIbigID)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dataEntry.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssss",
        $employeeID,
        $bloodType,
        $civilStatus,
        $finalReligion,
        $PoB,
        $nationality,
        $sssID,
        $tinID,
        $philhealthID,
        $pagibigID
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);




    $family = $_POST['familyName'];
    $relationship = $_POST['relationship'];


    foreach ($family as $index => $familyName) {
        //echo $familyName . ", " . $relationship[$index] . "<br> ";

        $A_familyName = $familyName;
        $A_relationship = $relationship[$index];

        $sql = "INSERT INTO employeefamily(employeeID, name, relationship)
            VALUES(?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../dataEntry.php?error=error");
            exit();
        }

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $employeeID,
            $A_familyName,
            $A_relationship
        );

        if (!empty($A_familyName) && !empty($A_relationship)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }


    }



    //Dependents

    $dependentName = $_POST['dependentName'];
    $dependentDob = $_POST['dependentDOB'];
    $dependentAddress = $_POST['dependentAddress'];
    $dependentRelationship = $_POST['dependentRelationship'];

    //echo $dependentDob . "<br>";
    //echo $dependentName . "<br>";
    //echo $dependentAddress . "<br>";
    //echo $dependentRelationship . "<br>";

    $sql = "INSERT INTO employeedependents(employeeID, dependentName, dependentdateOfBirth, dependentAddress, dependentRelationship)
    VALUES(?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dataEntry.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $employeeID,
        $dependentName,
        $dependentDob,
        $dependentAddress,
        $dependentRelationship
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);



    //Emergency Contact Information

    $EContactName = $_POST['EContactName'];
    $ECRelationship = $_POST['ECRelationship'];
    $EContactAddress = $_POST['EContactAddress'];
    $EContact = $_POST['EContact'];

    //echo $EContactName . "<br>";
    //echo $EContactAddress . "<br>";
    //echo $EContact . "<br>";

    $sql = "INSERT INTO emergencycontacts(employeeID, name, relationship, address, contact)
    VALUES(?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dataEntry.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $employeeID,
        $EContactName,
        $ECRelationship,
        $EContactAddress,
        $EContact
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    $position = "Employee";
    $password = password_hash("password", PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(employeeID, firstName, middleName, lastName, gender, position, email, password)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dataEntry.php?error=error");
        exit();
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssss",
        $employeeID,
        $firstName,
        $middleName,
        $lastName,
        $gender,
        $position,
        $email,
        $password
    );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);



    header("Location: ../dataEntry.php?error=none");
    exit;

}
?>