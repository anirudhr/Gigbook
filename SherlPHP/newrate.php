<?php
session_start();
include ("connectdb.php");
$uname=$_SESSION['name'];
$cid=$_POST['conc'];
$rev=$_POST['review'];
$rate=$_POST['rating'];


if($stmt = $mysqli->prepare("update rel_user_attends_concert set review =? , rating=? where uname=? and cid = ? ")) {
	
	$stmt->bind_param('sssi', $rev,$rate,$uname,$cid);
	
  $stmt->execute();
  echo "<script language='javascript'>javascript:history.go(-1)</script>";

}

 


else
echo "Unsuccesful";
	
	?>