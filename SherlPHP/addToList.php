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
	$listname=$_POST['listname'];
	$gname=$_POST['gname'];
	$uname=$_SESSION['name'];
	

	
	/* Create table doesn't return a resultset */
	if ($stmt1 = $mysqli->prepare("insert into recolist (lname,uname,gname) values(?,?,?)")) {
	echo "st1 executed";
	$stmt1->bind_param("sss", $listname,$uname,$gname);
  $stmt1->execute();
	}

	if($stmt2 = $mysqli->prepare("INSERT INTO rel_recolist_contains_concert (lname, cid)VALUES (:id,:loc)")) {
	$stmt->bindValue(':id', $listname);
$stmt->bindParam(':loc', $cid);
	
	
  foreach($_POST["checkbox2"] as $cid) {$stmt2->execute();
  echo $cid;}
 

	

	}
else
echo "Unsuccesful";
	

 
?>
</body>
</html>