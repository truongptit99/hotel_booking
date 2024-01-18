function enableLoader() {
    $('.loader-container .spinner-border').removeClass('d-none');
    $('.loader-container span').addClass('d-none');
    $('.loader-container').parent().prop('disabled', true);
}

function disableLoader() {
    $('.loader-container .spinner-border').addClass('d-none');
    $('.loader-container span').removeClass('d-none');
    $('.loader-container').parent().prop('disabled', false);
}
