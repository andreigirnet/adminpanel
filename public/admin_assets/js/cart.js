jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.btn-delete-cart').click(function (e) {
        e.preventDefault();
        var cart_id = $(this).data('cart-id');
        var cart_url = $(this).attr('href');
        var cart_row = '#cart_row_'+cart_id;
        console.log(cart_row);
        console.log(cart_id);
        $.ajax({
            type: 'DELETE',
            url: cart_url,
            data: {id:cart_id},
            success:function(data){
                $(cart_row).fadeOut('slow');
            }
        })
    });

});
