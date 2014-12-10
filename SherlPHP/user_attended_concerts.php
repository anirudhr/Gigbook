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
require("user_attended_concerts_functions.php");
/*#######################UNCOMMENT WHEN ADDING TO MAIN
if (!isset($_COOKIE['usrcookie'])) {
	echo "<script language='javascript'>window.location='login.php';</script>"; //go back to login page
}

if (!isset($_COOKIE['usrcookie'])) {
	echo "<script language='javascript'>window.location='login.php';</script>"; //go back to login page
}
$uname = $_COOKIE['usrcookie'];
#######################*/
$uname = 'Alice';
print "You are user " . $uname . "<br/>";
  $attended_cids = array();  $attended_cnames = array();  $attended_bnames = array();  $attended_ctimes = array();  $attended_vnames = array();  $attended_buildings = array();  $attended_streets = array();  $attended_citys = array();  $attended_states = array();  $attended_zips = array();  $attended_urls = array();
try {
  list($attended_cids, $attended_cnames, $attended_bnames, $attended_ctimes, $attended_vnames, $attended_buildings, $attended_streets, $attended_citys, $attended_states, $attended_zips, $attended_urls) = get_attended_concerts($mysqli, $uname);
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
  exit();
}
print "<b>Attended concerts:</b>" . "<br/>";
for ($i = 0; $i < count($attended_cids); $i++) {
  print "\tcid: " . $attended_cids[$i] . "<br/>";
  print "\tcname: " . $attended_cnames[$i] . "<br/>";
  print "bname: " . $attended_bnames[$i] . "<br/>";
  print "ctime: " . $attended_ctimes[$i] . "<br/>";
  print "venue name: " .   $attended_vnames[$i] . "<br/>";
  print "venue address: " .   $attended_buildings[$i] . " " . $attended_streets[$i] . ", " . $attended_citys[$i] . ", " . $attended_states[$i] . ", " . $attended_zips[$i] . "<br/>";
  print "Venue URL: " . $attended_urls[$i] . "<br/>";
  print "<br/>";
}
print "<br/>";

?>
</body>
</html>
<!--:indentSize=2:tabSize=2:noTabs=true:wrap=soft:-->