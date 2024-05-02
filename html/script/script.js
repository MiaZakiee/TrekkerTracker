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
function openModal(modalId) {
    let modal = document.getElementById(modalId);
    modal.style.display = "block";
    setTimeout(function() {
        closeModal(modalId);
    }, 2000);
}

function closeModal(modalId) {
    let modal = document.getElementById(modalId);
    modal.style.display = "none";
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    let modals = document.getElementsByClassName("modal");
    for (let i = 0; i < modals.length; i++) {
        if (event.target === modals[i]) {
            modals[i].style.display = "none";
        }
    }
}




