//Version: 2012-11-11

//This function creates a list of all the elements of a page that are of the type
//specified in the 'list' parameter.  The obj parameter could be used to designate
//which form object to search.

//To include this script in your HTML, simply import it:
//    <script type="text/javascript" src="GetElementsByTags.js"></script>
//                                        (include path here)

//No other code need be included except a call to the getElementsByTagNames. 

//Sample calls:
//		theList = getElementsByTagNames("input,select,textarea"):    //Note no spaces between tag names
//    theList = getElementsByTagNames("input,select,textarea", frmInputs);    //Only the tags from frmInputs

//Returns an associative array where field name is simply the index and value is the form object.
//for(var i=0; i<theList.length; i++)
//    document.writeln(theList[i].id);   //Display ID of each object found

//for(var i in theList) 
//		document.writeln(theList[i].id);	  //Alternate.  Note must reference the array

function getElementsByTagNames(list,obj) {
	if (!obj) var obj = document;
	var tagNames = list.split(',');
	var resultArray = new Array();
	for (var i=0;i<tagNames.length;i++) {
		var tags = obj.getElementsByTagName(tagNames[i]);
		for (var j=0;j<tags.length;j++) {
			resultArray.push(tags[j]);
		}//end for j
	}//end for i
	return resultArray;
}//end getElementsByTagNames

