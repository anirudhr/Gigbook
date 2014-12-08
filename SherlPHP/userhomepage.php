<?php
// Start the session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gigbook: home</title>



</head>

<body >

 <body>
<?php
require("connectdb.php");
require("user_homepage_functions.php");
$uname = $_SESSION['name'];

$next_n_concerts_cids = array(); $next_n_concerts_cnames = array(); $next_n_concerts_bnames = array();
$rand_n_bands_fan = array();
$rand_n_bands_reco = array();
$post_unames = array(); $postids = array(); $post_bnames = array(); $post_cnames = array(); $postinfos = array();
$linkids = array(); $link_bnames = array(); $linkurls = array(); $linkinfos = array();

try {
  list($next_n_concerts_cids, $next_n_concerts_cnames, $next_n_concerts_bnames) = get_n_concerts($mysqli, $uname);
  $rand_n_bands_fan = get_n_bands_fan($mysqli, $uname);
  $rand_n_bands_reco = get_n_bands_reco($mysqli, $uname);
  list($post_unames, $postids, $post_bnames, $post_cnames, $postinfos) = get_n_user_posts($mysqli, $uname);
  list($linkids, $link_bnames, $linkurls, $linkinfos) = get_n_band_links($mysqli, $uname);
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
}
 ?>
<div id="wrapper" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto;"> 
 
  <div id="inner-1" style="float:left; width:60%;border:dotted #CC3300; ">
    WELCOME <?= $uname; ?>
  </div>
 
  <div id="inner-2" style="float:right; width:30%; border:dotted #CC3300;"> 
    <form style="float:right;" action="userSearch" method='post'>
    <input type="text" placeholder="Search for users" name="searcheduser"/>
    <input type="button" value=" Logout" onclick="logout()"/>
    </form>
  </div>
</div>
<div id="homebody" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto; ">
	<div id="sidebar" style="float:left; width:29%;border:dotted #CC3300; ">
    	<div id="circular" style=" height:39%;border:dotted #CC3300; ">
   			 <?php echo "<img src='images/user/$uname.jpg' style='width:200px; height:200px;'/>";?>
    	</div>
         <div id="linklist" style=" height:59%;border:dotted #CC3300; ">
        	 <a href="profile.php" style="text-decoration:none;">Profile</a><br />
   			 <a href="userFollows.php" style="text-decoration:none;">Follow</a><br />
             <a href="userLikesGenre.php" style="text-decoration:none;" >Genre</a><br />
             <a href="userLikesBands.php" style="text-decoration:none;">Bands</a><br />
             <a href="userLists.php" style="text-decoration:none;">Lists</a>
             
			 
    	</div>
    
  </div>
 
  <div id="inner-2" style="float:right; width:68%; border:dotted #CC3300;"> 
  <div id="inner-2" style="height:19%; border:dotted #CC3300;">
         User posts
            

<form action="postsOnPage.php" method="post">
Choose a band you want to write about:
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

Choose a concert you want to write about:
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

            <textarea rows="4" cols="50" placeholder="write something to post" name="postsByUser">
           </textarea>
            <input type="submit" value="post"/>
           </form>
        </div>
    	<div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Next 3 upcoming concerts: <br/>
      <?php
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($next_n_concerts_cids); $i++) {
  print "\tcid: " . $next_n_concerts_cids[$i] . "<br/>";
  print "\tcname: " . $next_n_concerts_cnames[$i] . "<br/>";
  print "bname: " . $next_n_concerts_bnames[$i] . "<br/>";
}
			?>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Bands you like: <br/>
            <?php
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($rand_n_bands_fan); $i++) {
  print "$i: " . $rand_n_bands_fan[$i] . "<br/>";
}
?>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Posts of people that you follow: <br/>
        	<div id="user_posts">
		<?php
		for ($i = 0; $i < count($postids); $i++) {
		  //print "\tpostid: " . $postids[$i] . "<br/>";
		  print "<div id='user_post_" . $postids[$i] . "'>";
		  print $post_unames[$i] . " posted about ";
		  print $post_bnames[$i] . " playing at ";
		  print $post_cnames[$i] . ": ";
		  print $postinfos[$i] . "<br/>";
		  print "</div>";
		}
		?>
		</div>
        </div>
        
        
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Links posted by bands you are a fan of:<br/>
             <?php
for ($i = 0; $i < count($linkids); $i++) {
  //print "\tlinkid: " .  . "<br/>";
  print "<div id='band_link_" . $linkids[$i] . "'>";
  print $link_bnames[$i] . " : ";
  print $linkinfos[$i] . " : ";
  print "<a href='" . $linkurls[$i] . "'>Link</a><br/>";
  print "</div>";
}
?>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Check out these bands: <br/>
            <?php
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($rand_n_bands_reco); $i++) {
  print "$i: " . $rand_n_bands_reco[$i] . "<br/>";
}
print "<br/>";
?>
        </div>
  </div>

</body>
</html>
        	