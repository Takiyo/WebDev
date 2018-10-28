//Version: 2012-11-08

//This function adds a toTitleCase method to the String class.

//To use this script in your page:
//	1. Include a reference to this file in the <head> tag
//     <script type="text/javascript" src="toTitleCase.js"></script>
//                                     (set the path as appropriate)
//
// Sample call:
//      document.writeln(txtName.toTitleCase());
var prepArray = [" and", " the", " for", " to", " in", " a", " an", " at", " from", " by",
                 " or", " if", " of", " up", " nor", " but", " is", " then", " else", " when", " on", " into", " with"];
var specialPattern = /(Mac|Mc|O')[a-z]/g;

String.prototype.toTitleCase = function() {
	if(this!="") {
		var patternWords = /[ -][^\s-]*/g;  //Find all (global) words that follow a space or dash
		var patternFirstWord = /[^\s-]*/;   //Find the first word (never preceded by space, always capped)
		
		var firstWord = String(this.match(patternFirstWord));  //Normally returns single element array, convert to string
		var words = this.match(patternWords); 						 //Array of all matches to this pattern
		
		//Put them back together again
		var newStr = firstWord.charAt(0).toUpperCase() +   //First word
						 firstWord.substr(1);
		if(words) {//might only be one
			for (var w=0; w<words.length;w++) {						//For each of the subsequent words
				if(prepArray.indexOf(words[w])!= -1) {
					//leave prepositions alone
					newStr += words[w];
				} else {
					//Capitalize first letter (in 2nd position, after space or dash)
					newStr += words[w].charAt(0) + words[w].charAt(1).toUpperCase() + words[w].substr(2);
				}//end if
			}//end for
		}//end if
		
		//All words are capitalized replace specials with special + uppercase
		//ShowMatches(newStr);
		newStr = capSpecial(newStr);
	}//end if	
   return newStr;
} //toTitleCase

//This function determines if the string sent as parameter is in the array of special name prefixes.
//If so the character after the special prefix is capitalized.
function capSpecial(str) {  //String with words capitalized
	//Don't know how to put array/variable inside an regular expression (yet)
	
	str = str.replace(specialPattern,   
							function(capLast) {				//Note function is 2nd parameter of replace. Gets called for every match
									//Should be the prefix                Upper case char after prefix
									return capLast.substr(0, capLast.length-1) + capLast.substr(capLast.length-1).toUpperCase();
							}//end function
		);//end replace
   return str;
}//end capSpecial



