<?php
if(isset($_POST['signup']))
{
	error_reporting(1);

    $Email=$_POST['email'];



	// PDO
	$dsn = "mysql:host=localhost;dbname=tbrytowski;charset=utf8mb4";
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];

    $pdo = new PDO($dsn, "root", "", $options);
    $sql = "select * from users where Email = :email";
    $stmt = $pdo->prepare($sql);
    $parameters = array(':email' => $email);
    $stmt->execute($parameters);


    //mysql_connect("localhost","root","");
    //mysql_select_db("faceback");

	//$que1=mysql_query("select * from users where Email='$Email'");
	//$count1=mysql_num_rows($que1);


	if($stmt->rowCount()>0)
	{
		echo "<script>
				alert('There is an existing account associated with this email.');
			</script>";
	}
	else
	{
		$Name=$_POST['first_name'].' '.$_POST['last_name'];
		$Password=$_POST['password'];
		$Gender=$_POST['sex'];
		$Birthday_Date=$_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
		$FB_Join_Date=$_POST['fb_join_time'];
		
		$day=intval($_POST['day']);
		$month=intval($_POST['month']);
		$year=intval($_POST['year']);
		if(checkdate($month,$day,$year))
		{
			//$que2=mysql_query("insert into users(Name,Email,Password,Gender,Birthday_Date,FB_Join_Date) values('$Name','$Email','$Password','$Gender','$Birthday_Date','$FB_Join_Date')");

            $sql = "insert into users (Name,Email,Password,Gender,Birthday_Date,FB_Join_Date) 
                    values (:name, :email, :password, :gender, :birthday_date, :fb_join_date)";
            $stmt = $pdo->prepare($sql);
            $parameters = array(':name' => $Name, ':email' => $Email, ':password' => $Password,
                ':gender' => $Gender, ':birthday_date' => $Birthday_Date, ':fb_join_date' => $FB_Join_Date);
            $stmt->execute($parameters);


			session_start();
			$_SESSION['tempfbuser']=$Email;
		
		
			if($Gender=="Male")
			{
				header("location:fb_files/fb_step/fb_step1/Step1_Male.php");
			}
			else
			{
				header("location:fb_files/fb_step/fb_step1/Step1_Female.php");
			}
		}
		else
		{
			echo "<script>
				alert('The selected date is not valid.');
			</script>";
		}
	}
}
?>
