//Version: 2011-11-17

onerror=handleErr;  //Handle all page errors

//This function allows your JavaScript errors to be displayed
//WITHOUT having to enable the feature in the browser.

//Place a reference to this file in your page's header and this
//function will display all errors.
//    <script type="text/javascript" src="errorHandler.js"></script>
//                                        (include path here)

//You don't need to include any other code!!
//Note: I find Firefox error messages more explicit and clear.
//      If you can't determine the problem from an IE error message, try FF.
function handleErr(msg,   //Error message provided by browser
                   url,   //File with the error in it
                     l)   //Line number of the error.
{
	var txt="";
	txt="There was an error on this page.\n\n";
	txt+="Error: " + msg + "\n";
	txt+="URL: " + url + "\n";
	txt+="Line: " + l + "\n\n";
	txt+="Click OK to continue.\n\n";
	alert(txt);
	return true;
}//end handleErr
