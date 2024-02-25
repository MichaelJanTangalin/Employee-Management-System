<?php
session_start();


?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MikeyCorp.com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <?php
        if (isset($_SESSION["loggedIn"])) {
          if ($_SESSION["Position"] == "Employee") {
            echo "
          <li class=\"nav-item\">
            <a class=\"nav-link active\" aria-current=\"page\" href=\"index.php\">Home</a>
          </li>
          ";

            echo "
          <li class=\"nav-item\">
            <a class=\"nav-link active\" aria-current=\"page\" href=\"profile.php\">" . $_SESSION['loggedIn'] . "</a>
          </li>
          ";

          } else if ($_SESSION["Position"] == "Admin" || $_SESSION["Position"] == "HR") {
            echo "
            <li class=\"nav-item\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"index.php\">Dashboard</a>
            </li>
            ";

            echo "
            <li class=\"nav-item\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"dataEntry.php\">Add Employee</a>
            </li>
            ";

            echo "
          <li class=\"nav-item dropdown d-none d-lg-block d-lg-block\">
          <a class=\"nav-link active dropdown-toggle dropdown-toggle-split\" href=\"#\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
          Daily Time Records
          </a>
          <ul class=\"dropdown-menu dropdown-menu-end \">
            <li class=\"nav-item \">
            <a class=\"dropdown-item\" aria-current=\"page\" href=\"attendanceSystem/index.php\">TimeIn/BreakIn/BreakOut/TimeOut</a>
              <a class=\"dropdown-item\" aria-current=\"page\" href=\"employeeList.php\">Employee Attendance</a>
              <a class=\"dropdown-item\" aria-current=\"page\" href=\"employeeAttendance.php\">Attendance Monitoring</a>
            </li>
          </ul>
        </li>
            ";
            echo "
            <li class=\"nav-item\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"archieve.php\">Archieves</a>
            </li>
            ";

          }

          $empID = $_SESSION['empID'];
          echo '
  <li class="nav-item dropdown d-none d-lg-block d-lg-block">
    <a class="nav-link dropdown-toggle dropdown-toggle-split" href="#" data-bs-toggle="dropdown" aria-expanded="false">
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
      <li>';

          if ($_SESSION["Position"] == "Employee") {
            echo '<a class="dropdown-item editbtn" data-employeeid="' . $empID . '" href="#">Edit Profile</a>';
          } else {
            echo '<a class="dropdown-item" href="#">' . $_SESSION["loggedIn"] . '</a>';
          }

          echo '</li>
      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePassword">Change Password</a></li>
      <li><a class="dropdown-item" href="includes/logout.php">Logout</a></li>
    </ul>
  </li>';



          if ($_SESSION["Position"] == "Employee") {
            echo "
            <li class=\"nav-item d-lg-block d-lg-none d-xl-none\">
              <a class=\"nav-link active editbtn\" data-employeeid='$empID' href=\"#\">Edit Profile</a>
            </li>
            ";
          } else {
            //Admin & HR
            echo "
            <li class=\"nav-item d-lg-block d-lg-none d-xl-none\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Edit Profile</a>
            </li>
            ";
          }
          echo "
            <li class=\"nav-item d-lg-block d-lg-none d-xl-none\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"#\" data-bs-toggle=\"modal\" data-bs-target=\"#changePassword\">Change Password</a>
            </li>
            ";

          echo "
            <li class=\"nav-item d-lg-block d-lg-none d-xl-none\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"includes/logout.php\">Logout</a>
            </li>
            ";

        } else {
          echo "
            <li class=\"nav-item\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"login.php\">Login</a>
            </li>
            ";

          echo "
            <li class=\"nav-item\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"register.php\">Register</a>
            </li>
            ";
        }



        ?>

      </ul>
    </div>
  </div>
</nav>