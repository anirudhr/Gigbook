<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include "connectdb.php";
	$listname=$_POST['lname'];
	$cid=$_POST['checkbox2'];
	$uname=$_SESSION['name'];
	

	
	/* Create table doesn't return a resultset */
	

	if($stmt = $mysqli->prepare("INSERT INTO rel_recolist_contains_concert (lname, cid)VALUES (?,?)")) {
		$stmt->bind_param("ss",$listname,$cid);
	
	
	
  foreach($_POST["checkbox2"] as $cid) {
	  
	  $stmt->execute();
  echo $cid;}
 
echo "<script language='javascript'>window.location='userLists.php';</script>";
	

	}
else
echo "Unsuccesful";
	

 
?>
</body>
</html>