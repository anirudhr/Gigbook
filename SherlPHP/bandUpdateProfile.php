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
		<title>Gigbook: Update Profile</title>
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
				  <div id="header"> <a href="#menu-left"> </a> </div>
				  <nav id="menu-left">
				    <ul>
				      <li class="active" ><a href="bandHomePage.php">Home</a></li>
				      <li ><a href="bandProfile.php">Profile</a></li>
				      <li><a href="bandPlaysGenre.php">Genres you play</a></li>
				      <li><a href="userLists.php">Post a new link</a></li>
				      <li><a href="userLists.php">Announce a new concert</a></li>
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
            <br/>

            <h2>PROFILE</h2>
				<?php 
		$bio= $_POST['bio'];

if($stmt = $mysqli->prepare("update band
       set bio='$bio'
	   where bname=?" )) {
	
	$stmt->bind_param('s', $uname);
	
  $stmt->execute();

}?>
<form >
<table border="0">
<tr>
<td width="20%"><label>Band name:</label></td>
<td><label><?=$uname;?></label></td>
</tr>
<tr>
<td valign="top"><label>About:</label></td>
<td><label><?=$bio;?></label></td>
</tr>


</table>
</form>
  
  </div>
			</div>
			<!---- //content ----->
			
		</div>
		<!---//container----->
	</body>
</html>

