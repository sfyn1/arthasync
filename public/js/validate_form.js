document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const submitButton = form.querySelector("button[type='submit']");
    const inputs = form.querySelectorAll("input, select, textarea");

    function checkFormValidity() {
        let isValid = true;
        inputs.forEach(input => {
            if (input.value.trim() === "") {
                isValid = false;
            }
        });
        submitButton.disabled = !isValid;
    }

    inputs.forEach(input => {
        input.addEventListener("input", checkFormValidity);
    });

    checkFormValidity(); // Initial check
});
