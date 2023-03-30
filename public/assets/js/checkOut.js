const $ = jQuery;
$('.proceedShipping').click(function () {
    if (!emptyValidation($('.fName')) || !emptyValidation($('.lName')) ||
        !emptyValidation($('.phoneNumber')) || !emptyValidation($('.email')) || !emptyValidation($('.address'))) {
        
        } else {
        var thisCustomer = {
            firstName: getValues($('.fName')),
            lastName: getValues($('.lName')),
            phoneNumber: getValues($('.phoneNumber')),
            email: getValues($('.email')),
            address: getValues($('.address')),
        }
    }

})

function emptyValidation(inputfield) {
    if ($(inputfield).find('input').val() == "" || ($(inputfield).find('textarea').val() == "")) {
        $(inputfield).find('small').text("This field is required");
    }
    return inputfield;
}

function getValues(inputfield) {
    let text = inputfield.find('textarea').val();
    if (text == undefined) {
        return inputfield.find('input').val();
    } else {
        return text;
    }
}