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
	$linkname=$_POST["bandlink"];
	$linkurl =$_POST["linkurl"];
	$uname=$_SESSION['name'];
	/* Create table doesn't return a resultset */

 
	if($stmt = $mysqli->prepare("INSERT INTO band_links (bname, linkurl,linkinfo,postedtime)VALUES (?,?,?,NOW())")) {
	echo "in 1";
	$stmt->bind_param('sss',$uname, $linkurl,$linkname);
	echo "NOW()";
  $stmt->execute();
  echo "<script language='javascript'>alert('bandHomePage.php');</script>";
  echo "<script language='javascript'>window.location='bandHomePage.php';</script>";
 
}


else
echo "Unsuccesful";
	

 
?>
</body>
</html>