<?php
/* This function accepts a string and determines if it is a valid date.
	 */
	function isDate($date)
	{
		try
		{
			$d = new DateTime($date);
			return true;
		}
		catch (Exception $e)
		{
			return false;
		}
    }
    
    function toTitleCase($title) {
		// Array of 'small words' which shouldn't be capitalized if
		// they aren't the first word. Add/remove words as needed.
		$smallwordsarray = array("and","the","for","to" ,"in","a","at","from","by","an","or","if","of","up",
								 "nor","but","is","then","else","when","on","off","out","over","into","with");
		
		// Split the string into separate words
		$words = explode(' ', $title);
		
		foreach ($words as $key => $word) {
			// If this word is the first, or it's not one of our small words, capitalize it with ucwords().
			if (($key == 0) or (!in_array($word, $smallwordsarray))) {
				$words[$key] = ucwords($word);
			}// end if
		}// end foreach
			
		// Join the words back into a string
		$newtitle = implode(' ', $words);
		
		return $newtitle;
	}// end toTitleCase
