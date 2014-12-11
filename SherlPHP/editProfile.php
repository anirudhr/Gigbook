<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Gigbook: Edit Profile</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
   		 <!----font-Awesome----->
   		<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
   		<!----font-Awesome----->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
	</head>
	<body>
    <?php
require("connectdb.php");
require("user_homepage_functions.php");
$uname = $_SESSION['name'];

 ?>
		<!-----container----->
		<div class="container">
			<div class="top-header">
				<!----script-for-sidepanle-nav---->
				<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
			  <script type="text/javascript" src="js/jquery.mmenu.js"></script>
			  <script type="text/javascript">
					//	The menu on the left
					$(function() {
						$('nav#menu-left').mmenu();
					});
				</script>
				<!--//script-for-sidepanle-nav---->
				<div id="page">
					<div id="header">
						<a href="#menu-left"> </a>
					</div>
					<nav id="menu-left">
						<ul>
							
							<li class="active" ><a href="userHome.php">Home</a></li>
							<li ><a href="profile.php">Profile</a></li>
							<li ><a href="userFollows.php">Users you follow</a></li>
							<li><a href="userLikesGenre.php">Genres you like</a></li>
							<li><a href="userLikesBands.php">Bands you like</a></li>
                            <li><a href="userLists.php">Recommendation Lists</a></li>
						</ul>
					</nav>
				</div>
				<div class="logo">
					<span>Dashboard </span>
				</div>
				<!---usernotifications---->
				<div style="float:right; width:100px;"> <a href="userHome.php"> <?php echo "<img src='images/band/$uname.jpg' style='width:50px; height:32px;'title='admin' alt='HOME' />"
 ?></a> <a href="logout.php"><img src="images/logout.png" alt="LOGOUT"/></a></div>
				<div class="clearfix"> </div>
				<!--//usernotifications---->
			</div>
			<div class="clearfix"> </div>
			<!------ content ----->
			<div class="content">
            <div style="background-color:#FFF">
            <h2>EDIT PROFILE</h2>
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
<td><input type="text" value="<?= $firstname; ?>" name="fname" id="fname"   size="25" maxlength="25"/></td>
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
<tr><td></td><td><input type="submit" value="update"/></td></tr>
</table>
</form>
  
  </div>
			</div>
			<!---- //content ----->
			
		</div>
		<!---//container----->
	</body>
</html>

