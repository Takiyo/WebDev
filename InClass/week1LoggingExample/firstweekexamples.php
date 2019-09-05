<?php echo "<h1>beginning insertion of html as text \n </h1>  <h1> welcome to the program </h1>" ?>
	<?php  $itemWeightLb = 33;  ?>
    <p> Item weight:  <strong> <?php   echo $itemWeightLb;  ?> </strong></p>

<?php $Brent = "Brent" .  " Presley";  ?>
    <p> First Name:  <?php  echo $Brent;  ?></p>

<?php  /********
 *  all kinds of php comments
 *
 *
 * */



//set and print out variables
	$num = 5;
	$location = " stevens point";
	 $format = 'there are %d monkeys in the %s';
	 echo sprintf($format, $num, $location);

	//dates

	echo '<br> <br> beginning of the date items  <br>';
	// Prints something like: Monday
	echo date("l");

	// Prints something like: Monday 23rd of August 2017 03:12:46 PM
	echo '<br>';
	echo date('l jS \of F Y h:i:s A');
	echo '<br>';

	// Prints: July 1, 2000 is on a Saturday
	echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));  //mktime -> gets a unix timestap for a date
	echo '<br>';

	/* use the constants in the format parameter */
	// prints something like: Wed, 25 Sep 2013 15:28:57 -0700
	echo date(DATE_RFC2822);
	echo '<br>';

	// prints something like: 2000-07-01T00:00:00+00:00
	echo date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
	echo '<br>';
	echo '<br>';


	echo "Today is " . date("Y/m/d") . "<br>";
	echo "Today is " . date("Y.m.d") . "<br>";
	echo "Today is " . date("Y-m-d") . "<br>";
	echo "Today is " . date("l");
	echo '<br>';
	echo "The time is " . date("h:i:sa");
	echo '<br>';
	echo '<br> crate a date with mktime <br>';
	$d=mktime(11, 14, 54, 8, 12, 2014);
	echo "Created date is " . date("Y-m-d h:i:sa", $d);

	echo '<br> converting a string to a date <br>';
	$d=strtotime("10:30pm April 15 2014");
	echo "Created date is " . date("Y-m-d h:i:sa", $d);
	echo '<br>';
	echo '<br>';
	$d=strtotime("tomorrow");
	echo date("Y-m-d h:i:sa", $d) . "<br>";

	$d=strtotime("next Saturday");
	echo date("Y-m-d h:i:sa", $d) . "<br>";

	echo '<br> adding days to a date <br>';
	$startdate = strtotime("Saturday");
	$enddate = strtotime("+6 weeks", $startdate);

	while ($startdate < $enddate) {
        echo date("M d", $startdate) . "<br>";
        $startdate = strtotime("+1 week", $startdate);
    }

	echo '<br> how many days until july 4th?  <br>';
	$d1=strtotime("July 04");
	$d2=ceil(($d1-time())/60/60/24);
	echo "There are " . $d2 ." days until 4th of July.";
	echo '<br>';
	echo '<br>';


	echo '<br> what is the date 3 months from now?  <br>';
	$d=strtotime("+3 Months");
	echo date("Y-m-d h:i:sa", $d) . "<br>";
	echo '<br>';

	echo "additional date items <br>";
	$now = new DateTime();
	//Instantiate the class and immediate assign current date and time
	echo "World Trade Center..... <br>";
	$now = new DateTime('2001-09-11 8:46:00');
	$result = $now->format('Y-m-d H:i:s');
	echo "the date was  $result";

	echo '<br> <br>';
	// Time is optional. If not included, set to 12:00:00 am
	$now = date_create();
	$result = $now->format('Y-m-d H:i:s');
	echo "the date today is  $result";


	echo '<br> <br>';
	//Alias for new DateTime( )
	//	  Can also be used with string parameter
	$now->setTime(22, 30, 0);  //10:30 pm
	//$now must be instantiated
	//-> invokes a class method
	$now->setDate(2011, 1, 20);

	echo "the date is now ... " . date_format($now, 'Y-m-d H:i:s');


	echo '<br> <br>date comparisons<br>';

	$copy = clone $now;
	$now->modify('+3 weeks');
	echo "after adding 3 weeks, the modified date is now ... " . date_format($now, 'Y-m-d H:i:s');

	echo '<br> <br>';
	if($now > $copy)
    {
        echo "now is greater than copy because we added 3 weeks to it <br><br>";
    }



	echo "a demo of a while loop<br>";
	$counter =1;
	$message = "";
	while($counter <=5){
        $message = $message . $counter . '|';
        $counter ++;
    }
	echo $message. "<br>";

