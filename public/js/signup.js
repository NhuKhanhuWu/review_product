$("#signup-form").on("submit", function (e) {
    const password = $("#password").val();
    const password_check = $("#password_check").val();

    if (!(password === password_check)) {
        e.preventDefault();
        alert("Passwords are not identical!");
    }
});
