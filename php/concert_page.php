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
require("concert_page_functions.php");

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

print "<b>Future Concert:</b><br/>";
print "ID: ". $future_concert_cid . "<br/>";
print "Is concert past: " . $future_concert_ispast . "<br/>";
print "Band(s): ";
foreach ($future_concert_bnames as $future_concert_bname) {
  print $future_concert_bname . ", ";
}
print "Name: " . $future_concert_cname . "<br/>";
print "Time: " . $future_concert_ctime . "<br/>";
print "URL: " . $future_concert_tkturl ."<br/>";
print "Cover: " . $future_concert_cover ."<br/>";
print "Venue URL: " . $future_concert_url ."<br/>";
print "Venue capacity: " . $future_concert_capacity ."<br/>";
print "Venue name: " . $future_concert_vname ."<br/>";
print "Venue deets: " . $future_concert_building . " " . $future_concert_street . ", " . $future_concert_city . ", " . $future_concert_state . ", " . $future_concert_zip . "<br/>";

print "<br/>";

print "<b>Past Concert:</b><br/>";
print "ID: ". $past_concert_cid . "<br/>";
print "Is concert past: " . $past_concert_ispast . "<br/>";
print "Band(s): ";
foreach ($past_concert_bnames as $past_concert_bname) {
  print $past_concert_bname . ", ";
}
print "Name: " . $past_concert_cname . "<br/>";
print "Time: " . $past_concert_ctime . "<br/>";
print "URL: " . $past_concert_tkturl ."<br/>";
print "Cover: " . $past_concert_cover ."<br/>";
print "Venue URL: " . $past_concert_url ."<br/>";
print "Venue capacity: " . $past_concert_capacity ."<br/>";
print "Venue name: " . $past_concert_vname ."<br/>";
print "Venue deets: " . $past_concert_building . " " . $past_concert_street . ", " . $past_concert_city . ", " . $past_concert_state . ", " . $past_concert_zip ."<br/>";
print "Average rating: " . $past_concert_avg_rating . "<br/>";
print "Reviews and ratings:<br/>";
foreach ($past_concert_reviews as $index => $review) {
  print $past_concert_ratings[$index] . "/5 | " . $review . "<br/>";
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->
