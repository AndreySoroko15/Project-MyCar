$(document).ready(function() {
    $('.like_button').on('click', function(e) {
        e.preventDefault();
        let productId = $(this).closest('.like_form').find('#like_product_id').val();
        let like_token =$("#like_token").val();
        let like_icon = $(this).find('.like-icon')

        $.ajax({
            type: 'POST',
            url: 'http://mycar/' + productId + '/likes', 
            headers: {
                'X-CSRF-TOKEN': like_token,
            },
    
            }).done(function() {
                if(like_icon.css('color') === 'rgb(255, 165, 0)') {
                    like_icon.css('color', '#b4b4b4'); 
                } else {
                    like_icon.css('color', 'rgb(255, 165, 0)');
                }

                updatedFavCount();
            })
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
