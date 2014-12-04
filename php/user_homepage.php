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
$next3concerts_cids = array(); $next3concerts_cnames = array(); $next3concerts_bnames = array();
$rand3bands_fan = array();
$rand3bands_reco = array();
try {
  list($next3concerts_cids, $next3concerts_cnames, $next3concerts_bnames) = get3concerts($mysqli, $uname);
  get3bandsfan($mysqli, $uname, $rand3bands_fan);
  get3bandsreco($mysqli, $uname, $rand3bands_reco);
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
  exit();
}
print "Next 3 concerts:" . "<br/>";
for ($i = 0; $i < 3 && $i < count($next3concerts_cids); $i++) {
  print "\tcid: " . $next3concerts_cids[$i] . "<br/>";
  print "\tcname: " . $next3concerts_cnames[$i] . "<br/>";
  print "bname: " . $next3concerts_bnames[$i] . "<br/>";
}

print "Random 3 bands that you like: " . "<br/>";
for ($i = 0; $i < 3 && $i < count($rand3bands_fan); $i++) {
  print "$i: " . $rand3bands_fan[$i] . "<br/>";
}

print "Random 3 bands that you may like: " . "<br/>";
for ($i = 0; $i < 3 && $i < count($rand3bands_reco); $i++) {
  print "$i: " . $rand3bands_reco[$i] . "<br/>";
}
?>
</body>
</html>
<!--:indentSize=2:tabSize=2:noTabs=true:wrap=soft:-->