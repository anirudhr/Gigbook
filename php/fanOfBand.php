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
	$band=$_GET['band'];
	echo $band;
	$uname=$_SESSION['name'];
	echo $uname;
	
	/* Create table doesn't return a resultset */
	if ($stmt1 = $mysqli->prepare("select distinct b.bname from band b where b.bname like ?")) {
	echo "in 1";
	$stmt1->bind_param("s", $band);
  $stmt1->execute();
   $stmt1->bind_result($bname);
   while ($stmt1->fetch()) {
	$bandname = $bname;
   }
 echo $bandname;
	if($stmt2 = $mysqli->prepare("INSERT INTO rel_user_fan_band (uname, bname, becamefandate)VALUES (?,?,now())")) {
	echo "statement 2 executed";

	$stmt2->bind_param('ss',$uname, $bandname);
	
  $stmt2->execute();
  echo "<script language='javascript'>javascript:history.go(-1)</script>";
 

	}
else
echo "Unsuccesful";
	}
else
echo "Unsuccesful";
	

 
?>
</body>
</html>