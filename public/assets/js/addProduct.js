const $ = jQuery;

// $('#variable-product-image-input').on('change', function () {
//     var file = $(this).prop('files')[0];
//     console.log(file);
//     var reader = new FileReader();
//     reader.onload = function () {
//         var dataURL = reader.result;
//         $('#product-variable-img').attr('src', dataURL);
//     };
//     reader.readAsDataURL(file); 
// });  




$(document).ready(function () {
    $('#add-section-btn').click(function () {
        const newSection = $('.productVariable').first().clone(false);

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
                if ($(this).attr('type') === 'file') {
                    variation[$(this).attr('name')] = $(this)[0].files[0];
                } else {
                    variation[$(this).attr('name')] = $(this).val();
                }
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
    formData.delete('variable_img');

    // JSON.stringify(formData);

    for (var i = 0; i < variations.length; i++) {
        var variationName = 'variations_' + i;
        if (variations[i]['variable_img']) {
            formData.append(variationName + '_img', variations[i]['variable_img']);
        }
        formData.append('variations_' + i, JSON.stringify(variations[i]));
    }
    console.log(formData.get('variations_0'));
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

// Listen for changes on the file input
// $(document).on('change', '.variable-img-input', function () {
//     var file = $(this).prop('files')[0];
//     var reader = new FileReader();

//     reader.onload = function () {
//         var dataURL = reader.result;
//         // Get the index of the variation
//         var index = $(this).data('variation-index');
//         // Update the corresponding image src
//         $('#product-variable-img-' + index).attr('src', dataURL);
//     };

//     reader.readAsDataURL(file);
// });

// $(document).ready(function () {
//     $('#add-section-btn').click(function () {
//         const newSection = $('.productVariable').first().clone(true);

//         // Clear input values
//         newSection.find('input').val('');
//         // Update the variation index for the cloned element
//         var index = $('.productVariable').length;
//         newSection.find('.variable-img-input')
//             .data('variation-index', index)
//             .attr('id', 'variable-image-input-' + index);
//         newSection.find('.variable-img')
//             .attr('id', 'product-variable-img-' + index);

//         $('.product-container').append(newSection);
//     });
// });

// $(document).on('click', '.delete-variable', function () {
//     $(this).closest('.card').remove();
// });

// $('#createproduct-form').submit(function (e) {
//     e.preventDefault();
//     var formData = new FormData(this);
//     var variations = [];

//     if ($('.productVariable').length) {
//         $('.productVariable').each(function () {
//             var variation = {};
//             $(this).find('input').each(function () {
//                 variation[$(this).attr('name')] = $(this).val();
//             });
//             // Add the corresponding image src to the variation object
//             var index = $(this).find('.variable-img-input').data('variation-index');
//             variation['img_src'] = $('#product-variable-img-' + index).attr('src');
//             variations.push(variation);
//         });
//     }

//     formData.delete('variable_stock');
//     formData.delete('variable_price');
//     formData.delete('variable_orders');
//     formData.delete('variable_color');
//     formData.delete('variable_size');
//     formData.delete('variable_discount');
//     formData.delete('variable_img');

//     JSON.stringify(formData);

//     for (var i = 0; i < variations.length; i++) {
//         formData.append('variations_' + i, JSON.stringify(variations[i]));
//     }

//     $.ajax({
//         url: '/add-product',
//         type: 'POST',
//         data: formData,
//         contentType: false,
//         processData: false,
//         headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
//         success: function (data) {
//             console.log(data);
//         }
//     })
// });