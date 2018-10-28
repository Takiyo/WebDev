function getRandom(max) {
	if(arguments.length==1) {
		min = 0;
		//max is defined as the parameter
	} else {  //expect 2
		min = arguments[0];
		max = arguments[1];
	}
	return  Math.floor(Math.random() * (max - min + 1) + min);

}//end getRandom

function getRandom2(min,max) {
	//if(arguments[1]===undefined) {  //works!!
	if(max === undefined) {
		max = min;  //First parameter actually contains max
		min = 0;
	} else {  //expect 2
		min = arguments[0];
		max = arguments[1];
	}
	return  Math.floor(Math.random() * (max - min + 1) + min);

}//end getRandom2

function avg() {
	var total = 0;
	var len = arguments.length;  //Number of items in the list
	//for(n=0; n<len; n++) {
	for(var index in arguments) {
		total += arguments[index];
	}//end for
	
	return total / len;
}


function average() {
	//Note: numbers is a global array
	var total = 0;
	var len = numbers.length;  //Number of items in the list
	//for(n=0; n<len; n++) {
	for(var index in numbers) {
		total += numbers[index];
	}//end for
	
	return total / len;

}

//this is a Constructor, so by convention is named using upper case letter
//The constructor function is the prototype for Person objects.
function Person(first, last, age, eyecolor) {
	this.firstName = first;
	this.lastName = last;
	this.age = age;
	this.eyeColor = eyecolor;
}


















