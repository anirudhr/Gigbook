<?php
// Start the session
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

	$usrname=$_POST["bandname"];
	$pswrd=$_POST["password"];
	$_SESSION['name']=$usrname;
	echo $usrname;
	if ($stmt = $mysqli->prepare("select bname, password from band")) {
  $stmt->execute();
  $stmt->bind_result($bname,$password);
  while($stmt->fetch()) {
	
	if($usrname==$bname && $pswrd==$password)
	{
		session_start();
		$_SESSION['id']=1;
		setcookie('smartrs',$usrname,time()+3600);
		echo "<script language='javascript'>alert('Welcome');</script>";
		echo "<script language='javascript'>window.location='hello.php';</script>";
	}
	}
	echo "<script language='javascript'>alert('login failed');</script>";
	echo "<script language='javascript'>window.location='login.php';</script>";
	
}

?>
</body>
</html>