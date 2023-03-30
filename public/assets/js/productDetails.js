const $ = jQuery;

const getProductColor = $('.chooseColor > div')
const getProductSize = $('.Size > div')
var thisProduct = {
    size: 'm',
    color: 'blue'
}

sendData(thisProduct);

getProductColor.click(function (e) {
    const productColor = $(this).data('id');
    thisProduct.color = productColor;
    sendData(thisProduct);
})

getProductSize.click(function (e) {
    const productSize = $(this).data('id');
    thisProduct.size = productSize;
    sendData(thisProduct)
})

function sendData(data) {
    $.ajax({
        url: '/chooseColor',
        type: 'POST',
        data: data,
        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
        success: (respone) => {
            respone = Object.assign({
                'price': 0,
                'orders': 0,
                'revenue': 0,
                'images': 0,
                'stocks': 0
            }, respone);
            $('#price').text(respone.price);
            $('#orderQuantity').text(respone.order);
            $('#stocks').text(respone.stock);
            $('#stocks').text(respone.revenue);
        }
    })
}


