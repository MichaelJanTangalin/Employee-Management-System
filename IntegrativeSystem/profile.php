<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>My Profile</title>
</head>

<body>
    <?php
    include 'includes/navbar.php';
    include 'includes/modals.php';
    include 'includes/db.php';
    include 'style/bootstrap.php';
    include 'includes/JSfunctions.php';


    ?>


    <script>
        $(document).ready(function () {
            $('.editbtn').click(function () {
                var userid = $(this).data('employeeid');
                $.ajax({
                    url: 'includes/updateEmployee.php',
                    type: 'post',
                    data: { userid: userid },
                    success: function (response) {
                        $('#editModal .modal-body').html(response);
                        $('#editModal').modal('show');
                    }
                });

            });

        });
    </script>
    <div class="container my-3">
        <div class="card shadow">
            <h2 class="card-header text-center">Employee Profile</h2>
            <div class="card-body">
                <div class="row justify-content-center">
                    <?php
                    $empID = $_SESSION["empID"];
                    $sql = "SELECT * FROM employee
                        JOIN employeeaddress ON employee.employeeID = employeeaddress.employeeID
                        JOIN currentemployment ON employee.employeeID = currentemployment.employeeID
                        JOIN personalinformation ON employee.employeeID = personalinformation.employeeID
                        WHERE employee.employeeID = '$empID'";
                    $result = $conn->query($sql);
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
                    <div class="col-md-3">

                        <?php
                        if ($gender == "Male") {
                            ?>
                            <img src="attendanceSystem/images/male.jpg" class="img-fluid" alt="Responsive image"
                                id="employeeImage">

                            <?php
                        } else if ($gender == "Female") {
                            ?>
                                <img src="attendanceSystem/images/female.jpg" class="img-fluid" alt="Responsive image"
                                    id="employeeImage">

                            <?php
                        } else {
                            ?>
                                <img src="attendanceSystem/images/Default.jpg" class="img-fluid" alt="Responsive image"
                                    id="employeeImage">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered border-dark">

                            <tr class="text-center">
                                <th colspan="2">
                                    <h5>Personal Details</h5>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered border-dark">

                            <tr class="text-center">
                                <th colspan="2">
                                    <h5>Work Contract Details</h5>
                                </th>
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
                                    <h5>Address Details</h5>
                                </th>
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
                                    <h5>Current Employment Details</h5>
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
                                    <h5>Personal Information</h5>
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
                                    <h5>Family Members</h5>
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
                            $result = $conn->query($sql);

                            if ($result === false) {
                                // Handle query error
                                echo "Query error: " . $conn->error;
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
                            $result = $conn->query($sql);

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
                                    <h5>Dependents Details</h5>
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
                                    <h5>Emergency Contact Details</h5>
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
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <?php

    include('includes/footer.php');
    ?>

</body>

</html>