$(document).ready(function (){
    $('#file1').show();
    $('#file2').hide();

    window.addEventListener('scroll', function() {
        let header = document.querySelector('.headOut');
        if (window.scrollY > 200) { // Adjust 100 to your desired scroll position
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });


    $("#Chartered").click(function (){
        let tmp = $("#chartered\\?").text();
        if(tmp === "No") {
            $("#chartered\\?").text("Yes");

        }
        else
            $("#chartered\\?").text("No");


    });

    $("#RTrip").click(function (){
        let tmp = $("#rtrip\\?").text();
        if(tmp === "No") {
            $("#rtrip\\?").text("Yes");
            let str = '<div id="dateInputContainer">' +
                '<label for="DateInput2">Return Date</label>' +
                '<input type="text" style="background-color: white;" class="form-control" id="DateInput2" placeholder="Click to Select Date">' +
                '</div>';
            $('#DateInput1').after(str);
        } else {
            $("#rtrip\\?").text("No");
            $('#dateInputContainer').remove();
        }

    });
    $('#DateInput1').click(function () {
        $('#eventDatePicker_DateInput2').hide();
        $('#eventDatePicker_DateInput1').show();
        initializeDatepicker('DateInput1', 'today');
    });
    $(document).on('click', '#DateInput2', function() {
        $('#eventDatePicker_DateInput1').hide();
        $('#eventDatePicker_DateInput2').show();
        initializeDatepicker('DateInput2', 'tomorrow');
    });

    function initializeDatepicker(inputId, scene) {
        let today = new Date();
        today.setDate(today.getDate());
        let tomorrow = today.toISOString().split('T')[0];
        let startDate = (scene === "tomorrow") ? tomorrow : today;
        let datePickerId = '#eventDatePicker_' + inputId;
        $(datePickerId).datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            inline: true,
            startDate: startDate

        });


        $(datePickerId).on('changeDate', function (e) {
            console.log("Input ID:", inputId); // Log the inputId
            if (inputId === 'DateInput1') {
                $('#DateInput1').val(e.format('MM dd, yyyy'));
            } else if (inputId === 'DateInput2') {
                $('#DateInput2').val(e.format('MM dd, yyyy'));
            }
            $('#datePickerModal').modal('hide');
        });

        // Show the modal when the input field is clicked
        $('#datePickerModal').modal('show');

    }

    const dropdownButtons = document.querySelectorAll('.btn-group .btn.btn-lg.dropdown-toggle');

    dropdownButtons.forEach(button => {
        const dropdownMenu = button.nextElementSibling; // Get the dropdown menu for this button

        dropdownMenu.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function() {
                button.textContent = this.textContent; // Update button text with selected item text
            });
        });
    });

    function validateForm() {
        // Get the form elements
        let origin = document.getElementById("Origin").selectedOptions[0].text;
        let destination = document.getElementById("Destination").selectedOptions[0].text;
        let accommodation = document.getElementById("Accommodation").selectedOptions[0].text;
        let departureDate = document.getElementById("DateInput1").value;

        // Check if any of the required fields are empty
        console.log("Origin: "+ origin);
        document.getElementById("Booked").disabled = departureDate === "";
    }

    // Add event listeners to form elements to trigger validation on change
    document.getElementById("Origin").addEventListener("change", validateForm);
    document.getElementById("Destination").addEventListener("change", validateForm);
    document.getElementById("Accommodation").addEventListener("change", validateForm);
    document.getElementById("DateInput1").addEventListener("change", validateForm);

});
function togglePass() {
    let pass = document.getElementById("regPass");
    console.log("This is the type: " + pass);
    if(pass.type === "password"){
        pass.type = "text";
    }else{
        pass.type = "password";
    }
}
$("#OpenLog").click(function (){
    window.location.href = "loginPage.php";
});



$("#OpenReg").click(function(){

    window.location.href = "registerPage.php";

});





