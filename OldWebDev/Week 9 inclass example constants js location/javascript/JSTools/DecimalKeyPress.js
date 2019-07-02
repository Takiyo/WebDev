//Version: 2011-11-17

	//This JavaScript intercepts keystrokes in a textbox or
	//text area, and ignores all characters EXCEPT 0-9, comma, period.
   //A decimal point is only allowed if one hasn't already been entered
   //unless, the decimal point is selected.
	
	//To use this script in your page:
	//	1. Include a reference to this file in the <head> tag
	//     <script type="text/javascript" src="DecimalKeyPress.js"></script>
	//                                     (set the path as appropriate)
	//
	//  2. Add an onkeypress event handler for the text box or text areas of your choice. 
	
	// You shouldn't have to call getSelectedText directly, but you could if you needed it somewhere
	// else in your JavaScript
	
	//Know issues:
	//   In FF arrow keys become disabled
	//		Arrow keys return keycode 37-40 which are the same as % ' & (   (weird)
	//   User can enter a $, then move to the left of it and enter
	//      additional characters.  I can't seem to find a way to 
	//      detect the cursor position using IE.
	//      Be sure your JavaScript removes excess characters before parsing the value

	
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
	
	
	function DecimalKeyPress(e)
	{

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
			case 46: //Decimal point
					 return (selText.indexOf(".")!=-1 || el.value.indexOf(".")==-1); 
					 //OK if: selection contains .        text does not contain .		
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
			

	}//end DecimalKeyPress
