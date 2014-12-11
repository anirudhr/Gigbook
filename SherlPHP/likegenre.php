<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gigbook: Genres</title>
</head>

<body>
<?php
	include "connectdb.php";
	$gname=$_POST["gname"];
	$uname=$_SESSION['name'];
	/* Create table doesn't return a resultset */

 
	if($stmt = $mysqli->prepare("INSERT INTO rel_user_likes_genre (uname, gname)VALUES (?,?)")) {
	
	$stmt->bind_param('ss',$uname, $gname);
	
  $stmt->execute();
  echo "<script language='javascript'>window.location='userLikesGenre.php';</script>";
 
}


else
echo "Unsuccesful";
	

 
?>
</body>
</html>