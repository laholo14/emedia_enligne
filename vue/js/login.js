$(document).ready(function() {
    let checkbox = $("#checkbox");
    let password = $("#password");
    checkbox.click(function() {
        if (checkbox.prop("checked")) {
            password.attr("type", "text");
        } else {
            password.attr("type", "password");
        }
    });
});