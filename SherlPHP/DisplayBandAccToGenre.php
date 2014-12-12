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
						<li><a href="#"> <?php echo "<img src='users/$uname.jpg' style='width:32px; height:32px;'title='admin' />"
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
            <h2>BANDS ACCORDING TO GENRE</h2>
<?php
include "connectdb.php";
$gname=$_GET['gname'];
echo $gname;
if($stmt = $mysqli->prepare("select distinct bname from rel_band_plays_genre where gname = ? ")) {
	
	$stmt->bind_param('s', $gname);
	
  $stmt->execute();
   $stmt->bind_result($bname);
   ?>
   <center>
   <table border ="0" cellspacing="20" >
 <tr >
 <td width="100%" colspan="4" >
    <?php echo "<center><img src='images/genre/$gname.jpg' width='300px' height='300px'/></center>";?>
    </td>
    </tr>
   
   <tr>
   <?php
    while ($stmt->fetch()) {?>
	<td width="25%"><?php echo "<img src='images/band/$bname.jpg' style='width:100px; height:100px;'/>";?></td>
    <td width="25%"><a href=""><?=$bname;?></a> </td>
    <td width="25%"><input type="submit" value="BECOME A FAN" /></td>
    <td width="25%"><input type="button" value="CHECK THEIR PAGE"/></td>
   	
    <?php
	}
	
	?>
    </tr>
    </table>
    </center>
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

