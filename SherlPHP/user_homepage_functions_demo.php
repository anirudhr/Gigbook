<?php
require("connectdb.php");
require("user_homepage_functions.php");
$uname = 'Alice';
$followee_unames = array();
$followee_cids = array();
$followee_cnames = array();
$followee_reviews = array();
$followee_ratings = array();
list($followee_unames, $followee_cids, $followee_cnames, $followee_reviews, $followee_ratings) = get_followee_reviews_ratings($mysqli, $uname);

print "<b>User: " . $uname . "</b><br/>";
foreach ($followee_unames as $i => $followee_uname) {
	print "User: " . $followee_unames[$i] . "<br/>";
	print "Concert: " . $followee_cnames[$i] . "<br/>";
	if ($followee_reviews[$i]) {
		print "Review: " . $followee_reviews[$i] . "<br/>";
	}
	if ($followee_ratings[$i]) {
		print "Rating: " . $followee_ratings[$i] . "<br/>";
	}
}
print "<br/>";
