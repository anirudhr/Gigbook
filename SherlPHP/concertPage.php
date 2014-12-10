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
<html >
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
	</head>
	<body>
   <?php
require("connectdb.php");
require("concert_page_functions.php");

$future_concert_cid = 17;
$future_concert_ispast = NULL;
$future_concert_bnames = array();
$future_concert_cname = NULL;
$future_concert_ctime = NULL;
$future_concert_tkturl = NULL;
$future_concert_cover = NULL;
$future_concert_vname = NULL;
$future_concert_url = NULL;
$future_concert_capacity = NULL;
$future_concert_building = NULL;
$future_concert_street = NULL;
$future_concert_city = NULL;
$future_concert_state = NULL;
$future_concert_zip = NULL;

$past_concert_cid = 1;
$past_concert_ispast = NULL;
$past_concert_bnames = array();
$past_concert_cname = NULL;
$past_concert_ctime = NULL;
$past_concert_tkturl = NULL;
$past_concert_cover = NULL;
$past_concert_vname = NULL;
$past_concert_url = NULL;
$past_concert_capacity = NULL;
$past_concert_building = NULL;
$past_concert_street = NULL;
$past_concert_city = NULL;
$past_concert_state = NULL;
$past_concert_zip = NULL;

$past_concert_reviews = array();
$past_concert_ratings = array();
$past_concert_avg_rating = NULL;

try {
  list($future_concert_bnames, $future_concert_cname, $future_concert_ctime, $future_concert_tkturl, $future_concert_cover, $future_concert_vname, $future_concert_url, $future_concert_capacity, $future_concert_building, $future_concert_street, $future_concert_city, $future_concert_state, $future_concert_zip) = get_concert_info($mysqli, $future_concert_cid);
  $future_concert_ispast = is_concert_past($mysqli, $future_concert_cid);
  list($past_concert_bnames, $past_concert_cname, $past_concert_ctime, $past_concert_tkturl, $past_concert_cover, $past_concert_vname, $past_concert_url, $past_concert_capacity, $past_concert_building, $past_concert_street, $past_concert_city, $past_concert_state, $past_concert_zip) = get_concert_info($mysqli, $past_concert_cid);
  $past_concert_ispast = is_concert_past($mysqli, $past_concert_cid);
  list($past_concert_reviews, $past_concert_ratings, $past_concert_avg_rating) = get_past_concert_info($mysqli, $past_concert_cid);
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
  exit();
}
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
				      <li class="active" ><a href="bandHomePage.php">Home</a></li>
				      <li ><a href="bandProfile.php">Profile</a></li>
				      <li><a href="bandPlaysGenre.php">Genres you play</a></li>
				      
				      <li><a href="userLists.php">Announce a new concert</a></li>
			        </ul>
			      </nav>
			  </div>
				<div class="logo">
					<span>Dashboard </span>
				</div>
				<!---usernotifications---->
				<div style="float:right; width:100px;"> <a href="userHome.php"> <?php echo "<img src='images/band/$bname.jpg' style='width:50px; height:32px;'title='admin' alt='HOME' />"
 ?></a> <a href="logout.php"><img src="images/logout.png"/></a> </div>
				<div class="clearfix"> </div>
				<!--//usernotifications---->
			</div>
			<div class="clearfix"> </div>
			<!------ content ----->
			<div class="content" style="margin-left:auto; margin-right:auto;   overflow:auto; ">
			  <div class="3-cols" style="float:left; width:29%;  ">
					

						<!---- user-profile ---->
				<div class="user-profile1 text-center">
                             <?php echo "<img src='images/band/$bname.jpg' style='width:90%' title='name'/>";
							 

include "connectdb.php";

	
	
if ($stmt = $mysqli->prepare("select bname,bio from band  where bname like ?")) {
	
	$stmt->bind_param("s", $bname);
  $stmt->execute();
  $stmt->bind_result($bname,$bio);

	while($stmt->fetch()){
  ?>

								
								<h3><?= $bname ?>   </h3>
								<p><?=$bio; ?> </p>
                                <?php
	}}?>						<a class="p-btn" href="fanOfBand.php?band=<?=$bname;?>">Become a fan!</a>
								
						  </div>
					  <!-- //user-profile ---->
					  <!---- sign-in-box ---->
						
					  <!----//sign-in-box ---->
					  <!----up-load-stats---->
						
					  <!--//up-load-stats---->
					  <!----social-tags----><!--//social-tags---->
			  </div><!----//End-col-1 ----->
					<!---- col-2 ----->
					<div class="abc" style="float:right; width:70%; border:dotted #FF0000 ">
					  <!--//get-in-touch--->
						<!---twitter-box-----><!--//twitter-box----->
                        <div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Upcoming Concerts</a>
                            <br/><br/>

							<!---->
							 <?php
			

print "<b>Future Concert:</b><br/>";
print "ID: ". $future_concert_cid . "<br/>";
print "Is concert past: " . $future_concert_ispast . "<br/>";
print "Band(s): ";
foreach ($future_concert_bnames as $future_concert_bname) {
  print $future_concert_bname . ", ";
}
print "Name: " . $future_concert_cname . "<br/>";
print "Time: " . $future_concert_ctime . "<br/>";
print "URL: " . $future_concert_tkturl ."<br/>";
print "Cover: " . $future_concert_cover ."<br/>";
print "Venue URL: " . $future_concert_url ."<br/>";
print "Venue capacity: " . $future_concert_capacity ."<br/>";
print "Venue name: " . $future_concert_vname ."<br/>";
print "Venue deets: " . $future_concert_building . " " . $future_concert_street . ", " . $future_concert_city . ", " . $future_concert_state . ", " . $future_concert_zip . "<br/>";
?>
						
                        </div>
                        <div class="clearfix"> </div>
                        <div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Old Concerts</a>
                            <br/><br/>

							<!---->
							 <?php
			

print "<b>Past Concert:</b><br/>";
print "ID: ". $past_concert_cid . "<br/>";
print "Is concert past: " . $past_concert_ispast . "<br/>";
print "Band(s): ";
foreach ($past_concert_bnames as $past_concert_bname) {
  print $past_concert_bname . ", ";
}
print "Name: " . $past_concert_cname . "<br/>";
print "Time: " . $past_concert_ctime . "<br/>";
print "URL: " . $past_concert_tkturl ."<br/>";
print "Cover: " . $past_concert_cover ."<br/>";
print "Venue URL: " . $past_concert_url ."<br/>";
print "Venue capacity: " . $past_concert_capacity ."<br/>";
print "Venue name: " . $past_concert_vname ."<br/>";
print "Venue deets: " . $past_concert_building . " " . $past_concert_street . ", " . $past_concert_city . ", " . $past_concert_state . ", " . $past_concert_zip ."<br/>";
print "Average rating: " . $past_concert_avg_rating . "<br/>";
print "Reviews and ratings:<br/>";
foreach ($past_concert_reviews as $index => $review) {
  print $past_concert_ratings[$index] . "/5 | " . $review . "<br/>";
}
?>

<div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Concerts attended</a>
                            <br/><br/>

							<!---->
							 <?php
			

print "<b>Future Concert:</b><br/>";
print "ID: ". $future_concert_cid . "<br/>";
print "Is concert past: " . $future_concert_ispast . "<br/>";
print "Band(s): ";
foreach ($future_concert_bnames as $future_concert_bname) {
  print $future_concert_bname . ", ";
}
print "Name: " . $future_concert_cname . "<br/>";
print "Time: " . $future_concert_ctime . "<br/>";
print "URL: " . $future_concert_tkturl ."<br/>";
print "Cover: " . $future_concert_cover ."<br/>";
print "Venue URL: " . $future_concert_url ."<br/>";
print "Venue capacity: " . $future_concert_capacity ."<br/>";
print "Venue name: " . $future_concert_vname ."<br/>";
print "Venue deets: " . $future_concert_building . " " . $future_concert_street . ", " . $future_concert_city . ", " . $future_concert_state . ", " . $future_concert_zip . "<br/>";
?>
						</div>
					<!----//End-col-2 ----->
					<!---- col-3 ----->
			  </div>
			<!---- //content ----->
			</div>
		</div>
		<!---//container----->
	</body>
</html>

