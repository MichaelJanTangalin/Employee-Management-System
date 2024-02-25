<?php
include 'db.php';
include '../style/bootstrap.php'

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Employee Details</title>

</head>

<body id="printData">

    <header class="text-center" style="color: green;">


        <div class="container">
            <img src="images/NEU.png" alt="NEU" style="width:100px; margin-left:50px; float:left;">
            <img src="images/CCS.png" alt="CCS" style="width:100px; margin-right:50px; float:right;">
        </div>
        <div class="container" style="font-size:12px;"">
            <h1 style=" font-family: Kunstler Script; font-size:50px;"> <b>New Era University</b></h1>

            <p style="font-family: Times New Roman;">
                College of Informatics and Computing Studies<br>
                9 Central Ave, New Era, Quezon City, 1107 Metro Manila
            </p>
        </div>

    </header>

    <div class="container ps-5 pe-5 ">

        <?php
        $empID = $_POST['userid'];
        $sql = "SELECT * FROM employee
        JOIN employeeaddress 
        ON employee.employeeID = employeeaddress.employeeID
        JOIN currentemployment ON employee.employeeID = currentemployment.employeeID
        JOIN personalinformation ON employee.employeeID = personalinformation.employeeID
        WHERE employee.employeeID = '$empID'";
        $result = $conn2->query($sql);
        foreach ($result as $row) {
            //Employee
            $empName = $row['Salutation'] . ". " . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'];
            $gender = $row['gender'];
            $dateOfBirth = $row['dateOfBirth'];
            $age = $row['age'];
            $dateHired = $row['dateHired'];
            $endOfContract = $row['endOfContract'];

            //Address
            $houseNum = $row['houseNum'];
            $street = $row['street'];
            $city = $row['city'];
            $barangay = $row['barangay'];
            $province = $row['province'];
            $zip = $row['zip'];
            $email = $row['email'];
            $phoneNumber = $row['phoneNumber'];

            //Current employment
            $jobCategory = $row['jobCategory'];
            $employmentStatus = $row['employmentStatus'];
            $collegeDepartment = $row['collegeDepartment'];
            $officeDepartment = $row['officeDepartment'];

            //Personal Info
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

        ?>
        <input type="hidden" class="form-control" name="inputEmployeeID" value="<?php echo $empID ?>" readonly
            style="font-weight:bold;">
        <table class="table table-bordered border-dark">

            <tr class="text-center">
                <th colspan="2">
                    <h4>Employee Details</h4>
                </th>
            </tr>
            <tbody>
                <tr>
                    <th>Employee Number:</th>
                    <td>
                        <?php echo $empID ?>
                    </td>
                </tr>
                <tr>
                    <th>Employee Name:</th>
                    <td>
                        <?php echo $empName ?>
                    </td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>
                        <?php echo $gender ?>
                    </td>
                </tr>
                <tr>
                    <th>Date of Birth:</th>
                    <td>
                        <?php
                        $birthDate = date('F d, Y', strtotime($dateOfBirth));
                        echo $birthDate;

                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Age:</th>
                    <td>
                        <?php echo $age ?>
                    </td>
                </tr>
                <tr>
                    <th>Date of Hired:</th>
                    <td>
                        <?php
                        $hired = date('F d, Y', strtotime($dateHired));
                        echo $hired;

                        ?>
                    </td>
                </tr>
                <tr>
                    <th>End of Contract:</th>
                    <td>
                        <?php
                        $endContract = date('F d, Y', strtotime($endOfContract));
                        echo $endContract;

                        ?>
                    </td>
                </tr>
                <tr class="text-center">
                    <th colspan="2">
                        <h4>Address Details</h4>
                    </th>
                </tr>
                <tr>
                    <th>House Number:</th>
                    <td>
                        <?php echo $houseNum ?>
                    </td>
                </tr>
                <tr>
                    <th>Street:</th>
                    <td>
                        <?php echo $street ?>
                    </td>
                </tr>
                <tr>
                    <th>City:</th>
                    <td>
                        <?php echo $city ?>
                    </td>
                </tr>
                <tr>
                    <th>Barangay:</th>
                    <td>
                        <?php echo $barangay ?>
                    </td>
                </tr>
                <tr>
                    <th>Province:</th>
                    <td>
                        <?php echo $province ?>
                    </td>
                </tr>
                <tr>
                    <th>Zip:</th>
                    <td>
                        <?php echo $zip ?>
                    </td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>
                        <?php echo $email ?>
                    </td>
                </tr>
                <tr>
                    <th>Phone Number:</th>
                    <td>
                        <?php echo $phoneNumber ?>
                    </td>
                </tr>
                <tr class="text-center">
                    <th colspan="2">
                        <h4>Current Employment Details</h4>
                    </th>
                </tr>

                <tr>
                    <th>Job Category:</th>
                    <td>
                        <?php echo $jobCategory ?>
                    </td>
                </tr>
                <tr>
                    <th>Employment Status:</th>
                    <td>
                        <?php echo $employmentStatus ?>
                    </td>
                </tr>
                <tr>
                    <th>College Department:</th>
                    <td>
                        <?php echo $collegeDepartment ?>
                    </td>
                </tr>
                <tr>
                    <th>Office Department:</th>
                    <td>
                        <?php echo $officeDepartment ?>
                    </td>
                </tr>

                <tr class="text-center">
                    <th colspan="2">
                        <h4>Personal Information</h4>
                    </th>
                </tr>

                <tr>
                    <th>Blood Type:</th>
                    <td>
                        <?php echo $bloodType ?>
                    </td>
                </tr>
                <tr>
                    <th>Civil Status:</th>
                    <td>
                        <?php echo $civilStatus ?>
                    </td>
                </tr>

                <tr>
                    <th>Religion:</th>
                    <td>
                        <?php echo $religion ?>
                    </td>
                </tr>

                <tr>
                    <th>Place of Birth:</th>
                    <td>
                        <?php echo $placeOfBirth ?>
                    </td>
                </tr>

                <tr>
                    <th>Nationality:</th>
                    <td>
                        <?php echo $nationality ?>
                    </td>
                </tr>

                <tr>
                    <th>SSS ID:</th>
                    <td>
                        <?php echo $sssID ?>
                    </td>
                </tr>

                <tr>
                    <th>TIN:</th>
                    <td>
                        <?php echo $tinID ?>
                    </td>
                </tr>

                <tr>
                    <th>Philhealth ID:</th>
                    <td>
                        <?php echo $philHealthID ?>
                    </td>
                </tr>

                <tr>
                    <th>PAG-IBIG ID:</th>
                    <td>
                        <?php echo $pagIbigID ?>
                    </td>
                </tr>

                <tr class="text-center">
                    <th colspan="2">
                        <h4>Family Members</h4>
                    </th>
                </tr>
                <tr>
                    <th>Family Name</th>
                    <th>Relationship</th>
                </tr>

                <?php
                $sql = "SELECT * FROM employee
                JOIN employeefamily 
                ON employee.employeeID = employeefamily.employeeID
                WHERE employee.employeeID = '$empID'";
                $result = $conn2->query($sql);

                if ($result === false) {
                    // Handle query error
                    echo "Query error: " . $conn2->error;
                } else if ($result->num_rows == 0) {
                    // Handle no results found
                    echo "<tr><td colspan='2' class='text-center'>No Family Data</td></tr>";
                } else {
                    // Loop through rows and display data
                    while ($row = $result->fetch_assoc()) {
                        $familyName = $row['name'];
                        $relationship = $row['relationship'];

                        if (!empty($familyName) && !empty($relationship)) {
                            echo "<tr><td>$familyName</td><td>$relationship</td></tr>";
                        } else {
                            echo "<tr><td colspan='2' class='text-center'>No Family Data</td></tr>";
                        }
                    }
                }
                ?>

                <?php
                $sql = "SELECT * FROM employee
                        JOIN employeedependents 
                        ON employee.employeeID = employeedependents.employeeID
                        JOIN emergencycontacts 
                        ON employee.employeeID = emergencycontacts.employeeID
                        WHERE employee.employeeID = '$empID'";
                $result = $conn2->query($sql);

                foreach ($result as $row) {
                    //Dependents
                    $dependentName = $row['dependentName'];
                    $dependentdateOfBirth = $row['dependentdateOfBirth'];
                    $dependentAddress = $row['dependentAddress'];
                    $dependentRelationship = $row['dependentRelationship'];

                    //Emergenct Contacts
                    $name = $row['name'];
                    $relationship = $row['relationship'];
                    $address = $row['address'];
                    $contact = $row['contact'];

                }

                ?>

                <tr class="text-center">
                    <th colspan="2">
                        <h4>Dependents Details</h4>
                    </th>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>
                        <?php
                        echo $dependentName;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>
                        <?php
                        $dependentBday = date('F d, Y', strtotime($dependentdateOfBirth));
                        echo $dependentBday;

                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <?php
                        echo $dependentAddress;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Relationship</th>
                    <td>
                        <?php
                        echo $dependentRelationship;

                        ?>
                    </td>
                </tr>

                <tr class="text-center">
                    <th colspan="2">
                        <h4>Emergency Contact Details</h4>
                    </th>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>
                        <?php
                        echo $name;

                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Relationship</th>
                    <td>
                        <?php
                        echo $relationship;

                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <?php
                        echo $address;

                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Contact Number:</th>
                    <td>
                        <?php
                        echo $contact;

                        ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <hr>
        <div class="float-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary printInfo" name="submit"
                data-employeeid="<?php echo $empID; ?>">Print Data</button>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.printInfo').click(function () {
                var userid = $(this).data('employeeid');
                $.ajax({
                    url: 'includes/printArchive.php',
                    type: 'post',
                    data: { userid: userid },
                    success: function (response) {
                        // Open the print.php page in a new window with the userid parameter
                        var url = 'includes/printArchive.php?userid=' + encodeURIComponent(userid);
                        window.open(url, '_blank', 'width=1000,height=600');
                    }
                });
            });
        });
    </script>





</body>




</html>