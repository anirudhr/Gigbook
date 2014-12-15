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
	$followee="%{$_GET['follow']}%";

	$uname=$_SESSION['name'];
	
	
	/* Create table doesn't return a resultset */
	if ($stmt1 = $mysqli->prepare("select distinct u.uname from user u where u.uname like ?")) {
	
	$stmt1->bind_param("s", $followee);
  $stmt1->execute();
   $stmt1->bind_result($followee);
   while ($stmt1->fetch()) {
	$followeename = $followee;
   }
 
	if($stmt2 = $mysqli->prepare("INSERT INTO rel_user_follows_user (follower,followee)VALUES (?,?)")) {
	

	$stmt2->bind_param('ss',$uname,$followeename);
	
  $stmt2->execute();
  echo "<script language='javascript'>javascript:history.go(-1)</script>";
 

	}
	 $stmt2->close();
	$mysqli->close();
	}

	
else
echo "Unsuccesful";
	

 
?>
</body>
</html>
