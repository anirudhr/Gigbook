<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include "connectdb.php";
	$uname=$_POST["uname"];
	$pwd=$_POST["pass"];
	$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];
	$city=$_POST["city"];
	$email=$_POST["uemail"];
	$dob=$_POST["DOB"];
	/* Create table doesn't return a resultset */
if($stmt = $mysqli->prepare("INSERT INTO user (uname, lastname, firstname, password, lastlogintime,city, birthdate, email,joindate)VALUES (?,?,?,?,now(),?,?,?,now())")) {
	
	$stmt->bind_param('sssssss', $uname,$lastname,$firstname,$pwd,$city,$dob,$email);
	
  $stmt->execute();
}
else
echo "Unsuccesful";
	

 
?>
</body>
</html>