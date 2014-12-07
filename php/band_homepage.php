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
$bname = 'Linkin Park';
print "You are band " . $bname . "<br/>";
/*band home page contents:
++ profile pic
++ next 3 concerts band is performing
++ Old concerts the band performed
++ The genres the band plays
++ posts:
	-- band_links
*/
$profilepic = '/images/band/'.$bname.'.jpg';
$next_n_concerts_cids = array(); $next_n_concerts_cnames = array(); $next_n_concerts_bnames = array();
$old_concerts_cids = array(); $old_concerts_cnames = array(); $old_concerts_bnames = array();
$linkids = array(); $linkurls = array(); $linkinfos = array();
try {
  list($next_n_concerts_cids, $next_n_concerts_cnames, $next_n_concerts_bnames) = get_n_concerts($mysqli, $bname, 'n');
  list($old_concerts_cids, $old_concerts_cnames, $old_concerts_bnames) = get_n_concerts($mysqli, $bname, 'old');
  list($linkids, $linkurls, $linkinfos) = get_n_band_links($mysqli, $bname);
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
print "Old concerts:" . "<br/>";
for ($i = 0; $i < count($old_concerts_cids); $i++) {
  print "\tcid: " . $old_concerts_cids[$i] . "<br/>";
  print "\tcname: " . $old_concerts_cnames[$i] . "<br/>";
  print "bname: " . $old_concerts_bnames[$i] . "<br/>";
}
print "Links: " . "<br/>";
for ($i = 0; $i < count($linkids); $i++) {
  print "\tlinkid: " . $linkids[$i] . "<br/>";
  print "\tlinkurl: " . $linkurls[$i] . "<br/>";
  print "linkinfo: " . $linkinfos[$i] . "<br/>";
}
?>
</body>
</html>
<!--:indentSize=2:tabSize=2:noTabs=true:wrap=soft:-->