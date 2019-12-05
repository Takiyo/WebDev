function isNumberKey(evt)
{
	var charCode=(evt.which)? evt.which:event.KeyCode
	if(charCode>31 && (charCode<48 || charCode>57))
	{
		return false;
	}
	return true;
}


function isStringKey(evt)
{
	var charCode=(evt.which)? evt.which:event.KeyCode
	if(charCode>10 && (charCode<65 || charCode>90) && (charCode<97 || charCode>122))
	{
		return false;
	}
	return true;
}

// function requiredField(input) {
//     if (input.value.length < 1) {
//         //red border
//         input.style.borderColor = "#e74c3c";

//     } else if (input.type == "email") {
//         console.log("this is an email type");

//         if (input.value.indexOf("@") != -1 && input.value.indexOf(".") != -1) {
//             //green border
//             input.style.borderColor = "#2ecc71";
//         } else {
//             //red border
//             input.style.borderColor = "#e74c3c";
//         }

//     } else {
//         //green border
//         input.style.borderColor = "#2ecc71";
//     }
// }