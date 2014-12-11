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
            <h2>SEARCH RESULTS</h2>
<?php

include "connectdb.php";

	$band="%{$_POST['band']}%";
	
if ($stmt = $mysqli->prepare("select b.bname,b.bio from band b where b.bname like ?")) {
	
	$stmt->bind_param("s", $band);
  $stmt->execute();
   $result = $stmt->get_result();
 $row_cnt = $result->num_rows;
 if($row_cnt==0){
	 echo "<script language='javascript'>alert('No genre matched your search!');</script>";
	 
	 echo "<script language='javascript'>javascript:history.go(-1)</script>";
 }
 else{
  
  ?>
 
      
   <table border ="0" style="border-collapse:separate; border-spacing:5em;"  >

   
   
   <?php
     while ($myrow = $result->fetch_assoc()) {
		 $myrow['bname']=htmlspecialchars($myrow['bname']);
		?>
        
        <tr >
        <td width="100"><?php echo "<img src='images/band/$myrow[bname].jpg' style='width:100px; height:100px;'/>";?></td>
       
        <td>BAND NAME:<a href="visitBandPage.php?band=<?=$myrow['bname'];?>"><?=$myrow['bname'];?></a><br /><br />

BIO:<?= $myrow['bio']; ?><br /><br />

        <form action="fanOfBand.php" method="post"><input type="hidden" name="bname" value='<?= $myrow['bname']; ?>'/><input type="submit" value="BECOME A FAN"/></form><br /><br />
</td>
        </tr>
       
        
          
		
        <?php
		
	}

	echo '</table>';
 }
        $stmt->close();
	$mysqli->close();
    }?>

  </div>
			</div>
			<!---- //content ----->
			
		</div>
		<!---//container----->
	</body>
</html>

