<script>
    function findAge() {
        var day = document.getElementById("inputDOB").value;
        var DOB = new Date(day);
        var today = new Date();
        var Age = today.getTime() - DOB.getTime();
        Age = Math.floor(Age / (1000 * 60 * 60 * 24 * 365.25));

        if (!isNaN(Age)) //if is NaN don't set value
            document.getElementById("computedAge").value = Age;
        else {
            document.getElementById("computedAge").value = '';
            var ageRequired = document.getElementById("computedAge").value = '';
            if (ageRequired == '') {
                document.getElementById("computedAge").setAttribute('required', 'required');
            }
        }
    }

    function selectCity() {
        var cityState = document.getElementById("selectedCity").value;

        if (cityState == "QC") {
            document.getElementById("inputBarangay").disabled = false;
            document.getElementById("inputBarangay").style.visibility = 'visible';
            document.getElementById("cityOthers").style.visibility = 'hidden';
            document.getElementById("barangayOthers").style.visibility = 'hidden';
            document.getElementById("inputBarangay").required = true;
            document.getElementById("specifyCity").required = false;
            document.getElementById("specifyBarangay").required = false;
        } else {
            document.getElementById("inputBarangay").disabled = true;
        }

        if (cityState == "Others") {
            document.getElementById("cityOthers").style.visibility = 'visible';
            document.getElementById("barangayOthers").style.visibility = 'visible';
            document.getElementById("specifyCity").required = true;
            document.getElementById("specifyBarangay").required = true;
            document.getElementById("inputBarangay").required = false;
        } else {
            document.getElementById("cityOthers").style.visibility = 'hidden';
            document.getElementById("barangayOthers").style.visibility = 'hidden';
            document.getElementById("specifyCity").required = false;
            document.getElementById("specifyBarangay").required = false;
            document.getElementById("inputBarangay").required = false;
        }
    }

    function changeReligion() {
        var religion = document.getElementById("religion");

        if (religion.value == "INC") {
            document.getElementById("otherReligionInput").style.visibility = "hidden";
            document.getElementById("religionChoice").required = true;
            document.getElementById("specifyReligion").required = false;

        } else if (religion.value == "NonINC") {
            document.getElementById("otherReligionInput").style.visibility = "visible";
            document.getElementById("specifyReligion").required = true;
            document.getElementById("religionChoice").required = false;
        } else {
            document.getElementById("otherReligionInput").style.visibility = "hidden";
            document.getElementById("religionChoice").required = false;
            document.getElementById("specifyReligion").required = false;
        }

    }

    $(document).ready(function () {
        $(".add_more").click(function (e) {
            e.preventDefault();
            $("#show_item").append(`
                        <div class="row p-1">
                    <div class="col-md-6 pt-1">
                        <input type="text" class="form-control" id="familyName" name="familyName[]" placeholder="Enter Name">
                    </div>
                    <div class="col-md-5 pt-1">
                        <input type="text" class="form-control" id="relationship" name="relationship[]" placeholder="eg. Brother">
                    </div>

                    <div class="col-md-1 pt-1">
                        <button class="remove_item btn btn-danger ">Delete</button>
                    </div>
                </div>
                        `);
        });

        $(document).on('click', '.remove_item', function (e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });

    });
</script>