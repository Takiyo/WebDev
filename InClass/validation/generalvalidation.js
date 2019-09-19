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