<script>
    // Get current date and time
    const now = new Date();

    // Get the date string (e.g. "Sun Apr 24 2023")
    const dateString = now.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

    // Get the time string (e.g. "3:45:32 PM")
    const timeString = now.toLocaleTimeString('en-US');

    // Set the date and time in the HTML elements
    document.getElementById("date").innerHTML = dateString;
    document.getElementById("time").innerHTML = timeString;

    // Update the time every second
    setInterval(() => {
        const now = new Date();
        const timeString = now.toLocaleTimeString();
        document.getElementById("time").innerHTML = timeString;
    }, 1000);
</script>

<script>
    document.getElementById("searchBtn").addEventListener("click", function () {
        var empID = document.getElementById("searchEmpID").value;

        $.ajax({
            url: "getdata.php",
            method: "POST",
            data: {
                empID: empID
            },
            dataType: "JSON",
            success: function (data) {

                document.getElementById("empID1").value = data.employeeID;
                document.getElementById("empNameTI").value = data.empName;
                document.getElementById("collegeDeptTI").value = data.college;
                document.getElementById("officeDeptTI").value = data.office;

                document.getElementById("empID2").value = data.employeeID;
                document.getElementById("empNameBI").value = data.empName;
                document.getElementById("collegeDeptBI").value = data.college;
                document.getElementById("officeDeptBI").value = data.office;

                document.getElementById("empID3").value = data.employeeID;
                document.getElementById("empNameBO").value = data.empName;
                document.getElementById("collegeDeptBO").value = data.college;
                document.getElementById("officeDeptBO").value = data.office;

                document.getElementById("empID4").value = data.employeeID;
                document.getElementById("empNameTO").value = data.empName;
                document.getElementById("collegeDeptTO").value = data.college;
                document.getElementById("officeDeptTO").value = data.office;

                var gender = data.gender;
                const img = document.getElementById("employeeImage");

                if (gender == "Male") {
                    img.src = "images/male.jpg";

                } else if (gender == "Female") {
                    img.src = "images/female.jpg";

                } else {
                    img.src = "images/Default.jpg";

                }


            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Employee Not Available.");
            }
        });
    });
</script>