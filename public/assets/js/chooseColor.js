var $ = jQuery;
var size;
$('.Size >div').click(function (e) {
    e.preventDefault();
    size = $(this).data('id');
})


$('.chooseColor >div').click(function (e) {
    e.preventDefault();

    let data = {
        color: $(this).data('id'),
        size: size,
        _token: $('meta[name="csrf-token"]').attr('content')
    }

    $.ajax(
        {
            url: '/chooseColor',
            type: 'POST',
            data: data,
            success:(respone)=>{
                console.log(respone); 
                respone = Object.assign({
                    'price': 0,
                    'order': 0,
                    'revenue': 0,
                    'images': [],
                    'stock': 0
                  }, respone)
                //   console.log($('.regular-price'))
                  $('#price').text(respone.price)
                  $('#orderQuantity').text(respone.order)
                  $('#stocks').text(respone.stock)
                  $('#revenue').text(respone.revenue)


            }
        }
    )
})