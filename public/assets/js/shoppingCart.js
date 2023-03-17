var $ = jQuery;
var products = [
    {
        name: 'sweater',
        price: 119.99,
        color: 'pink',
        size: 'M',
        quantity: 2,

    },
    {
        name: 'stuff',
        price: 24.99,
        color: 'White',
        size: '350ml',
        quantity: 1,

    },
    {
        name: 'watch',
        price: 94.99,
        color: 'Black',
        size: '32.5mm',
        quantity: 1,

    }
];

$('.decrease').click(function (productName) {
    productName = $(this).data('id');
    products.find(p => p.name == productName).quantity--;
    updateProduct(products);
});


$('.plus').click(function (productName) {
    productName = $(this).data('id');
    products.find(p => p.name == productName).quantity++;
    updateProduct(products);
;
});


function updateProduct(data) {
    $.ajax({
        url: '/update-product',
        type: 'POST',
        data:  JSON.stringify(data), 
        contentType: "application/json",
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: (Response) => {
            console.log(data);
        }
    })
}