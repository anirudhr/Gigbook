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
		<title>cyan Flat ui kit Website Template | Home :: w3layouts</title>
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
        <script type="text/javascript">
function showConcerts(){
	document.getElementById("innerhide").style.visibility="visible";
}
</script>
	</head>
	<body>
    <?php
include("connectdb.php");
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
				<div style="float:right">
					<ul class="user-profile list-unstyled">
						<li><a href="#"> <?php echo "<img src='images/user/$uname.jpg' style='width:32px; height:32px;'title='admin' />"
 ?></a>
							
						</li>
					</ul>
					
					<ul class="logout list-unstyled"	>				
                    	<li><a href="logout.php"><span> </span></a></li>

					</ul>
					</ul>
				</div>
				<div class="clearfix"> </div>
				<!--//usernotifications---->
			</div>
			<div class="clearfix"> </div>
			<!------ content ----->
			<div class="content">
            <div style="background-color:#FFF">
            <h2>RECOMMENDATION LISTS</h2>
<form method="post" action="addToList.php">


Choose a list to add to<br/>
<?php require("connectdb.php");

if ($stmt = $mysqli->prepare("select distinct lname from recolist where uname=?")) {
	$stmt->bind_param("s",$uname);
  $stmt->execute();
  $stmt->bind_result($lname);
  echo "<input list='lname' name='lname'>
  <datalist id='lname'>";
  while($stmt->fetch()) {
	$lname = htmlspecialchars($lname);
	echo "<option value='$lname'>$lname</option>\n";	
  }
  echo "</datalist>";
  $stmt->close();
  $mysqli->close();
}
?>
<input type="button" value="SELECT CONCERTS" onclick="showConcerts()"/>
<input type="submit" value="ADD" />
</div>
<div id="innerhide" class="innerhide" style="height:auto; visibility:hidden">

<table border="0" width="100%">

<?php
require("connectdb.php");
if ($stmt = $mysqli->prepare("select cname,cid from concert")) {
  $stmt->execute();
  $stmt->bind_result($cname,$cid);
  while($stmt->fetch()){?>
  <tr>
  <td width="60%"><?= $cname; ?></td>
  <td><input type="checkbox" name="checkbox2[]" value="<?= $cid; ?> "/></td>
  </tr>
<?php
  }?>
  </tr>
  
  </table>
  
  <?php
$stmt->close();
  $mysqli->close();
 }
?>



  </div>
			</div>
			<!---- //content ----->
			
		</div>
		<!---//container----->
	</body>
</html>

