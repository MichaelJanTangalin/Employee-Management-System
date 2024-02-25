<?php
include 'JSfunctions.php';
include 'db.php';


$empID = $_POST['userid'];
$sql = "SELECT * FROM employee
        JOIN employeeaddress 
        ON employee.employeeID = employeeaddress.employeeID
        JOIN currentemployment ON employee.employeeID = currentemployment.employeeID
        JOIN personalinformation ON employee.employeeID = personalinformation.employeeID
        WHERE employee.employeeID = '$empID'";
$result = $conn->query($sql);
if (!empty($result)) {
    foreach ($result as $row) {
        ?>
        <form class="row g-3 p-3" action="#" method="post" id="addForm">
            <input type="hidden" class="form-control" name="inputEmployeeID" value="<?php echo $empID ?>" id="inputEmployeeID"
                readonly style="font-weight:bold;">

            <div class="col-12">
                <label class="form-label">Salutation</label>
                <select class="form-select" name="salutation" id="salutation" required="required">
                    <option selected hidden="hidden">- Choose your Prefered Salutation -</option>
                    <option value="Mr" <?php if ($row['Salutation'] == 'Mr') {
                        echo ' selected';
                    } ?>>Mr.</option>
                    <option value="Ms" <?php if ($row['Salutation'] == 'Ms') {
                        echo ' selected';
                    } ?>>Ms.</option>
                    <option value="Mrs" <?php if ($row['Salutation'] == 'Mrs') {
                        echo ' selected';
                    } ?>>Mrs.</option>
                    <option value="Dr" <?php if ($row['Salutation'] == 'Dr') {
                        echo ' selected';
                    } ?>>Dr.</option>
                    <option value="Eng" <?php if ($row['Salutation'] == 'Eng') {
                        echo ' selected';
                    } ?>>Eng.</option>
                    <option value="Prof" <?php if ($row['Salutation'] == 'Prof') {
                        echo ' selected';
                    } ?>>Prof.</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="FirstName" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter First Name"
                    required="required" value="<?php echo $row['firstName'] ?>">
            </div>

            <div class=" col-md-4">
                <label for="MiddleName" class="form-label">Middle Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="middleName" placeholder="Enter Middle Name"
                        required="required" value="<?php echo $row['middleName'] ?>">
                </div>
            </div>

            <div class="col-md-4">
                <label for="LastName" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required="required"
                    value="<?php echo $row['lastName'] ?>">
            </div>

            <div class="col-md-6">
                <label for="Gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" required="required">
                    <option selected hidden="hidden" value="">- Choose your Gender -</option>
                    <option value="Male" <?php if ($row['gender'] == 'Male') {
                        echo ' selected';
                    } ?>>Male</option>
                    <option value="Female" <?php if ($row['gender'] == 'Female') {
                        echo ' selected';
                    } ?>>Female</option>
                </select>
            </div>

            <div class="col-md-5">
                <label for="DOB" class="form-label">Date of Birth
                </label>
                <input type="date" name="DOB" class="form-control" id="inputDOB" name="DOB" required="required"
                    value="<?php echo $row['dateOfBirth'] ?>">
            </div>

            <div class="col-md-1">
                <label for="Age" class="form-label">Age</label>
                <input type="text" readonly id="computedAge" name="age" class="form-control" onmousemove="findAge()"
                    required="required" value="<?php echo $row['age'] ?>">

            </div>

            <div class="col-md-6">
                <label for="DateHired" class="form-label">Date Hired</label>
                <input type="date" class="form-control" name="dateHired" required="required"
                    value="<?php echo $row['dateHired'] ?>">
            </div>

            <div class="col-md-6">
                <label for="EndContract" class="form-label">End of Contract</label>
                <input type="date" class="form-control" name="endContract" required="required"
                    value="<?php echo $row['endOfContract'] ?>">
            </div>


            <h3>
                <hr>Address
            </h3>
            <div class="col-md-3">
                <label for="houseNum" class="form-label">House #</label>
                <input type="text" class="form-control" name="houseNum" placeholder="1234 Main St" required="required"
                    value="<?php echo $row['houseNum'] ?>">
            </div>

            <div class="col-md-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" name="street" required="required" value="<?php echo $row['street'] ?>">
            </div>
            <div class="col-md-3">
                <label for="city" class="form-label">City</label>
                <select id="selectedCity" class="form-select" name="city" onchange="selectCity(this.value);"
                    required="required">
                    <option selected hidden="hidden" value="">- Select City -</option>
                    <option value="QC" <?php if ($row['city'] == 'QC') {
                        echo ' selected';
                    } ?>>Quezon City</option>
                    <option value="Others" <?php if ($row['city'] != 'QC') {
                        echo ' selected';
                    } ?>>Others</option>
                </select>
            </div>

            <div class="col-md-3" id="cityOthers" style="visibility: hidden;">
                <label for="inputProvince" class="form-label">City (If Others Please Specify)</label>
                <input type="text" class="form-control" id="specifyCity" name="specifyCity" placeholder="Specifiy City" value="<?php
                echo $row['city'];
                ?>">
            </div>


            <div class="col-md-3" id="barangayColumn">
                <label for="inputBarangay" class="form-label">Barangay</label>
                <select id="inputBarangay" name="qcBarangay" class="form-select">
                    <option selected>- Select Barangay -</option>
                    <option value="Commonwealth" <?php if ($row['barangay'] == 'Commonwealth') {
                        echo ' selected';
                    } ?>>Commonwealth
                    </option>
                    <option value="Payatas" <?php if ($row['barangay'] == 'Payatas') {
                        echo ' selected';
                    } ?>>Payatas</option>
                    <option value="Pilot" <?php if ($row['barangay'] == 'Pilot') {
                        echo ' selected';
                    } ?>>Pilot</option>
                    <option value="Aurora" <?php if ($row['barangay'] == 'Aurora') {
                        echo ' selected';
                    } ?>>Aurora</option>
                    <option value="Baesa" <?php if ($row['barangay'] == 'Baesa') {
                        echo ' selected';
                    } ?>>Baesa</option>
                    <option value="Bagbag" <?php if ($row['barangay'] == 'Bagbag') {
                        echo ' selected';
                    } ?>>Bagbag</option>
                </select>
            </div>

            <div class="col-md-3" id="barangayOthers" style="visibility: hidden;">
                <label for="specifyBarangay" class="form-label">Specify Barangay</label>
                <input type="text" class="form-control" name="specifyBarangay" id="specifyBarangay" placeholder="Please Specify"
                    value="<?php
                    echo $row['barangay'];
                    ?>">
            </div>

            <div class="col-md-4">
                <label for="inputProvince" class="form-label">Province</label>
                <input type="text" class="form-control" name="inputProvince" id="inputProvince" placeholder=""
                    required="required" value="<?php echo $row['province'] ?>">
            </div>

            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zip" required="required"
                    value="<?php echo $row['zip'] ?>">
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="@gmail.com"
                    required="required" value="<?php echo $row['email'] ?>">
            </div>

            <div class="col-md-6">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="phone" id="inputNumber" placeholder="+63" required="required"
                    value="<?php echo $row['phoneNumber'] ?>">
            </div>

            <h3>
                <hr>Current Employment Record
            </h3>

            <div class="col-6">
                <label class="form-label">Job Category</label>
                <select class="form-select" name="jobCategory" id="jobCategory" onchange="selectCategory(this.value);"
                    required="required">
                    <option selected>- Choose your Job Category -</option>
                    <option value="Teaching Personnel" <?php if ($row['jobCategory'] == 'Teaching Personnel') {
                        echo ' selected';
                    } ?>>Teaching Personnel</option>
                    <option value="Non-Teaching Personnel" <?php if ($row['jobCategory'] == 'Non-Teaching Personnel') {
                        echo ' selected';
                    } ?>>Non-Teaching Personnel</option>
                    <option value="Both" <?php if ($row['jobCategory'] == 'Both') {
                        echo ' selected';
                    } ?>>Both Teaching &
                        Non-Teaching Personnel</option>
                </select>
            </div>

            <div class="col-6">
                <label class="form-label">Employment Status</label>
                <select class="form-select" name="employmentStatus" required="required">
                    <option selected>- Choose your Employment Status -</option>
                    <option value="Full Time" <?php if ($row['employmentStatus'] == 'Full Time') {
                        echo ' selected';
                    } ?>>Full Time</option>
                    <option value="Part Time" <?php if ($row['employmentStatus'] == 'Part Time') {
                        echo ' selected';
                    } ?>>Part Time</option>
                    <option value="Regular Full Time" <?php if ($row['employmentStatus'] == 'Regular Full Time') {
                        echo ' selected';
                    } ?>>Regular Full Time</option>
                    <option value="Probationary" <?php if ($row['employmentStatus'] == 'Probationary') {
                        echo ' selected';
                    } ?>>Probationary</option>
                    <option value="Regular" <?php if ($row['employmentStatus'] == 'Regular') {
                        echo ' selected';
                    } ?>>Regular</option>
                    <option value="Unemployed" <?php if ($row['employmentStatus'] == 'Unemployed') {
                        echo ' selected';
                    } ?>>Unemployed</option>
                </select>
            </div>

            <div class="col-6" id="collegeDepartment">
                <label class="form-label">College Department</label>
                <select class="form-select" name="collegeDepartment" id="college">
                    <option selected>- Choose your College Department -</option>
                    <option value="CAS" <?php if ($row['collegeDepartment'] == 'CAS') {
                        echo ' selected';
                    } ?>>CAS</option>
                    <option value="COA" <?php if ($row['collegeDepartment'] == 'COA') {
                        echo ' selected';
                    } ?>>COA</option>
                    <option value="CICS" <?php if ($row['collegeDepartment'] == 'CICS') {
                        echo ' selected';
                    } ?>>CICS</option>
                    <option value="CEA" <?php if ($row['collegeDepartment'] == 'CEA') {
                        echo ' selected';
                    } ?>>CEA</option>
                    <option value="CED" <?php if ($row['collegeDepartment'] == 'CED') {
                        echo ' selected';
                    } ?>>CED</option>
                    <option value="None" <?php if ($row['collegeDepartment'] == 'None') {
                        echo ' selected';
                    } ?>>None</option>
                </select>
            </div>

            <div class="col-6" id="officeDepartment">
                <label class="form-label">Office Department</label>
                <select class="form-select" name="officeDepartment" id="office">
                    <option selected>- Choose your College Department -</option>
                    <option value="Accounting Department" <?php if ($row['officeDepartment'] == 'Accounting Department') {
                        echo ' selected';
                    } ?>>Accounting Department</option>
                    <option value="Operations Department" <?php if ($row['officeDepartment'] == 'Operations Department') {
                        echo ' selected';
                    } ?>>Operations Department</option>
                    <option value="Marketing Department" <?php if ($row['officeDepartment'] == 'Marketing Department') {
                        echo ' selected';
                    } ?>>Marketing Department</option>
                    <option value="Human Resource Department" <?php if ($row['officeDepartment'] == 'Human Resource Department') {
                        echo ' selected';
                    } ?>>Human Resource Department</option>
                    <option value="Sales Department" <?php if ($row['officeDepartment'] == 'Sales Department') {
                        echo ' selected';
                    } ?>>Sales Department</option>
                    <option value="Purchase Department" <?php if ($row['officeDepartment'] == 'Purchase Department') {
                        echo ' selected';
                    } ?>>Purchase Department</option>
                    <option value="Computer Service Department" <?php if ($row['officeDepartment'] == 'Computer Service Department') {
                        echo ' selected';
                    } ?>>Computer Service Department</option>
                    <option value="None" <?php if ($row['officeDepartment'] == 'None') {
                        echo ' selected';
                    } ?>>None</option>
                </select>
            </div>

            <h3>
                <hr>Personal Information
            </h3>

            <div class="col-6">
                <label for="blood" class="form-label">Blood Type</label>
                <input type="text" name="blood" class="form-control" id="blood" placeholder="eg. B+" required="required"
                    value="<?php echo $row['bloodType'] ?>">
            </div>
            <div class=" col-6">
                <label class="form-label">Civil Status</label>
                <select class="form-select" name="civilStatus" required="required">
                    <option selected hidden="hidden" value="">- Choose your Civil Status -</option>
                    <option value="Single" <?php if ($row['civilStatus'] == 'Single') {
                        echo ' selected';
                    } ?>>Single</option>
                    <option value="Married" <?php if ($row['civilStatus'] == 'Married') {
                        echo ' selected';
                    } ?>>Married</option>
                    <option value="Divorced" <?php if ($row['civilStatus'] == 'Divorced') {
                        echo ' selected';
                    } ?>>Divorced</option>
                    <option value="Seperated" <?php if ($row['civilStatus'] == 'Seperated') {
                        echo ' selected';
                    } ?>>Seperated
                    </option>
                </select>
            </div>

            <div class="col-6">
                <label class="form-label">Religion</label>
                <select class="form-select" name="religionChoice" id="religion" onchange="changeReligion()" required>
                    <option selected hidden="hidden" value="">- Choose your Religion -</option>
                    <option value="INC" <?php
                    if ($row['religion'] == 'INC') {
                        echo ' selected';
                    } ?>>INC</option>
                    <option value="NonINC" <?php if ($row['religion'] != 'INC') {
                        echo ' selected';
                    } ?>>NON-INC</option>
                </select>
            </div>

            <div class="col-6" id="otherReligionInput" style="visibility: hidden;">
                <label for="specifyReligion" class="form-label">If Others (Please Specify)</label>
                <input type="text" class="form-control" name="specifyReligion" id="specifyReligion"
                    placeholder="Specify Religion" value="<?php echo $row['religion'] ?>">
            </div>

            <div class="col-md-6">
                <label for="PoB" class="form-label">Place of Birth</label>
                <input type="text" class="form-control" id="PoB" name="PoB" placeholder="Enter your Place of Birth"
                    required="required" value="<?php echo $row['placeOfBirth'] ?>">
            </div>

            <div class="col-md-6">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="eg. Filipino"
                    required="required" value="<?php echo $row['nationality'] ?>">
            </div>

            <div class="col-md-6">
                <label for="SSS" class="form-label">SSS ID</label>
                <input type="text" class="form-control" id="SSS" name="SSSID" placeholder="Enter your SSS ID"
                    required="required" value="<?php echo $row['sssID'] ?>">
            </div>

            <div class="col-md-6">
                <label for="TIN" class="form-label">TIN</label>
                <input type="text" class="form-control" id="TIN" name="TIN" placeholder="Enter your TIN" required="required"
                    value="<?php echo $row['tinID'] ?>">
            </div>

            <div class="col-md-6">
                <label for="philhealthID" class="form-label">Philhealth ID</label>
                <input type="text" class="form-control" id="philhealthID" name="philhealthID"
                    placeholder="Enter your Philhealth ID" required="required" value="<?php echo $row['philHealthID'] ?>">
            </div>

            <div class="col-md-6">
                <label for="pagibigID" class="form-label">PAG-IBIG ID</label>
                <input type="text" class="form-control" name="pagibigID" id="pagibigID" placeholder="Enter your PAG-IBIG ID"
                    required="required" value="<?php echo $row['pagIbigID'] ?>">
            </div>

            <?php
    }
} else {
    echo "No results found";
}
?>

    <h3>
        <hr>Family Members
        <button class="add_more btn btn-success">Add</button>
    </h3>

    <?php


    ?>

    <div id="show_item">
        <div class="row p-1">

            <div class="col-md-6">
                <label for="familyName" class="form-label">Name</label>
            </div>
            <div class="col-md-5">
                <label for="relationship" class="form-label">Relationship</label>
            </div>
            <?php
            $empID = $_POST['userid'];
            $sql = "SELECT * FROM employee
                    INNER JOIN employeefamily ON employee.employeeID = employeefamily.employeeID
                    WHERE employee.employeeID = '$empID'";
            $result = $conn->query($sql);
            if (!empty($result)) {
                foreach ($result as $row) {
                    $familyID = $row['id'];
                    $familyName = $row['name'];
                    $familyRelationship = $row['relationship'];
                    ?>
                    <div id="family-<?php echo $familyID ?>" class="family-item row p-0 pt-2 ms-0">
                        <div class="col-md-6 pt-1">
                            <input type="text" class="form-control" id="familyName" name="familyName[]" placeholder="Enter Name"
                                value="<?php echo $familyName ?>">
                        </div>
                        <div class="col-md-5 pt-1">
                            <input type="text" class="form-control" id="relationship" name="relationship[]"
                                placeholder="eg. Brother" value="<?php echo $familyRelationship ?>">
                        </div>

                        <div class="col-md-1 pt-1">
                            <button data-id="<?php echo $familyID ?>" class="remove_item btn btn-danger ">Delete</button>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.remove_item', function (e) {
                e.preventDefault();
                let familyID = $(this).data('id');
                $("#family-" + familyID).remove();
            });
        });
    </script>
    <?php
    $empID = $_POST['userid'];
    $sql = "SELECT * FROM employee
                JOIN employeedependents 
                ON employee.employeeID = employeedependents.employeeID
                JOIN emergencycontacts 
                ON employee.employeeID = emergencycontacts.employeeID
                WHERE employee.employeeID = '$empID'";
    $result = $conn->query($sql);
    if (!empty($result)) {
        foreach ($result as $row) {
            ?>

            <h3>Dependents</h3>
            <div class="col-md-6">
                <label for="dependentName" class="form-label">Name</label>
                <input type="text" class="form-control" id="dependentName" name="dependentName" placeholder="Enter Name"
                    required="required" value="<?php echo $row['dependentName'] ?>">
            </div>

            <div class="col-md-6">
                <label for="dependentDOB" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dependentDOB" id="dependentDOB" required="required"
                    value="<?php echo $row['dependentdateOfBirth'] ?>">
            </div>

            <div class="col-md-6">
                <label for="dependentAddress" class="form-label" name="dependentAddress">Address</label>
                <input type="text" class="form-control" id="dependentAddress" name="dependentAddress"
                    placeholder="Enter Address" required="required" value="<?php echo $row['dependentRelationship'] ?>">
            </div>

            <div class="col-md-6">
                <label for="dependentRelationship" class="form-label">Relationship</label>
                <input type="text" class="form-control" name="dependentRelationship" id="dependentRelationship"
                    placeholder="eg. Brother" required="required" value="<?php echo $row['dependentRelationship'] ?>">
            </div>

            <h3>
                <hr>Emergency Contact Information
            </h3>


            <div class="col-md-6">
                <label for="EContactName" class="form-label">Name</label>
                <input type="text" class="form-control" id="EContactName" name="EContactName" placeholder="Enter Name"
                    required="required" value="<?php echo $row['name'] ?>">
            </div>

            <div class="col-md-6">
                <label for="EContactName" class="form-label">Relationship</label>
                <input type="text" class="form-control" id="ECRelationship" name="ECRelationship" placeholder="eg. Brother"
                    required="required" value="<?php echo $row['relationship'] ?>">
            </div>

            <div class="col-md-6">
                <label for="EContactAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="EContactAddress" name="EContactAddress" placeholder="Enter Address"
                    required="required" value="<?php echo $row['address'] ?>">
            </div>
            <div class="col-md-6">
                <label for="EContact" class="form-label">Contact #</label>
                <input type="text" class="form-control" id="EContact" name="EContact" placeholder="Enter Contact Number"
                    required="required" value="<?php echo $row['contact'] ?>">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>

        </form>

        <?php
        }
    }
    ?>