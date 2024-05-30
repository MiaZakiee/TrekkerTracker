function edit() {
    const fields = document.querySelectorAll('.updateField');
    const confirmPass = document.querySelectorAll('.confirmPass');

    confirmPass.forEach(field => {
        field.style.display = field.style.display === "none" ? "block" : "none";
    });

    fields.forEach(field => {
        console.log(field.value);
        field.disabled = !field.disabled;
    });

    if (fields[0].disabled) {
        document.querySelector('#fieldFname').value = document.getElementById('orig_fname').value;
        document.querySelector('#fieldLname').value = document.getElementById('orig_lname').value;
        document.querySelector('#fieldUname').value = document.getElementById('orig_username').value;
        document.querySelector('#fieldEmail').value = document.getElementById('orig_email').value;
    }
}