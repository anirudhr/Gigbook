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
        	<div class="circular"><?php echo "<img src='images/user/$uname.jpg' style='width:200px; height:200px;'/>";?></div>
   			 
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
		$result=$mysqli->query("Select * from user where uname='$uname'");
	if(! $result)
{
	die("Error");
}
$row_cnt = $result->num_rows;
if($row_cnt==0)
{
		echo "No result";
	
}
else
{  
while($row=$result->fetch_assoc())
	{
		 	 	 	 	
		
		$user=$row["uname"];
		$email=$row["email"];
		
		$pwd=$row["password"];
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$city=$row["city"];
	
	$birthdate=$row["birthdate"];
	}
     
	
}



?>
<form action="updateProfile.php" method="post">
<table border="0" width="100%">
<tr>
<td><label>Firstname</label></td>
<td><input type="text" value="<?= $firstname; ?>" name="fname" id="fname"/></td>
</tr>
<tr>
<td><label>Lastname</label></td>
<td><input type="text" value="<?= $lastname; ?>" name="lname" id="lname"  size="25" maxlength="25"/></td>
</tr>
<tr>
<td><label>Birthdate</label></td>
<td><input type="text" value="<?= $birthdate; ?>" name="DOB" id="DOB"  size="25" maxlength="25"/></td>
</tr>
<tr>
<td><label>City</label></td>
<td><input type="text" value="<?= $city; ?>" name="city" id="city"  size="25" maxlength="25"/></td>
</tr>
<tr>
<td><label>Email</label></td>
<td><input type="text" value="<?= $email; ?>" name="uemail" id="uemail"  size="25" maxlength="25"/></td>
</tr>
<tr>
<td><label>Password</label></td>
<td><input type="password" value="<?= $pwd; ?>" name="pass" id="pass"  size="25" maxlength="25"/></td>
</tr>
<tr>
<td><label>Confirm Password</label></td>
<td><input type="password" value="<?= $pwd; ?>" name="cpass" id="cpass"  size="25" maxlength="25"/></td>
</tr>
<tr><td><input type="submit" value="update"/></td></tr>
</table>
</form>
  
  </div>
</div>
</body>
</html>