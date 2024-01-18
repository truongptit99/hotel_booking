function notiAlert(type, message) {
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.timeOut = 4000;
    switch(type){
        case 'info':
            toastr.info(message);
            break;

        case 'warning':
            toastr.warning(message);
            break;

        case 'success':
            toastr.success(message);
            break;

        case 'error':
            toastr.error(message);
            break;
    }
}