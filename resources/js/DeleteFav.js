$(document).ready(function() {
    $('.delete_fav_button').on('click', function(e) {
        e.preventDefault();

        let productId = $(this).closest('.delete_fav_form').find('#delete_product_id').val();
        let delete_token = $('#delete_token').val();
        let button = $(this);

        // alert(productId)
        
        $.ajax({
            method: 'POST', 
            url: 'http://mycar/delete-fav-car-' + productId,
            headers: {
                'X-CSRF-TOKEN': delete_token,
            },
            error: function() {
                alert('ошибка')
            }
        }).done(function() {

            button.closest('.car_card').remove();

            updatedFavCount()
        }.bind(this)); //bind - для привязки this к элементу, на который ссылаюсь (используется для фиксации this в методе объекта, чтобы передать его в качестве коллбека)
    })

    
})

function updatedFavCount() {
    $.ajax(
        {
        method: 'GET',
        url: 'http://mycar/fav-cars-count',
        success: function(result) {
                    let parse_res = JSON.parse(result)
                    $('#fav-count').text(parse_res);
                } 
        }
    )
}