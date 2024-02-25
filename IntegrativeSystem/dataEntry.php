<!DOCTYPE html>
<html lang="en">

<?php
require("includes/dataEntryINC.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Add Employee</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {
            background-image: url("images/bg.jfif");
        }
    </style>
</head>

<?php
include 'includes/navbar.php';
include 'style/bootstrap.php';
include 'includes/db.php';
include 'includes/JSfunctions.php';

?>

<body>


    <section class="container my-5  p-2" style="background-color: #ffff">

        <div class="container-fluid pt-5 pb-2">

            <header class="text-center">
                <h1 class="display-6"><b>Employee Data Entry</b></h1>
            </header>
        </div>
        <div class="container py-1">
            <div class="col-md-6 mx-auto">
                <form class="search-form" id="search-form">
                    <div class="input-group">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-dark"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <p class="muted">Search an Existing Employee</p>
            </div>
        </div>

        <script>
            document.getElementById("search-form").addEventListener("submit", function (event) {
                event.preventDefault(); // prevent form submission
                var searchQuery = document.querySelector("#search-form input[type='search']").value;

                if (!searchQuery) {
                    return false;
                } else {
                    var url = "includes/searchEmployee.php?data=" + encodeURIComponent(searchQuery);
                    window.open(url, "_blank", "width=2000,height=600");
                }
            });
        </script>

        <form class="row g-3 p-4 formBox" action="includes/dataEntryINC.php" method="post" id="addForm">

            <h3>Employee Information</h3>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "none") {
                    echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                        <strong>Employee Registered Successfully</strong>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
                } else if ($_GET["error"] == "error") {
                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <strong>Employee Registered Unsuccessfully</strong>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
                }
            }
            ?>

            <?php
            function generateEmployeeID()
            {
                $year = date('y');
                $random_number1 = rand(10000, 99999);
                $random_number2 = rand(100, 999);
                $employee_id = $year . '-' . $random_number1 . '-' . $random_number2;
                return $employee_id;
            }
            ?>

            <div class="col-6">
                <label for="inputAddress" class="form-label">Employee ID</label>
                <input type="text" class="form-control" value="<?php echo generateEmployeeID();
                ; ?>" name="inputEmployeeID" id="inputEmployeeID" readonly style="font-weight:bold;">
            </div>

            <div class="col-6">
                <label class="form-label">Salutation</label>
                <select class="form-select" name="salutation" required="required">
                    <option selected hidden="hidden" value="">- Choose your Prefered Salutation -</option>
                    <option value="Mr">Mr.</option>
                    <option value="Ms">Ms.</option>
                    <option value="Mrs">Mrs.</option>
                    <option value="Dr">Dr.</option>
                    <option value="Eng">Eng.</option>
                    <option value="Prof">Prof.</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="FirstName" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstName" placeholder="Enter First Name"
                    required="required">
            </div>

            <div class=" col-md-4">
                <label for="MiddleName" class="form-label">Middle Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="middleName" placeholder="Enter Middle Name"
                        required="required">
                </div>
            </div>

            <div class="col-md-4">
                <label for="LastName" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name"
                    required="required">
            </div>

            <div class="col-md-6">
                <label for="Gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" required="required">
                    <option selected hidden="hidden" value="">- Choose your Gender -</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="col-md-5">
                <label for="DOB" class="form-label">Date of Birth
                </label>
                <input type="date" name="DOB" class="form-control" id="inputDOB" name="DOB" required="required">
            </div>

            <div class="col-md-1">
                <label for="Age" class="form-label">Age</label>
                <input type="text" readonly id="computedAge" name="age" class="form-control" onmousemove="findAge()"
                    required="required">

            </div>

            <div class="col-md-6">
                <label for="DateHired" class="form-label">Date Hired</label>
                <input type="date" class="form-control" name="dateHired" required="required">
            </div>

            <div class="col-md-6">
                <label for="EndContract" class="form-label">End of Contract</label>
                <input type="date" class="form-control" name="endContract" required="required">
            </div>


            <h3>
                <hr>Address
            </h3>
            <div class="col-md-3">
                <label for="houseNum" class="form-label">House #</label>
                <input type="text" class="form-control" name="houseNum" placeholder="1234 Main St" required="required">
            </div>

            <div class="col-md-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" name="street" required="required">
            </div>
            <div class="col-md-3">
                <label for="city" class="form-label">City</label>
                <select id="selectedCity" class="form-select" name="city" onchange="selectCity(this.value);"
                    required="required">
                    <option selected hidden="hidden" value="">- Select City -</option>
                    <option value="QC">Quezon City</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div class="col-md-3" id="cityOthers" style="visibility: hidden;">
                <label for="inputProvince" class="form-label">City (If Others Please Specify)</label>
                <input type="text" class="form-control" id="specifyCity" name="specifyCity" placeholder="Specifiy City">
            </div>


            <div class="col-md-3" id="barangayColumn">
                <label for="inputBarangay" class="form-label">Barangay</label>
                <select id="inputBarangay" name="qcBarangay" class="form-select" disabled="disabled">
                    <option selected hidden="hidden" value="">- Select Barangay -</option>
                    <option value="Commonwealth">Commonwealth</option>
                    <option value="Payatas">Payatas</option>
                    <option value="Pilot">Pilot</option>
                    <option value="Aurora">Aurora</option>
                    <option value="Baesa">Baesa</option>
                    <option value="Bagbag">Bagbag</option>
                </select>
            </div>

            <div class="col-md-3" id="barangayOthers" style="visibility: hidden;">
                <label for="specifyBarangay" class="form-label">Specify Barangay</label>
                <input type="text" class="form-control" name="specifyBarangay" id="specifyBarangay"
                    placeholder="Please Specify">
            </div>

            <div class="col-md-4">
                <label for="inputProvince" class="form-label">Province</label>
                <input type="text" class="form-control" name="inputProvince" id="inputProvince" placeholder=""
                    required="required">
            </div>

            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zip" required="required">
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="@gmail.com"
                    required="required">
            </div>

            <div class="col-md-6">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="phone" id="inputNumber" placeholder="+63"
                    required="required">
            </div>

            <h3>
                <hr>Current Employment Record
            </h3>

            <div class="col-6">
                <label class="form-label">Job Category</label>
                <select class="form-select" name="jobCategory" id="jobCategory" onchange="selectCategory(this.value);"
                    required="required">
                    <option selected>- Choose your Job Category -</option>
                    <option value="Teaching Personnel">Teaching Personnel</option>
                    <option value="Non-Teaching Personnel">Non-Teaching Personnel</option>
                    <option value="Both">Both Teaching & Non-Teaching Personnel</option>
                </select>
            </div>

            <div class="col-6">
                <label class="form-label">Employment Status</label>
                <select class="form-select" name="employmentStatus" required="required">
                    <option selected hidden="hidden" value="">- Choose your Employment Status -</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Regular Full Time">Regular Full Time</option>
                    <option value="Probationary">Probationary</option>
                    <option value="Regular">Regular</option>
                    <option value="Unemployed">Unemployed</option>
                </select>
            </div>

            <div class="col-6" id="collegeDepartment">
                <label class="form-label">College Department</label>
                <select class="form-select" name="collegeDepartment" id="college">
                    <option selected>- Choose your College Department -</option>
                    <option value="CAS">CAS</option>
                    <option value="COA">COA</option>
                    <option value="CICS">CICS</option>
                    <option value="CEA">CEA</option>
                    <option value="CED">CED</option>
                    <option value="None">None</option>
                </select>
            </div>

            <div class="col-6" id="officeDepartment">
                <label class="form-label">Office Department</label>
                <select class="form-select" name="officeDepartment" id="office">
                    <option selected hidden="hidden">- Choose your College Department -</option>
                    <option value="Accounting Department">Accounting Department</option>
                    <option value="Operations Department">Operations Department</option>
                    <option value="Marketing Department">Marketing Department</option>
                    <option value="Human Resource Department">Human Resource Department</option>
                    <option value="Sales Department">Sales Department</option>
                    <option value="Purchase Department">Purchase Department</option>
                    <option value="Computer Service Department">Computer Service Department</option>
                    <option value="None">None</option>
                </select>
            </div>

            <h3>
                <hr>Personal Information
            </h3>

            <div class="col-6">
                <label for="blood" class="form-label">Blood Type</label>
                <input type="text" name="blood" class="form-control" id="blood" placeholder="eg. B+"
                    required="required">
            </div>
            <div class="col-6">
                <label class="form-label">Civil Status</label>
                <select class="form-select" name="civilStatus" required="required">
                    <option selected hidden="hidden" value="">- Choose your Civil Status -</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Seperated">Seperated</option>
                </select>
            </div>

            <div class="col-6">
                <label class="form-label">Religion</label>
                <select class="form-select" name="religionChoice" id="religion" onchange="changeReligion()" required>
                    <option selected hidden="hidden" value="">- Choose your Religion -</option>
                    <option value="INC">INC</option>
                    <option value="NonINC">NON-INC</option>
                </select>
            </div>

            <div class="col-6" id="otherReligionInput" style="visibility: hidden;">
                <label for="specifyReligion" class="form-label">If Others (Please Specify)</label>
                <input type="text" class="form-control" name="specifyReligion" id="specifyReligion"
                    placeholder="Specify Religion">
            </div>

            <div class="col-md-6">
                <label for="PoB" class="form-label">Place of Birth</label>
                <input type="text" class="form-control" id="PoB" name="PoB" placeholder="Enter your Place of Birth"
                    required="required">
            </div>

            <div class="col-md-6">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="eg. Filipino"
                    required="required">
            </div>

            <div class="col-md-6">
                <label for="SSS" class="form-label">SSS ID</label>
                <input type="text" class="form-control" id="SSS" name="SSSID" placeholder="Enter your SSS ID"
                    required="required">
            </div>

            <div class="col-md-6">
                <label for="TIN" class="form-label">TIN</label>
                <input type="text" class="form-control" id="TIN" name="TIN" placeholder="Enter your TIN"
                    required="required">
            </div>

            <div class="col-md-6">
                <label for="philhealthID" class="form-label">Philhealth ID</label>
                <input type="text" class="form-control" id="philhealthID" name="philhealthID"
                    placeholder="Enter your Philhealth ID" required="required">
            </div>

            <div class="col-md-6">
                <label for="pagibigID" class="form-label">PAG-IBIG ID</label>
                <input type="text" class="form-control" name="pagibigID" id="pagibigID"
                    placeholder="Enter your PAG-IBIG ID" required="required">
            </div>

            <h3>
                <hr>Family Members
                <button class="add_more btn btn-success">Add</button>
            </h3>

            <div id="show_item">
                <div class="row p-1">
                    <div class="col-md-6">
                        <label for="familyName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="familyName" name="familyName[]"
                            placeholder="Enter Name">
                    </div>
                    <div class="col-md-5">
                        <label for="relationship" class="form-label">Relationship</label>
                        <input type="text" class="form-control" name="relationship[]" id="relationship"
                            placeholder="eg. Brother">
                    </div>

                </div>
            </div>

            <h3>Dependents</h3>
            <div class="col-md-6">
                <label for="dependentName" class="form-label">Name</label>
                <input type="text" class="form-control" id="dependentName" name="dependentName" placeholder="Enter Name"
                    required="required">
            </div>

            <div class="col-md-6">
                <label for="dependentDOB" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dependentDOB" id="dependentDOB" required="required">
            </div>

            <div class="col-md-6">
                <label for="dependentAddress" class="form-label" name="dependentAddress">Address</label>
                <input type="text" class="form-control" id="dependentAddress" name="dependentAddress"
                    placeholder="Enter Address" required="required">
            </div>

            <div class="col-md-6">
                <label for="dependentRelationship" class="form-label">Relationship</label>
                <input type="text" class="form-control" name="dependentRelationship" id="dependentRelationship"
                    placeholder="eg. Brother" required="required">
            </div>

            <h3>
                <hr>Emergency Contact Information
            </h3>

            <div class="col-md-6">
                <label for="EContactName" class="form-label">Name</label>
                <input type="text" class="form-control" id="EContactName" name="EContactName" placeholder="Enter Name"
                    required="required">
            </div>

            <div class="col-md-6">
                <label for="EContactName" class="form-label">Relationship</label>
                <input type="text" class="form-control" id="ECRelationship" name="ECRelationship"
                    placeholder="eg. Brother" required="required">
            </div>

            <div class="col-md-6">
                <label for="EContactAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="EContactAddress" name="EContactAddress"
                    placeholder="Enter Address" required="required">
            </div>
            <div class="col-md-6">
                <label for="EContact" class="form-label">Contact #</label>
                <input type="text" class="form-control" id="EContact" name="EContact" placeholder="Enter Contact Number"
                    required="required">
            </div>


            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-dark">Submit</button>
            </div>

        </form>
    </section>

    <?php
    include('includes/footer.php');

    ?>


</body>

</html>