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

                echo "
            <li class=\"nav-item\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"timesheet.php\">Timesheet</a>
            </li>
            ";

                echo "
            <li class=\"nav-item\">
              <a class=\"nav-link active\" aria-current=\"page\" href=\"attendance.php\">Attendance</a>
            </li>
            ";


                ?>

            </ul>
        </div>
    </div>
</nav>