//Version: 2011-11-17

//This function generates a random number between
//min and max and returns it to the caller.

//The first parameter(min) is optional. If omitted, 0 is used.
//
//Sample call:
//     newNumber = GetRandom(5,10);
//	   newNumber = GetRandom(100);  //0-100
function GetRandom(max) {
	var min;				//minimum number to generate
	if(arguments.length==2) {
		min = arguments[0];
		max = arguments[1];
	} else {
		//1 parameter sent
		min = 0;
	}//endif
	return Math.floor(Math.random() * (max - min + 1) + min);
}//end GetRandom
