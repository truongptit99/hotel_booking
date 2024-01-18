function removeData(obj, tblObj)
{
    $('body').on('click', obj, function(e) {
        e.preventDefault();

        var me = $(this),
            url = me.attr('href'),
            csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
            title: '',
            text: 'Are you sure to want to delete?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f15e5d',
            cancelButtonColor: '#c1c1c1',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        '_method': 'delete',
                        '_token': csrf_token,
                    },
                    success: function(response) {
                        if (response.type == 'success') {
                            $(tblObj).DataTable().ajax.reload(null, false);
                            toastr.options.positionClass = 'toast-bottom-right';
                            toastr.options.timeOut = 4000;
                            toastr.success(response.message);
                        } else if (response.type == 'warning') {
                            toastr.options.positionClass = 'toast-bottom-right';
                            toastr.options.timeOut = 4000;
                            toastr.warning(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.options.timeOut = 4000;
                        toastr.error(xhr.responseJSON.message);
                    }
                });
            }
        });
    });
}
