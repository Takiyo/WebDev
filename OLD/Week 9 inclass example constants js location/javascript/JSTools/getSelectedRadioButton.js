/* This function was copied (with slight modification) from 
   Murach's JavaScript and DOM Scripting book (Murach and Associates, 2009)
	
	This function determines which radio button in the group specified in the parameter
	is selected and returns a pointer to that object.
	
	Sample calls
	var selectedButton = getSelectedRadioButton("favColors");
	if (selectedButton) {
		//do stuff with selected button
	} else {
		//no button selected
	}//end if
*/
var getSelectedRadioButton = function (groupName) {
	var buttons = document.getElementsByName(groupName);
	for (var i=0; i<buttons.length; i++) {
		if (buttons[i].checked) {
			return buttons[i];
		}//end if
	}//end for
}//end getSelectedRadioButton