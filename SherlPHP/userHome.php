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
		<title>Gigbook: Home</title>
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
include("user_homepage_functions.php");
$uname = $_SESSION['name'];
$next_n_concerts_cids = array(); $next_n_concerts_cnames = array(); $next_n_concerts_bnames = array();
$rand_n_bands_fan = array();
$rand_n_bands_reco = array();
$linkids = array();

try {
  list($next_n_concerts_cids, $next_n_concerts_cnames, $next_n_concerts_bnames) = get_n_concerts($mysqli, $uname);
  $rand_n_bands_fan = get_n_bands_fan($mysqli, $uname);
  //$rand_n_bands_reco = get_n_bands_reco($mysqli, $uname);
  list($linkids, $link_bnames, $linkurls, $linkinfos)=get_n_band_links($mysqli, $uname);
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
				<div style="float:right; width:100px;"> <a href="userHome.php"> <?php echo "<img src='images/user/$uname.jpg' style='width:50px; height:32px;'title='admin' alt='HOME' />"
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
                             <?php echo "<img src='images/user/$uname.jpg' style='width:90%' title='name'/>";
							 

include "connectdb.php";

	$uname =  $_SESSION['name'];
	
if ($stmt = $mysqli->prepare("select firstname,lastname,bio from user  where uname like ?")) {
	
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($fname,$lname,$bio);

	while($stmt->fetch()){
  ?>

								
								<h3><?= $fname ?>    <?=$lname; ?>  </h3>
								<p><?=$bio; ?> </p>
                                <?php
	}}?>
								<a class="p-btn" href="profile.php">Profile</a>
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
					<div class="col-2 col-md-3" style="float:right; width:70%;  ">
                    <div class="col-2 col-md-3" style="width:55%;  ">
						<!----chat-box---->
						<div class="chat-box">
							<div class="people-on-chat">
								<div class="chat-msg">
                                <div class="msg-type-box">
									<?PHP
									if ($stmt = $mysqli->prepare("select u.postinfo, u.bname, c.cname,u.postedtime from user_posts u natural join concert c where u.uname = ?")) {
	
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($postinfo,$bname,$cname,$ptime);

	while($stmt->fetch()){
		
		
								echo "$postinfo";
							
							if($bname)
							echo"  About band:$bname</br>";
							
							if($cname)
							echo"   About concert:$cname</br></br>";
							echo "<span>$ptime</span>";
							}}
							else echo "US";
							?>
								</div>	 
									
									
							<!----msg-type-box---->
							<div class="msg-type-box">
								<form action="postsOnPage.php" method="post">
Choose a band you wanna write about:
<select name='bname'>
<?php include "connectdb.php";

if ($stmt = $mysqli->prepare("select distinct bname from band ")) {
	
  $stmt->execute();
  $stmt->bind_result($bname);
  echo "<option value=' '></option>\n";
  while($stmt->fetch()) {
	$bname = htmlspecialchars($bname);
	echo "<option value='$bname'>$bname</option>\n";	
  }
  $stmt->close();
  $mysqli->close();
}
?>
</select>
<br /><br />

Choose a concert you wanna write about:
<select name='cid'>
<?php include "connectdb.php";

if ($stmt = $mysqli->prepare("select cname, cid from concert ")) {
	
  $stmt->execute();
  $stmt->bind_result($cname,$cid);
  echo "<option value=' '></option>\n";
  while($stmt->fetch()) {
	$cname = htmlspecialchars($cname);
	$cid = htmlspecialchars($cid);
	echo "<option value='$cid'>$cname</option>\n";	
  }
  $stmt->close();
  $mysqli->close();
}
?>
</select>
<br /><br />

            <textarea rows="4"  placeholder="write something to post" name="postsByUser" style="width:90%;">
           </textarea>
            <input type="submit" value="POST"/>
           </form>
							</div>
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
  print "Band: " . $next_n_concerts_bnames[$i] . "<br/><br/>";
}?>
						</div>
                        <div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Links posted by bands</a></h3>
                            <br/><br/>

							<!---->
							 <?php
							 $GETCOUNTSMALL = 3;
			
for ($i = 0; $i < $GETCOUNTSMALL&& $i< count($linkids); $i++) {
  
  print "\tBand Name: " . $link_bnames[$i] . "<br/>";
  echo "\tLink URL: <a href='http://$linkurls[$i]'> $linkurls[$i]</a><br/>" ;
  echo "\tLink info: " . $linkinfos[$i] . "<br/><br/>";
}
?>
						</div>
                        
						<!--//get-in-touch--->
						<!---twitter-box----->
						<div class="twitter-box">
							<div class="twitter-box-head">
								<h3><span> </span>Latest Posts</h3>
								<div class="get-in-touch"">
									<div class="twitts-stat-grid">
                                    <?php 
									include "connectdb.php";

	$uname =  $_SESSION['name'];
	
if ($stmt = $mysqli->prepare("select count(*) from rel_user_follows_user where followee like ?")) {
	
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($num);

	while($stmt->fetch()){?>
										<span> Followers</span>
										<label><?= $num; ?></label>
                                        <?php }}
										if ($stmt = $mysqli->prepare("select count(*) from rel_user_follows_user where follower like ?")) {
	
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($num2);

	while($stmt->fetch()){?>
										
                                        
									</div>
									<div class="twitts-stat-grid">
										<span> Following</span>
										<label><?= $num2; ?></label>
                                        <?php }}?>
									</div>
									
									<div class="clearfix"> </div>
								</div>
							</div>
							<!---->
							<!----start-tweets-scroller---->
									<script type="text/javascript" src="js/jquery.easy-ticker.js"></script>
									<script type="text/javascript">
									$(document).ready(function(){
										$('#demo').hide();
										$('.vticker').easyTicker();
									});
									</script>
								<!----start-tweets-scroller---->
                                <div class="latest-tweets-box">
								
                                <?php
								 $get_n_user_posts_query = " SELECT count(*),user_posts.uname, user_posts.postid, user_posts.bname, concert.cname, user_posts.postinfo,user_posts.postedtime
                              FROM user_posts
                              JOIN rel_user_follows_user ON rel_user_follows_user.followee = user_posts.uname
                              JOIN concert ON concert.cid = user_posts.cid
                              WHERE rel_user_follows_user.follower = ?
							  GROUP BY user_posts.uname, user_posts.postid, user_posts.bname, concert.cname, user_posts.postinfo,user_posts.postedtime
                              ORDER BY user_posts.postedtime ASC"; 
				if($stmt->prepare($get_n_user_posts_query)) {
					$stmt->bind_param('s', $uname);
					$stmt->execute();
					$stmt->bind_result($num,$uname, $postid, $bname, $cid, $postinfo,$posttime);
					
					while($stmt->fetch()){
							
  							
							echo"	  <ul>";
							echo"		  <li>";
							echo"		  	<p>$postinfo</p>";
							echo"  	<span>Posted by:$uname  on $posttime</span>";
								echo"	  </li>";
								echo"</ul>";
								
						}
				}
				
?>

</div>
							
									  
							
						</div>
						<!--//twitter-box----->
					</div><!----//End-col-2 ----->
					<!---- col-3 ----->
					<div class="col-md-6 col-3" style="float:right; width:45%;  ">
						<!----video-player---->
						<!-- video player -->
						
						  <!--  End video player scrept -->
						
						<!--//video-player---->
						<!---col-3-grid-2---->
						
							<!--- //simple-dropdow ---->
							<!--- Wather-sample ---->
							
						<!---//col-3-grid-2---->
						<!---col-3-grid-3---->
						<div class="col-3-grid-3 alert-box text-center">
							<img src="images/right-icon.png" title="check" />
							<?php
			print "<b>Suggestions:</b> " . "<br/>";
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($rand_n_bands_reco); $i++) {
  print "$i: " . $rand_n_bands_reco[$i] . "<br/>";
}
print "<br/>";
?>
						</div>
                        
						<div class="get-in-touch">
                       <center> <a class="p-btn" style="width:100%;">Your concert review and ratings</a></center>
							<?php
								 $get_n_user_posts_query = " SELECT c.cid,c.cname, u.review, u.rating from rel_user_attends_concert u natural join concert c where u.uname = ?"; 
				if($stmt->prepare($get_n_user_posts_query)) {
					$stmt->bind_param('s', $uname);
					$stmt->execute();
					$stmt->bind_result($cid,$cname,$review, $rating);
					echo "</br>";
					while($stmt->fetch()){
							
  							
							if($review and $rating){
								echo "<img src='images/concert_images/$cid.jpg' style='width:100px; height:100px;'/>";
							echo"	Concert:$cname</br>";
							echo "";
							if($review)
							echo"   Review:$review</br>";
							
							if($rating)
							echo"   Rating:$rating/5</br></br>";}
							
								
								
						}
				}
				
?>
						</div><!---col-3-grid-3---->
                        <div class="clearfix"> </div>
                        <div class="get-in-touch">
                       <center> <a class="p-btn" style="width:100%;">Review/Rate concerts attended</a></center>
							<?php
								 $get_n_user_posts_query = " SELECT distinct c.cid,c.cname from rel_user_attends_concert u natural join concert c where u.review is NULL or u.rating is NULL and u.uname = ?"; 
				if($stmt->prepare($get_n_user_posts_query)) {
					$stmt->bind_param('s', $uname);
					$stmt->execute();
					$stmt->bind_result($cid,$cname);
					echo "</br>";
					while($stmt->fetch()){
							
  							
							
							echo "<img src='images/concert_images/$cid.jpg' style='width:100px; height:100px;'/>";
							echo"	Concert:$cname</br></br>";
							
							
					}
								
						
				}
				
?>
						</div><!---col-3-grid-3---->
						<!---col-3-grid-4---->
						
						<!---//col-3-grid-4---->
						<!---col-3-grid-5---->
						<div class="col-3-grid-5 timer-note  style="float:right; width:45%;  "">
							
</div>
							<div class="clearfix"> </div>
						</div>
						<!---//col-3-grid-5---->
						<!----copy-right---->
							
						<!--//copy-right---->
					</div>
					<!---- col-3 ----->
					<div class="clearfix"> </div>
				</div>
			</div>
			<!---- //content ----->
			
		</div>
		<!---//container----->
	</body>
</html>

