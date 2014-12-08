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
	$bname=$_POST["bname"];
	$cid=$_POST["cid"];
	$uname = $_SESSION["name"];
	$posts=$_POST['postsByUser'];
	/* Create table doesn't return a resultset */

 
	if($stmt = $mysqli->prepare("INSERT INTO user_posts (uname, bname, cid, postinfo)VALUES (?,?,?,?)")) {
	
	$stmt->bind_param('ssis',$uname, $bname,$cid,$posts);
	
  $stmt->execute();
   echo "<script language='javascript'>alert('abC');</script>";
  echo "<script language='javascript'>window.location='userhomepage.php';</script>";
 
}


else
echo "Unsuccesful";
	

 
?>
</body>
</html>