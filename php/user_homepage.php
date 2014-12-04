<!DOCTYPE html>
<html>
<head>
<title>Gigbook</title>
<style>
</style>
</head>
<body>

<?php
require("connectdb.php");
require("user_homepage_functions.php");
/*#######################UNCOMMENT WHEN ADDING TO MAIN
if (!isset($_COOKIE['usrcookie'])) {
	echo "<script language='javascript'>window.location='login.php';</script>"; //go back to login page
}

if (!isset($_COOKIE['usrcookie'])) {
	echo "<script language='javascript'>window.location='login.php';</script>"; //go back to login page
}
$uname = $_COOKIE['usrcookie'];
#######################*/
$uname = 'Bob';
print "You are user " . $uname . "<br/>";
/*user home page contents:
++ profile pic
++ next 3 concerts user is attending
++ random 3 bands user is fan of
++ random 3 recommended bands
++ posts:
	-- band_links
	-- user_posts
*/
$profilepic = '/images/user/'.$uname.'.jpg';
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
print "Next n concerts:" . "<br/>";
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($next_n_concerts_cids); $i++) {
  print "\tcid: " . $next_n_concerts_cids[$i] . "<br/>";
  print "\tcname: " . $next_n_concerts_cnames[$i] . "<br/>";
  print "bname: " . $next_n_concerts_bnames[$i] . "<br/>";
}

print "Random n bands that you like: " . "<br/>";
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($rand_n_bands_fan); $i++) {
  print "$i: " . $rand_n_bands_fan[$i] . "<br/>";
}

print "Random n bands that you may like: " . "<br/>";
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($rand_n_bands_reco); $i++) {
  print "$i: " . $rand_n_bands_reco[$i] . "<br/>";
}
?>
</body>
</html>
<!--:indentSize=2:tabSize=2:noTabs=true:wrap=soft:-->