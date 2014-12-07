<?php
// Start the session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body >
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
  $rand_n_bands_reco = get_n_bands_reco($mysqli, $uname);
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
  exit();
}
 ?>
 <body>
<div id="wrapper" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto;"> 
 
  <div id="inner-1" style="float:left; width:60%;border:dotted #CC3300; ">
    WELCOME <?= $uname; ?>
  </div>
 
  <div id="inner-2" style="float:right; width:30%; border:dotted #CC3300;"> 
    <form style="float:right;">
    
    <input type="button" value=" Logout"/>
    </form>
  </div>
</div>
<div id="homebody" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto; ">
	<div id="sidebar" style="float:left; width:29%;border:dotted #CC3300; ">
    	<div id="circular" style=" height:39%;border:dotted #CC3300; ">
   			 <?php echo "<img src=images/user/$uname.jpg style='width:200px; height:200px;'/>";?>
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
        	Next 3 upcoming concerts
            <?php
			
print "Next n concerts:" . "<br/>";
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($next_n_concerts_cids); $i++) {
  print "\tcid: " . $next_n_concerts_cids[$i] . "<br/>";
  print "\tcname: " . $next_n_concerts_cnames[$i] . "<br/>";
  print "bname: " . $next_n_concerts_bnames[$i] . "<br/>";
}
			?>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Bands you liked
            <?php
            print "Random n bands that you like: " . "<br/>";
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($rand_n_bands_fan); $i++) {
  print "$i: " . $rand_n_bands_fan[$i] . "<br/>";
}
?>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Check out these bands
            <?php
			print "Random n bands that you may like: " . "<br/>";
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($rand_n_bands_reco); $i++) {
  print "$i: " . $rand_n_bands_reco[$i] . "<br/>";
}
?>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	User posts
            <textarea rows="4" cols="50" placeholder="write something to post">
            </textarea>
            <input type="submit" value="post"/>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        User Recolist
        </div>
  </div>
</div>
</body>
</html>