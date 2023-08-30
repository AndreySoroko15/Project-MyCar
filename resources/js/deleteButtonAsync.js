$(document).ready(function() {
    $('.delete_button').on('click', function(e) {
            e.preventDefault();
        let button = $(this);
        let id = $(this).closest('.form-delete').find('#call_request_id').val();
        let _token = $(this).closest('.form-delete').find('#_token').val();

        // let url = 'http://mycar/admin/call-request/' + id;

        // alert(url);
        

        $.ajax({
            url: 'http://mycar/admin/call-request/' + id,
            type: 'POST', 
            data: {
                '_method': 'DELETE',
                '_token': _token,
            },
            success: function() {
                // alert('удалено')
                button.closest('.cortege').remove();
            },
            error: function(xhr) {
                // console.log(_token);
                console.log(xhr.responseText);
            }
        })

    })
})