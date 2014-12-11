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
        <script type="text/javascript">
		
		</script>
        
        
	</head>
	<body onload="postFunc()">
   <?php
require("connectdb.php");
require("band_homepage_functions.php");
/*#######################UNCOMMENT WHEN ADDING TO MAIN
if (!isset($_COOKIE['usrcookie'])) {
	echo "<script language='javascript'>window.location='login.php';</script>"; //go back to login page
}

if (!isset($_COOKIE['usrcookie'])) {
	echo "<script language='javascript'>window.location='login.php';</script>"; //go back to login page
}
$bname = $_COOKIE['usrcookie'];
#######################*/
$bname = $_SESSION['name'];
$next_n_concerts_cids = array(); $next_n_concerts_cnames = array(); $next_n_concerts_bnames = array();
$old_concerts_cids = array(); $old_concerts_cnames = array(); $old_concerts_bnames = array();
$linkids = array(); $linkurls = array(); $linkinfos = array();
$gnames = array();
try {
  list($next_n_concerts_cids, $next_n_concerts_cnames, $next_n_concerts_bnames) = get_n_concerts($mysqli, $bname, 'n');
  list($old_concerts_cids, $old_concerts_cnames, $old_concerts_bnames) = get_n_concerts($mysqli, $bname, 'old');
  list($linkids, $linkurls, $linkinfos) = get_n_band_links($mysqli, $bname);
  $gnames = get_band_genres($mysqli, $bname);
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
  exit();

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
				  <div id="header"> <a href="#menu-left"> </a> </div>
				  <nav id="menu-left">
				    <ul>
				      <li class="active" ><a href="bandHomePage.php">Home</a></li>
				      <li ><a href="bandProfile.php">Profile</a></li>
				      <li><a href="bandPlaysGenre.php">Genres you play</a></li>
				      
				      <li><a href="concertPage.php">Announce a new concert</a></li>
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
	}}?>
								<a class="p-btn" href="bandProfile.php">Profile</a>
							</div>
						<!-- //user-profile ---->
						<!---- sign-in-box ---->
						
						<!----//sign-in-box ---->
						<!----up-load-stats---->
						
						<!--//up-load-stats---->
						<!----social-tags---->
							<div class="social-tags">
								<h4>Lets get Social</h4>
								<ul class="list-unstyled list-inline">
									<li class="active"><a href="#"><span><i class="fa fa-facebook"> </i></span></a></li>
									<li><a href="#"><span><i class="fa fa-twitter"> </i></span></a></li>
									<li ><a href="#"><span><i class="fa fa-linkedin"> </i></span></a></li>
									
								</ul>
							</div>
						<!--//social-tags---->
			  </div><!----//End-col-1 ----->
					<!---- col-2 ----->
					<div class="col-2 col-md-3" style="float:right; width:70%; ">
                    <div class="col-2 col-md-3" style="width:55%;  ">
						<!----chat-box---->
						<div class="chat-box">
							<div class="people-on-chat">
								<div class="chat-msg">
                                	 
									
									
							<!----msg-type-box---->
															<form action="bandPostsLinks.php" method="post">

			<label>Link url:</label><input type="text" name="linkurl"style="width:90%;" size="25" /><br/><br>
<label>Link info:</label>

            <textarea rows="2"  placeholder="Post a new link" name="bandlink" style="width:90%;">
           </textarea>
            <input type="submit" value="POST"/>
           </form>
							
							<!--//msg-type-box---->
						</div>
                        </div>
                        </div>
						<div class="clearfix"> </div>
                      
						<!--//chat-box---->
                       
                        
						<!----get-in-touch--->
						<div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Upcoming Concerts</a>
                            <br/><br/>

							<!---->
							 <?php
			

for ($i = 0; $i < $GETCOUNTSMALL && $i < count($next_n_concerts_cids); $i++) {
 
  print "Concert: " . $next_n_concerts_cnames[$i] . "<br/>";
   print "bname: " . $next_n_concerts_bnames[$i] . "<br/>";
  
}?>
						</div>
                      
 <div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Posted links</a>
                            <br/><br/>
<table border="0" width="100%"/>
							<!---->
							 <?php 
for ($i = 0; $i < count($linkids); $i++) {
  echo "<tr>";
  echo "<td width='20%'>Link URL:</td> <td><a href='http://$linkurls[$i]'> $linkurls[$i]</a></td>" ;
  echo "</tr>";
  echo "<tr>";
  echo "<td>Link info:</td> <td>$linkinfos[$i] </td>";
  echo "</tr>";
  echo "<tr><td>....................................</td><td>..........................................................................................................</td></tr>";
}
?>
</table>
</div>
					  </div>
                        
						<!--//get-in-touch--->
						<!---twitter-box-----><!--//twitter-box----->
					<!----//End-col-2 ----->
					<!---- col-3 ----->
					<div class="col-md-6 col-3" style="float:right; width:45%;  ">
						
						<div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Old concerts</a></h3>
                            <br/><br/>

							<!---->
							<?php print  "<br/>";
for ($i = 0; $i < count($old_concerts_cids); $i++) {
  echo "<img src='images/concert_images/$old_concerts_cids[$i].jpg' style='width:100%'/>";
  print "\nConcert Name: " . $old_concerts_cnames[$i] . "<br/>";
  
}
?>
</div><!---col-3-grid-3---->
                      
					
				</div>
			</div>
			<!---- //content ----->
			</div>
		</div>
		<!---//container----->
	</body>
</html>

