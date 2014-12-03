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

if (!isset($_COOKIE['usrcookie'])) {
	echo "<script language='javascript'>window.location='login.php';</script>"; //go back to login page
}

if (!isset($_COOKIE['usrcookie'])) {
	echo "<script language='javascript'>window.location='login.php';</script>"; //go back to login page
}
$uname = $_COOKIE['usrcookie'];
echo "You are user" . $uname;
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
get3concerts($mysqli, $uname, &$next3concerts_cids, &$next3concerts_cnames, &$next3concerts_bnames);
get3bands($mysqli, $uname, &$rand3bands_fan);

?>
</body>
</html>
<!--:indentSize=2:tabSize=2:noTabs=true:wrap=soft:-->