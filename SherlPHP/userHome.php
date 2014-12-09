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
	</head>
	<body>
    <?php
require("connectdb.php");
require("user_homepage_functions.php");
$uname = $_SESSION['name'];
$next_n_concerts_cids = array(); $next_n_concerts_cnames = array(); $next_n_concerts_bnames = array();
$rand_n_bands_fan = array();
$rand_n_bands_reco = array();

try {
  list($next_n_concerts_cids, $next_n_concerts_cnames, $next_n_concerts_bnames) = get_n_concerts($mysqli, $uname);
  $rand_n_bands_fan = get_n_bands_fan($mysqli, $uname);
  //$rand_n_bands_reco = get_n_bands_reco($mysqli, $uname);
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
				<div >
					<ul class="user-profile list-unstyled">
						<li><a href="#"> <?php echo "<img src='images/user/$uname.jpg' style='width:32px; height:32px;'title='admin' />"
 ?></a>
							
						</li>
					</ul>
					
					<ul class="logout list-unstyled"	>				
                    	<li><input type="button" value="logout" onClick="window.location='logout.php'"</li>

					</ul>
				</div>
				<div class="clearfix"> </div>
				<!--//usernotifications---->
			</div>
			<div class="clearfix"> </div>
			<!------ content ----->
			<div class="content">
				<div class="3-cols">
					<div class="col-1 col-md-3">
						<!---- user-profile ---->
							<div class="user-profile1 text-center">
                             <?php echo "<img src='images/user/$uname.jpg' style='width:110px; height:110px;' title='name'/>";
							 

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
						<div class="sign-in-box">
							<h2>Sign in to your account</h2>
							<form>
								<div class="text-boxs">
									<span class="text-box">
										<label class="s-user"> </label>
										<input type="text" placeholder="Username" required /> 
										<div class="clearfix"> </div>
									</span>
									<span class="text-box">
										<label class="s-lock"> </label>
										<input type="text" placeholder="password" required /> 
										<div class="clearfix"> </div>
									</span>
								</div>
								<input type="submit" value="sign in" />
							</form>
							<p class="not-member">
								<a class="member-sign" href="#"> Not a member?</a> <a class="member-signup" href="#">sign Up Now <span> </span></a>
							</p>
						</div>
						<!----//sign-in-box ---->
						<!----up-load-stats---->
						<div class="up-load-stats">
						<div class="chart">
							<!-----upload-js-files---->
								<script type="text/javascript" src="js/Chart.js"></script>
							<!---//upload-js-files---->
					               <h3>Upload Stats</h3>
					                <div class="diagram">
					                  <canvas id="canvas" height="200" width="200"> </canvas>
					                  <h4>2014</h4>   
					                 </div>
									<div class="chart_list">
						           	  <ul class="list-unstyled">
						           	  	<li><a href="#" class="blue">. docx<p class="percentage">32<em>%</em></p></a></li>
						           	  	<li><a href="#" class="purple">. pdf<p class="percentage">4<em>%</em></p></a></li>
						           	  	<li><a href="#" class="red">. mp3<p class="percentage">17<em>%</em></p></a></li>
						           	  	<li><a href="#" class="green">. psd<p class="percentage">47<em>%</em></p></a></li>
						           	  	<div class="clearfix"> </div>	
						           	  </ul>
						           </div>
						           <script>
									var doughnutData = [
											{
												value: 32,
												color:"#4FC4F6"
											},
											{
												value : 4,
												color : "#A33CF2"
											},							
											{
												value : 17,
												color : "#E64C65"
											},	
											{
												value : 47,
												color : "#21B8C6"
											},							
										
										];				
										var myDoughnut = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(doughnutData);					
								</script>
					          </div>
						</div>
						<!--//up-load-stats---->
						<!----social-tags---->
							<div class="social-tags">
								<h4>Lets get Social</h4>
								<ul class="list-unstyled list-inline">
									<li><a href="#"><span><i class="fa fa-facebook"> </i></span></a></li>
									<li><a href="#"><span><i class="fa fa-twitter"> </i></span></a></li>
									<li class="active"><a href="#"><span><i class="fa fa-linkedin"> </i></span></a></li>
									<li><a href="#"><span><i class="fa fa-skype"> </i></span></a></li>
								</ul>
							</div>
						<!--//social-tags---->
					</div><!----//End-col-1 ----->
					<!---- col-2 ----->
					<div class="col-2 col-md-3">
						<!----chat-box---->
						<div class="chat-box">
							<div class="people-on-chat">
								<div class="chat-msg">
									<div class="col-xs-2 chat-people">
										<a href="#"><img src="images/user-pic.jpg" title="name" /></a>
									</div>
									<div class="col-xs-9 chat-msg-on">
										<p>Lorem ipsum dolor sit amet, consectetur elit. ?</p>
										<span> </span>
									</div>
									<div class="clearfix"> </div>
								</div>
								<!---->
								<div class="chat-msg">
									<div class="col-xs-9 chat-msg-on chat-msg-replay">
										<p>Nunc pharetra dui fermentum aliquam. ?</p>
										<span> </span>
									</div>
									<div class="col-xs-2 chat-people">
										<a href="#"><img src="images/user-pic.jpg" title="name" /></a>
									</div>
									<div class="clearfix"> </div>
								</div>
								<!---->
								<div class="chat-msg">
									<div class="col-xs-2 chat-people">
										<a href="#"><img src="images/user-pic.jpg" title="name" /></a>
									</div>
									<div class="col-xs-9 chat-msg-on">
										<p> eu pretium risus. In sit amet est cursus. ?</p>
										<span> </span>
									</div>
									<div class="clearfix"> </div>
								</div>
								<!---->
							</div>
							<!----msg-type-box---->
							<div class="msg-type-box">
								<form>
									<input type="text" value="Type your message..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type your message...';}">
									<input type="submit" value="Send" />
								</form>
							</div>
							<!--//msg-type-box---->
						</div>
						<div class="clearfix"> </div>
						<!--//chat-box---->
						<!----get-in-touch--->
						<div class="get-in-touch">
							<h3>Get in touch</h3>
							<!---->
							<form>
								<div class="get-in-touch-text-boxs">
									<div class="get-in-touch-text-box">
										<span>Name <label>*</label></span>
										<input type="text" value="Lorem ipsum" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Lorem ipsum';}">
									</div>
									<div class="get-in-touch-text-box">
										<span>Email <label>*</label></span>
										<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<div class="get-in-touch-text-box">
										<span>Phone <label>*</label></span>
										<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<div class="get-in-touch-text-box">
										<span>Message <label>*</label></span>
										<textarea> </textarea>
									</div>
									<div class="clearfix"> </div>
									<input type="submit" value="Send Message" />
								</div>
								
							</form>
						</div>
						<!--//get-in-touch--->
						<!---twitter-box----->
						<div class="twitter-box">
							<div class="twitter-box-head">
								<h3><span> </span>Latest Posts</h3>
								<div class="twitts-stat">
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
							echo"  	<span>$posttime</span>";
								echo"	  </li>";
								echo"</ul>";
								
						}
				}
?>
							
									  
							
						</div>
						<!--//twitter-box----->
					</div><!----//End-col-2 ----->
					<!---- col-3 ----->
					<div class="col-md-6 col-3">
						<!----video-player---->
						<!-- video player -->
						<link href="css/video-player.css" rel="stylesheet" type="text/css" />
						<script type="text/javascript" src="js/popcorn.js"></script>
						<script type="text/javascript" src="js/popcorn.player.js"></script>
						<script type="text/javascript" src="js/popcorn.jplayer.js"></script>
						<script type="text/javascript" src="js/popcorn.subtitle.js"></script>
						  <script type="text/javascript">
						//<![CDATA[
						  $(document).ready(function(){
						
							var p = Popcorn.jplayer('#jquery_jplayer_1', {
								media: {
									m4v: "http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
									ogv: "http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
									webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
									poster: "images/video-img.jpg"
								},
								options: {
									swfPath: "js",
									supplied: "webmv, ogv, m4v",
									size: {
										width: "100%",
										height: "284px",
										cssClass: "jp-video-360p"
									},
									smoothPlayBar: true,
									keyEnabled: true
								}
							})
							.subtitle({
								start: 2,
								end: 6,
								text: "This text is the Popcorn Subtitle Plugin"
							})
							.subtitle({
								start: 6,
								end: 10,
								text: "Working with the Popcorn jPlayer Player Plugin"
							})
							.subtitle({
								start: 10,
								end: 15,
								text: "Enabling jPlayer to function with the features of Popcorn"
							})
							.subtitle({
								start: 16,
								end: 32,
								text: "Have fun playing with it!"
							});
						
						});
						//]]>
						</script>
						  <!--  End video player scrept -->
						<div class="video-player">
						     <div id="jp_container_1" class="jp-video jp-video-360p">
							   <div class="jp-type-single">
								<div id="jquery_jplayer_1" class="jp-jplayer"> </div>
								<div class="jp-gui">
									<div class="jp-video-play">
										<a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
									</div>
									 <div class="jp-interface">
										<div class="jp-progress">
											<div class="jp-seek-bar">
												<div class="jp-play-bar"> </div>
											</div>
										</div>
										<div class="jp-controls-holder">
											<ul class="jp-controls">
												<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
												<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
										   </ul>						
										    <ul class="jp-toggles">
												<li class=""><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
										    </ul>
										<div class="volume-controls">
											<ul class="jp-volume-bar-list">
												<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
												<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
												<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
											  </ul>
											<div class="jp-volume-bar">							  
												<div class="jp-volume-bar-value"> </div>
											</div>
										</div>
										<div class="video-time">
											<div class="jp-current-time"> </div> <i class="line">/</i>
											<div class="jp-duration"> </div>
											<div class="clear"> </div>
										 </div>
									    </div>
									  </div>
								    </div>
							       </div>
						         </div>
						</div>
						<!--//video-player---->
						<!---col-3-grid-2---->
						<div class="col-3-grid-2">
							<!--- simple-dropdow ---->
								<div class="col-md-6 simple-dropdow">
									<ul>
										<li class="s-menu">
											<a class="cog" href="#"><i class="fa fa-cog"> </i></a><span class="s-drop1"><i class="fa fa-sort-desc"> </i></span>
											<ul class="drop-sub">
												<li><a href="#"><i class="fa fa-pencil"> </i>Edit post</a></li>
												<li class="active1"><a href="#"><i class="fa fa-pencil"> </i>Remove post</a></li>
												<li><a href="#"><i class="fa fa-pencil"> </i>Save changes</a></li>
												<div class="clearfix"> </div>
											</ul>
										</li>
									</ul>
								</div>
							<!--- //simple-dropdow ---->
							<!--- Wather-sample ---->
							<div class="col-md-5 Wather-grid">
								<img src="images/wather-icon.png" title="wather" />
								<span><label> 72<small>o</small></label> Brookly</span>
							</div>
							<div class="clearfix"> </div>
							<!--- Wather-sample ---->
						</div>
						<!---//col-3-grid-2---->
						<!---col-3-grid-3---->
						<div class="col-3-grid-3 alert-box text-center">
							<img src="images/right-icon.png" title="check" />
							<h3>Congratulations!</h3>
							<p>Your informtaion was successfully submitted.</p>
							<a class="a-alert" href="#">Get Started</a>
						</div>
						<!---col-3-grid-3---->
						<!---col-3-grid-4---->
						<div class="col-3-grid-4">
							<!---- start-audio-plyer---->
								<!---- start-audio-plyer-files---->
								<link rel="stylesheet" href="css/bbplayer.css"/>
								 <script src="js/bbplayer.js"></script>
								<!---- //End-audio-plyer-files---->
								<div class="audio-plyer">
									<div class="bbplayer">
									      <span class="bb-play"></span><span class="bb-rewind"></span><span class="bb-forward"></span>
									      <span class="bb-trackTime">--:--</span> /
									      <span class="bb-trackLength">--:--</span>
									      <span class="bb-trackTitle">&nbsp;</span>
									      <audio>
									        <source src="media/Blue Browne.ogg" type="audio/ogg"></source>
									        <source src="media/Blue Browne.mp3" type="audio/mpeg"></source>
									        <source src="media/Georgia.ogg" type="audio/ogg"></source>
									        <source src="media/Georgia.mp3" type="audio/mpeg"></source>
									      </audio>
									</div>
								</div>
								<!---- //End-audio-plyer---->
						</div>
						<!---//col-3-grid-4---->
						<!---col-3-grid-5---->
						<div class="col-3-grid-5 timer-note">
							<div class="col-md-3 timer-people">
								<img src="images/01.jpg" title="name" />
							</div>
							<div class="col-md-9 timer-info">
								<h3 class="t-name"> Patel Banoni</h3>
								<span class="t-time"><label> </label> 4:35</span>
								<div class="clearfix"> </div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus dui id libero auctor cursus.</p>
								<b class="t-arrow"> </b>
							</div>
							<div class="clearfix"> </div>
						</div>
						<!---//col-3-grid-5---->
						<!----copy-right---->
							<div class="copy-right">
									<p>Template by <a href="http://w3layouts.com/">w3layouts</a></p>
							</div>
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

