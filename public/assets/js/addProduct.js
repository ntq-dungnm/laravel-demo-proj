const $ = jQuery;

$(document).ready(function () {
    $('#add-section-btn').click(function () {
        const newSection = $('.productVariable').first().clone(true);

        newSection.find('input').val('');

        $('.product-container').append(newSection);
    });
});

const newSection = $('');

$(document).on('click', '.delete-variable', function () {
    $(this).closest('.card').remove();
});

$('#createproduct-form').submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var variations = [];

    if ($('.productVariable').length) {
        var index = 0;
        $('.productVariable').each(function () {
            var variation = {};
            $(this).find('input').each(function () {
                variation[$(this).attr('name')] = $(this).val();
            });
            variations.push(variation);
            ++index;
        });
    }

    formData.delete('variable_stock');
    formData.delete('variable_price');
    formData.delete('variable_orders');
    formData.delete('variable_color');
    formData.delete('variable_size');
    formData.delete('variable_discount');

    JSON.stringify(formData);
    
    for (var i = 0; i < variations.length; i++) {
        formData.append('variations_'+i, JSON.stringify(variations[i]));
    }
    
    $.ajax({
        url: '/add-product',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
        success: function (data) {
            console.log(data);
        }
    })
});