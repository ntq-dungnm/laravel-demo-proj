const $ = jQuery;


$('#createproduct-form').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
        url: '/add-category',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
        success: function (data) {
            console.log(data);
        }
    });
})

