$(document).ready(function() {
    $('.like_button').on('click', function(e) {
        e.preventDefault();
        let productId = $(this).closest('.like_form').find('#like_product_id').val();
        let like_token =$("#like_token").val();
        let like_button = $(this);
        let like_icon = like_button.find('.like-icon')

// alert(like_token);
        // alert(productId)


        $.post('/' + productId + '/likes', {product_id: productId, _token: like_token}, function (response){
            if(response.success) {
                if(like_icon.css('color') === 'rgb(255, 165, 0)') {
                    like_icon.css('color', '#b4b4b4'); 
                } else {
                    like_icon.css('color', 'rgb(255, 165, 0)');
                }
            }
        });
    })
    })