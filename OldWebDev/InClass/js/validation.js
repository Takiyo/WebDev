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




//great artical on how to pull the broswer's errors and then display these fields when the end user tries submitting the form https://www.tjvantoll.com/2012/08/05/html5-form-validation-showing-all-error-messages/

var createAllErrors = function() {
    var form = $( this ),
        errorList = $( "ul.errorMessages", form );

    var showAllErrorMessages = function() {
        errorList.empty();

        // Find all invalid fields within the form.
        var invalidFields = form.find( ":invalid" ).each( function( index, node ) {

            // Find the field's corresponding label
            var label = $( "label[for=" + node.id + "] "),
                // Opera incorrectly does not fill the validationMessage property.
                message = node.validationMessage || 'Invalid value.';

            errorList
                .show()
                .append( "<li><span>" + label.html() + "</span> " + message + "</li>" );
        });
    };

    // Support Safari
    form.on( "submit", function( event ) {
        if ( this.checkValidity && !this.checkValidity() ) {
            $( this ).find( ":invalid" ).first().focus();
            event.preventDefault();
        }
    });

    $( "input[type=submit], button:not([type=button])", form )
        .on( "click", showAllErrorMessages);

    $( "input", form ).on( "keypress", function( event ) {
        var type = $( this ).attr( "type" );
        if ( /date|email|month|number|search|tel|text|time|url|week/.test ( type )
            && event.keyCode == 13 ) {
            showAllErrorMessages();
        }
    });
};

$( "form" ).each( createAllErrors );

function isValidDate(dateString)
{
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[1], 10);
    var month = parseInt(parts[0], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};