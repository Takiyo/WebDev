//onblur function
function requiredField(input) {
    if (input.value.length < 1) {
        //red border
        input.style.borderColor = "#e74c3c";

    } else if (input.type == "email") {
        console.log("this is an email type");

        if (input.value.indexOf("@") != -1 && input.value.indexOf(".") != -1) {
            //green border
            input.style.borderColor = "#2ecc71";
        } else {
            //red border
            input.style.borderColor = "#e74c3c";
        }

    } else {
        //green border
        input.style.borderColor = "#2ecc71";
    }
}

//only allows numbers
function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

        return true;
    }

// prevents numbers and by extension special characters
// TODO: prevent users from pasting them in
function preventNumberInput(e){
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107 ){
        e.preventDefault();
    }
}

$(document).ready(function(){
    $('#text_field').keypress(function(e) {
        preventNumberInput(e);
    });
})