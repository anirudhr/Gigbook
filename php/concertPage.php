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
		<title>Gigbook: Concert</title>
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

function newContent(id)
{
    $("#div1").load("newcontent.php?cid="+id);
}
</script>
        
	</head>
	<body>
   <?php
require("connectdb.php");
require("concert_page_functions.php");
$bname = $_SESSION['name'];
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
				<div style="float:right; width:100px;"> <a href="userHome.php"> <?php echo "<img src='bands/$bname.jpg' style='width:50px; height:32px;'title='admin' alt='HOME' />"
 ?></a> <a href="logout.php"><img src="images/logout.png"/></a> </div>
				<div class="clearfix"> </div>
				<!--//usernotifications---->
			</div>
			<div class="clearfix"> </div>
			<!------ content ----->
			<div class="content" style="margin-left:auto; margin-right:auto;   overflow:auto; ">
			  <div class="3-cols" style="float:left; width:39%;  ">
					

						<!---- user-profile ---->
				<div class="user-profile1 text-center" id="div1">
                             <img src="images/01.jpg"/>
								
						  </div>
					  <!-- //user-profile ---->
					  <!---- sign-in-box ---->
                       <div class="clearfix"> </div>
						<div class="new_concert" id="concert_post">
                        <div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Post a new concert</a>
                            <?php include ("connectdb.php");
							$bname=$_SESSION['name'];
							?>
                            <br/><br/>
                            <table border="0" >
                            <tr >
                            <form action="postConcerts.php" method="post">
"							<tr><td><input type="hidden" value="<?=$bname;?>" name="bname"/></td></tr>
                            
							<td><label>Enter concert name:</label></td>
                            <td> <input type="text" value="" name="cname"/></td>
							</tr>
                            
                           <tr>
                            <td><label>Date and Time</label></td><td> <input type="date" name="cdate"/><input type="time" name="ctime"/></td>
                            </tr>
                            <tr>
                            <td><label>Cover </label></td><td><input type="text" value="" name="cover"/></td>
                       		</tr>
                            <tr>
                            <td><label>Ticket URL </label></td><td><input type="text" value="" name="tkturl"/></td>
                            </tr>
                            <tr>
                            <td><label>Availability </label></td><td><input type="text" value="" name="avail"/><br/></td>
                            </tr>
                            <tr>
                           
                            
                            <td><label>Venue name</label> </td>
<td><select name='vid'>
<?php include "connectdb.php";

if ($stmt = $mysqli->prepare("select distinct vid, vname from venue ")) {
	
  $stmt->execute();
  $stmt->bind_result($vid,$vname);
  echo "<option value=' '></option>\n";
  while($stmt->fetch()) {
	$vname = htmlspecialchars($vname);
	echo "<option value='$vid'>$vname</option>\n";	
  }
  $stmt->close();
  $mysqli->close();
}
?>
</select></td>
 </tr>
 </table>                          
     <input type="submit" value="POST"/>
     </form>
                            
                            
                            
							<!---->
							  
</div>

                        </div>
					  <!----//sign-in-box ---->
					  <!----up-load-stats---->
						
					  <!--//up-load-stats---->
					  <!----social-tags----><!--//social-tags---->
			  </div><!----//End-col-1 ----->
					<!---- col-2 ----->
					<div class="abc" style="float:right; width:60%; border:dotted #FF0000 ">
					  <!--//get-in-touch--->
						<!---twitter-box-----><!--//twitter-box----->
                        <div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Upcoming Concerts</a>
                            <br/><br/>

							<!---->
							  <?php
			include "connectdb.php";
$stmt = $mysqli->stmt_init();
								 $get_n_user_posts_query = " SELECT c.cid,c.cname,c.ctime from concert c where c.ctime>now() order by c.ctime asc"; 
				if($stmt->prepare($get_n_user_posts_query)) {
					
					$stmt->execute();
					$stmt->bind_result($cid,$cname,$ctime);
					echo "</br>";
					$i=1;
					echo "<table border='0' width='100%'>";
					while($stmt->fetch()){
							
  							
							echo "<tr>";
							echo"	<td width='80px'>$i</td><td width='600px'><a onMouseOver='newContent($cid)'>$cname</a></td><td width='200px'>$ctime</td>";
							echo "</tr>";	
							
							
							$i++;
								
								
						}
				}echo "</table>";

?>
						
                        </div>
                        <div class="clearfix"> </div>
                        <div class="get-in-touch">
							<a class="p-btn" style="width:100%;text-align:center">Old Concerts</a>
                            <br/><br/>

							<!---->
 <?php
							     require("connectdb.php");
							     $past_concert_cids = array();
							     $past_concert_cnames = array();
							     $past_concert_ctimes = array();
							     list($past_concert_cids, $past_concert_cnames, $past_concert_ctimes) = get_band_past_concerts($mysqli, $bname);
                                echo "</br>";
                                echo "<table border='0' width='100%'>";
                                for($i=0; $i < count($past_concert_cids); $i++){
                                    $j = $i+1;
                                    echo "<tr>";
                                    echo"	<td width='80px'>$j</td><td width='600px'><a onMouseOver='newContent($past_concert_cids[$i])'>$past_concert_cnames[$i]</a></td><td width='200px'>$past_concert_ctimes[$i]</td>";
                                    echo "</tr>";
                                }
                            echo "</table>";

?>
					<!----//End-col-2 ----->
					<!---- col-3 ----->
			  </div>
			<!---- //content ----->
			</div>
		</div>
		<!---//container----->
	</body>
</html>

