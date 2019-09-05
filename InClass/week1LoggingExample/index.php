<?php include("ConfigReader.php");
include("DBLoggerFactory.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Brent Presley">
	<meta name="description" content="Unit 2 Total Inclass Sample">
	<meta name="keywords" content="Unit 2">
	<title>Total Weight Calculator</title>
	
	<script type="text/javascript" src="javascript/weights.js"></script>
	<script type="text/javascript" src="javascript/toTitleCase.js"></script>
	<script type="text/javascript" src="javascript/IntegerKeyPress.js"></script>
	<script type="text/javascript" src="javascript/FormatNumber.js"></script>
	<script type="text/javascript" src="javascript/isDate.js"></script>
	<script type="text/javascript" src="javascript/DateFormat.js"></script>
	<style type='text/css'>
		#header {text-align:center;}
		
		#main	{clear:both}
		
		#footer { }
		
		form {
			clear:both;
			padding: 10px;
			min-width:550px;
		}
		
		label {
			text-align:right;
			float: left;
			width: 12em;
			padding-right: .5em;
			vertical-align:top;
		}
		
		input, select, textarea, fieldset {
			margin-bottom:.5em;
		}
		
		br {
			clear:both;
		}
		
		
		.numberInputStyle {
			text-align:right;
		}
		
	</style>
</head>

<body>


	<div id="header">
		<img src='images/scale.png' width='146' height='168' alt='Scale image' style='float:left'>
		<img src='images/scale.png' width='146' height='168' alt='Scale image' style='float:right'>
		<h1>Total Weight Calculator</h1>
	</div>
	<div id="main">
		<form id='frmWeight' method='post' action='results.php'>
			<label for='txtItemName'>Item name:</label>
			<input type='text' name='itemName' id='txtItemName' size='15'>
         <img src="images/Error.gif" id="errItemName" width="14" height="14" alt="Error icon" style="visibility:hidden; margin-left:5px;">
			<br>
			
			<label >Weight of one item:</label>
			<input type='number' name='itemWeightLb' id='numItemWeightLb' size='10' class='numberInputStyle'> Lbs
			<img src="images/Error.gif" id="errItemWeightLb" width="14" height="14" alt="Error icon" style="visibility:hidden; margin-left:5px;">
			<input type='number' name='itemWeightOz' id='numItemWeightOz' size='10' class='numberInputStyle'> Oz
			<img src="images/Error.gif" id="errItemWeightOz" width="14" height="14" alt="Error icon" style="visibility:hidden; margin-left:5px;">
			<br>
			
			<label for='txtNumberOfItems'>Number of this item:</label>
			<input type='number' name='numberOfItems' id='numNumberOfItems' size='10' class='numberInputStyle'>
			<img src="images/Error.gif" id="errNumberOfItems" width="14" height="14" alt="Error icon" style="visibility:hidden; margin-left:5px;">
			<br>
			
			<label for='dtpSampleDate'>Sample date:</label>
			<input type='date' name='sampleDate' id='dtpSampleDate'>
			<img src="images/Error.gif" id="errSampleDate" width="14" height="14" alt="Error icon" style="visibility:hidden; margin-left:5px;">
			<br>
			
			<label>&nbsp;</label>
			<button type='submit' class='buttonStyle' id='btnSubmit' name='btnSubmit'>Show Total Weight</button>
			<button type='reset' class='buttonStyle' id='btnReset' name='btnReset'>Start Over</button>
		</form>
	</div>




<?php

echo "starting logging code";


    // creates an instance of the singleton class ConfigReader
    // and gets the logging type
    $cfgReader = ConfigReader::getInstance();
    $loggingtype = $cfgReader->getConfigData('loggingtype');

    $loggerFactory = null;
    try
    {
        // if loggingtype is file, create an instance of TextLoggerFactory
        if ($loggingtype == 'file')
        {
            $loggerFactory = new TextLoggerFactory();
        }
        // if loggingtype is database, create an instance of DBLoggerFactory
        else if ($loggingtype == 'database')
        {
            $loggerFactory = new DBLoggerFactory();
        }
        // gets the logger
        $logger = $loggerFactory->getLogger();
        // calls the write error method
        $logger->error("This is a test error message");
    }
    catch(Exception $ex)
    {
        echo "Caught exception", $ex->getMessage(), "\r\n";
    }


    ?>
	

<div id="footer">
	</div>
	
</body>

</html>