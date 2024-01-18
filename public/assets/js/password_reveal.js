$(document).ready(function() {
    $('.reveal-password-icon').on('click', function() {
        let input = $(this).parent().find('input');
        let icon = $(this);
        togglePasswordReveal(input, icon);
    });

    function togglePasswordReveal(input, icon) {
        if (input.prop('type') === "password") {
            input.prop('type', 'text');
            icon.removeClass('fa-eye-slash');
            icon.addClass('fa-eye');
        } else {
            input.prop('type', 'password');
            icon.removeClass('fa-eye');
            icon.addClass('fa-eye-slash');
        }
    }
});
