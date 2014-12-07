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
	$band="%{$_POST['bname']}%";

	$uname=$_SESSION['name'];
	
	
	/* Create table doesn't return a resultset */
	if ($stmt1 = $mysqli->prepare("select distinct b.bname from band b where b.bname like ?")) {
	
	$stmt1->bind_param("s", $band);
  $stmt1->execute();
   $stmt1->bind_result($bname);
   while ($stmt1->fetch()) {
	$bandname = $bname;
   }
 
	if($stmt2 = $mysqli->prepare("INSERT INTO rel_user_fan_band (uname, bname, fdate)VALUES (?,?,now())")) {
	echo "statement 2 executed";
echo $uname;
echo $bandname;
	$stmt2->bind_param('ss',$uname, $bandname);
	
  $stmt2->execute();
  echo "<script language='javascript'>window.location='userLikesBands.php';</script>";
 

	}

	}
else
echo "Unsuccesful";
	

 
?>
</body>
</html>