$(document).ready(function() {
    $('.time-slot').on('click', function(e) {
        // Prevent triggering the click event twice when the checkbox itself is clicked
        if (!$(e.target).is('input.toggle-check')) {
            // Trigger click event on the checkbox
            $(this).find('input.toggle-check').click();
        }
    });

    $('input.toggle-check').on('click', function() {
        if ($(this).is(':checked')) {
            $('.time-slot').not($(this).closest('.time-slot')).hide();

            $(this).closest('.time-slot').css("border", "4px solid transparent");
            $(this).closest('.time-slot').css("background-image", "linear-gradient(43deg, #3C8CCC 0%, #95C0E3 46%, #FFCC70 100%)");
            $(this).closest('.time-slot').css("background-origin", "border-box");
            $(this).closest('.time-slot').css("background-clip", "content-box, border-box"); 
        } else {
            $('.time-slot').show();
            $(this).closest('.time-slot').css("border", "2px solid black");
            $(this).closest('.time-slot').css("background-image", "");
        }
    });

    $('.time-slot2').on('click', function(e) {
        // Prevent triggering the click event twice when the checkbox itself is clicked
        if (!$(e.target).is('input.toggle-check1')) {
            // Trigger click event on the checkbox
            $(this).find('input.toggle-check1').click();
        }
    });

    $('input.toggle-check1').on('click', function() {
        if ($(this).is(':checked')) {
            $('.time-slot2').not($(this).closest('.time-slot2')).hide();

            $(this).closest('.time-slot2').css("border", "4px solid transparent");
            $(this).closest('.time-slot2').css("background-image", "linear-gradient(43deg, #3C8CCC 0%, #95C0E3 46%, #FFCC70 100%)");
            $(this).closest('.time-slot2').css("background-origin", "border-box");
            $(this).closest('.time-slot2').css("background-clip", "content-box, border-box"); 
        } else {
            $('.time-slot2').show();
            $(this).closest('.time-slot2').css("border", "2px solid black");
            $(this).closest('.time-slot2').css("background-image", "");
        }
    });

    $('#finalizebtn').on('click', function(e) {
    let passNumVal = $('input[name=passNum]').val(); // Getting the value of passNum input

    // Check if passNumVal is not empty
    if(!passNumVal) {
        alert('Please input passenger number before finalizing.');
        return;
    }
        // Check if both time slot divs have a selected checkbox
        let timeslotChecked = $('.time-slot input.toggle-check').is(':checked');
        let timeslot2Checked = $('.time-slot2 input.toggle-check1').is(':checked');
        let isReturn = $('#isReturn').val();
        
    if(timeslotChecked && isReturn === "0"){   
         // Get the forms of the selected checkboxes
         let timeslotForm = $('.time-slot input.toggle-check:checked').closest('.time-slot').find('form'); 

         // You can now get the values from forms
         let timeslotFormData = timeslotForm.serialize(); 
         // Concatenate serialized data
         
        console.log('NO return!');
         // Initiate the AJAX request
         $.ajax({
             url: 'Finalize.php',
             type: 'POST',
             data: {
                timeslotData: timeslotFormData,
                passNum: passNumVal
             },
             success: function(response) {
                 console.log(response);
                 window.location.href = "Finalize.php";
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
                 alert("wa wah");
             }
         });
         
        }else if (timeslotChecked && timeslot2Checked) {
            let timeslotForm = $('.time-slot input.toggle-check:checked').closest('.time-slot').find('form'); 
            let timeslot2Form = $('.time-slot2 input.toggle-check1:checked').closest('.time-slot2').find('form'); 
    
            // You can now get the values from forms
            let timeslotFormData = timeslotForm.serialize(); 
            let timeslot2FormData = timeslot2Form.serialize(); 
    
           console.log("Has Returning Flights");
            
            // Initiate the AJAX request
            $.ajax({
                url: 'Finalize.php',
                type: 'POST',
                data: {
                    timeslotData: timeslotFormData,
                    timeslot2Data: timeslot2FormData,
                    passNum: passNumVal
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = "Finalize.php";
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    alert("wa wah");
                }
            });
      
           

    }else if(timeslotChecked && isReturn === "1" &&  !timeslot2Checked){
            alert("Pick Your Return Flight!");

    }
         else {
          alert('Please select your flights before finalizing.');
        }
      });

});