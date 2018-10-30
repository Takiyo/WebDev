document.getElementById("genderInput").addEventListener("onblur", isGender);
document.getElementById("ageInput").addEventListener("onkeypress", NumericKeyPress);
document.getElementById("ageInput").addEventListener("onblur", inAgeRange);
document.getElementById("weightInput").addEventListener("onkeypress", NumericKeyPress);
document.getElementById("durationInput").addEventListener("onkeypress", NumericKeyPress);
document.getElementById("heartrateInput").addEventListener("onkeypress", NumericKeyPress);



function isDate(strDate) {
    let aDate = new Date(strDate);   //Try to convert to Date class

    return aDate!="NaN" && aDate!="Invalid Date";
    //      errors that may occur
}





//This JavaScript intercepts keystrokes in a textbox or
//text area, and ignores all characters EXCEPT 0-9, comma

//This function returns the selected text in the field designated in the parameter.
function getSelectedText(aField) {
    var selectedText="";
    if (document.selection) {  //For IE
        var sel
        aField.focus();
        sel = document.selection.createRange();
        selectedText = sel.text;

    } else if(aField.selectionStart || aField.selectionStart=='0') {
        //For Firefox
        var startPos = 	aField.selectionStart;
        var endPos = aField.selectionEnd;

        selectedText = aField.value.substring(startPos, endPos);
    }//endif

    return selectedText;
}//end getSelectedText


function NumericKeyPress(e)
{
    console.log(e);

    e = e || window.event; //FF uses parameter, this is for IE

    var key = e.keyCode || e.which;

    var el = e.srcElement? e.srcElement : e.target;
    var selText = getSelectedText(el);
    switch (key) {
        case 8: //backspace (for FF)  and Tab (for FF)
        case 9: return true; break;

        case 44:  //comma
            return true;   //Commas are allowed anywhere. Be sure to remove them before parsing
            break;
        case 48: //digits
        case 49:
        case 50:
        case 51:
        case 52:
        case 53:
        case 54:
        case 55:
        case 56:
        case 57: return true;
            break;

        default: return false;  //All other keys are not accepted/ignored
    }//end switch


}//end NumericKeyPress


function isGender()
{
    let errorMsg = document.getElementById("genderError");
    let input = firstCharUpper(document.getElementById("genderInput").value);
    let element = document.getElementById("genderInput");

    if (input !== "Male" && input !== "Female" && input !== "Nonbinary") {
        errorMsg.innerHTML = "- Only Male, Female, and Nonbinary are valid inputs.";
        errorMsg.setAttribute("style" , "display:block;");
    } else{
        errorMsg.setAttribute("style" , "display:none;")
    }
}


function firstCharUpper(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}


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


function inAgeRange(lower, upper, element){
    let errorMsg = document.getElementById("ageError");
    if (element.value < lower || element.value > upper){
        errorMsg.InnerHTML = "Age must be within 1 and 150.";
        errorMsg.setAttribute("style" , "display:block;");
    } else{
        errorMsg.setAttribute("style" , "display:none;")
    }
}