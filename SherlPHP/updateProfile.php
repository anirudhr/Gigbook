<?php
// Start the session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body >
<?php
require("connectdb.php");
$uname = $_SESSION['name'];
$pwd=$_POST["pass"];
	$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];
	$city=$_POST["city"];
	$email=$_POST["uemail"];
	$dob=$_POST["DOB"];
 ?>
 <body>
<div id="wrapper" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto;"> 
 
  <div id="inner-1" style="float:left; width:60%;border:dotted #CC3300; ">
    WELCOME <?= $uname; ?>
  </div>
 
  <div id="inner-2" style="float:right; width:30%; border:dotted #CC3300;"> 
    <form style="float:right;">
   
    <input type="button" value=" Logout"/>
    </form>
  </div>
</div>
<div id="homebody" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto; ">
	<div id="sidebar" style="float:left; width:29%;border:dotted #CC3300; ">
    	<div id="profile" style=" height:39%;border:dotted #CC3300; ">
   			 <?php echo "<img src='images/user/$uname.jpg' style='width:200px; height:200px;'/>";?>
    	</div>
         <div id="linklist" style=" height:59%;border:dotted #CC3300; ">
        	 <a href="profile.php" style="text-decoration:none;">Profile</a><br />
   			 <a href="userFollows.php" style="text-decoration:none;">Follow</a><br />
             <a href="userLikesGenre.php" style="text-decoration:none;" >Genre</a><br />
             <a href="userLikesBands.php" style="text-decoration:none;">Bands</a><br />
             <a href="userLists.php" style="text-decoration:none;">Lists</a>
             
			 
    	</div>
  </div>
 
  <div id="inner-2" style="float:right; width:68%; border:dotted #CC3300;"> 
    	<?php 
		

if($stmt = $mysqli->prepare("update user
       set email='$email', firstname='$firstname', lastname='$lastname', password='$pwd',birthdate='$dob'
	   where uname=?" )) {
	
	$stmt->bind_param('s', $uname);
	
  $stmt->execute();

}?>
<form >
<table border="0">
<tr>
<td><label>Firstname:</label></td>
<td><label><?=$firstname;?></label></td>
</tr>
<tr>
<td><label>Lastname</label></td>
<td><label><?=$lastname;?></label></td>
</tr>
<tr>
<td><label>Birthdate</label></td>
<td><label><?=$dob;?></label></td>
</tr>
<tr>
<td><label>City</label></td>
<td><label><?=$city;?></label></td>
</tr>
<tr>
<td><label>Email</label></td>
<td><label><?=$email;?></label></td>
</tr>
<tr>
<td><label>Password</label></td>
<td><label><?=$pwd;?></label></td>
</tr>


</table>
</form>
  
  </div>
</div>
</body>
</html>