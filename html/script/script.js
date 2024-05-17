function showSuccessModal() {
    let modal = document.querySelector('#successModal');
    modal.style.display = "flex";
    setTimeout(function() { modal.style.display = "none"; }, 2000);
}

function showFailureModal() {
    let modal = document.querySelector('#failureModal');
    modal.style.display = "flex";
    setTimeout(function() { modal.style.display = "none"; }, 2000);
}
$(document).ready(function (){
    $('#file1').show();
    $('#file2').hide();

    window.addEventListener('scroll', function() {
        let header = document.querySelector('.headOut');
        if (window.scrollY > 396) { 
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    

    let r = document.getElementById('message');
    if(r.value === "Booking Successful")
        showSuccessModal();
    else if(r.value === "Failed Booking")
        showFailureModal();

    $("#Chartered").click(function (){
        let tmp = $("#chartered\\?").text();
        if(tmp === "No") {
            $("#chartered\\?").text("Yes");

        }
        else
            $("#chartered\\?").text("No");


    });

    1
    $("#RTrip").click(function (){
        let r = $('#isReturn');
        let tmp = $("#rtrip\\?").text();
        if(tmp === "No") {

            $("#rtrip\\?").text("Yes");

            r.value = 1;
            let str = '<div id="dateInputContainer">' +
                '<label for="DateInput2">Return Date</label>' +
                '<input type="text" style="background-color: white;" class="form-control" id="DateInput2" placeholder="Click to Select Date" required>' +
                '</div>';
            $('#DateInput1').after(str);
        } else {
            r.value = 0;
            $("#rtrip\\?").text("No");
            $('#dateInputContainer').remove();
        }
        console.log(r.value);

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
    jQuery(document).ready(function (){
     jQuery('.time-slot :checkbox').click(function(){
        console.log('Checkbox clicked'); // This should appear in the console when you click a checkbox.
        if(jQuery(this).is(':checked')) {
            jQuery('.time-slot :checkbox').not(this).prop('checked', false);
        }
        }); 
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
        document.getElementById("Booked").disabled = departureDate === "" || origin === destination;
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





