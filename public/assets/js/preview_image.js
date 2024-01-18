function readURL(input, imgControlName) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(imgControlName).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function preview(obj, tblObj, err) {
    flag = 1, check = 1;
    var thumbnail = $(obj).get(0);
    var picsize = thumbnail.files[0] ? (thumbnail.files[0].size) : 0;
    var ext = thumbnail.value ? $(thumbnail).val().split('.').pop().toLowerCase() : '';
    if (picsize > 0) {
        if ($.inArray(ext, ['png','jpg','jpeg']) == -1){
            $(err).html('The image file must be a file of type: jpeg, png, jpg.');
            $(obj).val("");
            check = 0;
        } else {
            check = 1;
        }
        if (picsize > 10000000) {
            $(err).html('The image file may not be greater than 10MB');
            $(tblObj).attr('src', window.location.origin + '/assets/images/no_image.png');
            $(obj).val("");
            flag = 0;
        } else {
            flag = 1;
        }
        if (flag == 1 && check == 1){
            $(err).html('');
            var imgControlName = tblObj;
            readURL(thumbnail, imgControlName);
        }
    } else {
        $(tblObj).attr('src', window.location.origin + '/assets/images/no_image.png');
    }
}

function previewImage(obj, tblObj, err) {
    $('body').on('change', obj, function () {
        preview(obj, tblObj, err);
    });
}
