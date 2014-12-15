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
include("connectdb.php");
require("user_homepage_functions.php");
$mainUser = $_SESSION['name'];
$uname = $_GET['user'];
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
				
				<div class="logo">
					<span>Dashboard </span>
				</div>
				<!---usernotifications---->
				<div style="float:right; width:100px;">
					<a href="userHome.php"> <?php echo "<img src='users/$mainUser.jpg' style='width:50px; height:32px;'title='admin' />"
 ?></a>
							
									
                    	   <a href="logout.php"><img src="images/logout.png"/></a>
				</div>
				<div class="clearfix"> </div>
				<!--//usernotifications---->
			</div>
			<div class="clearfix"> </div>
			<!------ content ----->
			<div class="content" style="margin-left:auto; margin-right:auto;   overflow:auto; ">
				<div class="3-cols" style="float:left; width:29%;  ">
					
						<!---- user-profile ---->
							<div class="user-profile1 text-center">
                             <?php echo "<img src='users/$uname.jpg' style='width:110px; height:110px;' title='name'/>";
							 
$uname = $_GET['user'];
include "connectdb.php";

	
	
if ($stmt = $mysqli->prepare("select firstname,lastname,bio from user  where uname like ?")) {
	
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($fname,$lname,$bio);

	while($stmt->fetch()){
  ?>

								
								<h3><?= $fname ?>    <?=$lname; ?>  </h3>
								
                                <?php
	}}?>
								<a class="p-btn" href="follows.php?follow=<?=$uname;?>">Follow</a>
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
                            <div class="get-in-touch">
                            <div class="get-in-touch"">
									<div class="twitts-stat-grid">
                                    <?php 
									include "connectdb.php";

	$uname = $_GET['user'];
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
						<!--//social-tags---->
					</div><!----//End-col-1 ----->
					<!---- col-2 ----->
					<div class="col-2 col-md-3" style="float:right; width:70%;  ">
                    
						<!----chat-box---->
						<div class="clearfix"> </div>
                      
						<!--//chat-box---->
                       <div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Profile</a>
                            <br/><br/>

							<!---->
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
	$bio=$row["bio"];
	$dob=$row["birthdate"];
	}
     
	
}



?>

<table border="0" width="100%">
<tr>
<td><label>Firstname</label></td>
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




</table>	</div>
                        
						<!----get-in-touch--->
						<div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center"> Bands user likes</a>
                            <br/><br/>

							<!---->
							
           <table border="0" width="100%" cellspacing="20">
<tr><td colspan="2"  >
</td>
</tr>
<tr>
<?php 
include("connectdb.php");
$uname = $_GET['user'];
$count =0;
if ($stmt = $mysqli->prepare("select bname from rel_user_fan_band where uname = ?")) {
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($bname);
  while($stmt->fetch()){
	  if ($count==2) 
	{echo "<tr>"; $count=0;}
	  ?>
<td width="120" height="120"><?php echo "<img src='bands/$bname.jpg' style='width:100px; height:100px;'/>";?></td><td  style="text-align:left;"><a href="visitBandPage.php?band=<?=$bname;?>"><?=$bname;?></a></td>
<?php
$count=$count+1;
  }?>
  </tr>
  
  </table>
  <?php
$stmt->close();
  $mysqli->close();
 }
?>
						</div>
                        <div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Genres user likes</a></h3>
                            <br/><br/>


							<!---->
							 <table border="0" width="100%" cellspacing="20">



<tr>
<?php 
include("connectdb.php");
$uname = $_GET['user'];
$count =0;
if ($stmt = $mysqli->prepare("select gname from rel_user_likes_genre where uname = ?")) {
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($gname);
  while($stmt->fetch()){
	  if ($count==2) 
	{echo "<tr>"; $count=0;}
	  ?>
<td width="120" height="120"><?php echo "<img src='images/genre/$gname.jpg' style='width:100px; height:100px;'/>";?></td><td  style="text-align:left;"><?= $gname; ?></td>
<?php
$count=$count+1;
  }?>
  </tr>
  
  </table>
  <?php
$stmt->close();
  $mysqli->close();
 }
?>
						</div>
                        
						<!--//get-in-touch--->
						<!---twitter-box----->
						<div class="twitter-box">
							<div class="twitter-box-head">
								<h3><span> </span>Latest Posts</h3>
								
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
								
                                <table border="0" width="100%" >
		
<?php 
include("connectdb.php");
$uname = $_GET['user'];
if ($stmt = $mysqli->prepare("select postinfo,postedtime from user_posts where uname = ?")) {
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($pinfo,$ptime);
  
  while($stmt->fetch()){
	
	  ?>
      <tr>
      <td><?= $pinfo; ?></td>
	  <td><?= $ptime; ?></td>
       </tr>
<?php
}
?>
 
  
  </table>
  <?php
$stmt->close();
  $mysqli->close();
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
						
					<!---- col-3 ----->
					<div class="clearfix"> </div>
				</div>
			</div>
			<!---- //content ----->
			
		
		<!---//container----->
	</body>
</html>

