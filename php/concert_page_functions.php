<?php
function get_concert_info($mysqli, $cid) {//returns band(s) playing and time
  $stmt = $mysqli->stmt_init();
  $get_concert_bnames_query = " SELECT rel_band_performs_concert.bname
                                FROM rel_band_performs_concert
                                WHERE rel_band_performs_concert.cid = ?";
  if(!$stmt->prepare($get_concert_bnames_query)) {
    throw new Exception("get_concert_bnames: failed to prepare");
		
  }
  $stmt->bind_param('i', $cid);
  if (!$stmt->execute()) {
    throw new Exception("get_concert_bnames: failed to execute");
		
  }
  $bname = NULL;
  $stmt->bind_result($bname);
  $bnames = array();
  while($stmt->fetch()) {
    array_push($bnames, $bname);
  }
  
  $stmt = $mysqli->stmt_init();
  $get_concert_details_query = "SELECT concert.cname, concert.ctime, concert.tkturl, concert.cover, venue.vname, venue.url, venue.capacity, venue.building, venue.street, venue.city, venue.state, venue.zip FROM concert JOIN venue ON concert.vid = venue.vid WHERE concert.cid = ?";
  if(!$stmt->prepare($get_concert_details_query)) {
		throw new Exception("get_concert_details_query: failed to prepare");
		
	}
  $stmt->bind_param('i', $cid);
  if (!$stmt->execute()) {
    throw new Exception("get_concert_details: failed to execute");
		
  }
  $cname = NULL;  $ctime = NULL;  $tkturl = NULL;  $cover = NULL;
  $vname = NULL;  $url = NULL;  $capacity = NULL;  $building = NULL;  $street = NULL;  $city = NULL;  $state = NULL;  $zip = NULL;
  $stmt->bind_result($cname, $ctime, $tkturl, $cover, $vname, $url, $capacity, $building, $street, $city, $state, $zip);
  $stmt->fetch();
  return array($bnames, $cname, $ctime, $tkturl, $cover, $vname, $url, $capacity, $building, $street, $city, $state, $zip);
}

function is_concert_past($mysqli, $cid) {
  $stmt = $mysqli->stmt_init();
  $is_concert_past_query = "SELECT concert.ctime < now() FROM concert WHERE concert.cid = ?";
  if(!$stmt->prepare($is_concert_past_query)) {
		throw new Exception("is_concert_past_query: failed to prepare");
		
	}
  $stmt->bind_param('i', $cid);
  if (!$stmt->execute()) {
    throw new Exception("is_concert_past_query: failed to execute");
    
  }
  $flag = NULL;
  $stmt->bind_result($flag);
  $stmt->fetch();
  return $flag;
}

function get_past_concert_info($mysqli, $cid) {//returns reviews, ratings, average rating
  $stmt = $mysqli->stmt_init();
  $get_past_concert_info_query = "  SELECT review, rating
                                    FROM rel_user_attends_concert
                                    WHERE cid = ?";
  if(!$stmt->prepare($get_past_concert_info_query)) {
		throw new Exception("get_past_concert_info_query for past: failed to prepare");
		
	}
  $stmt->bind_param('i', $cid);
  if (!$stmt->execute()) {
    throw new Exception("get_past_concert_info: failed to execute");
    
  }
  $review = NULL;
  $rating = NULL;
  $avg_rating = 0;
  $stmt->bind_result($review, $rating);
  $reviews = array();
  $ratings = array();
  
  while($stmt->fetch()) {
    array_push($reviews, $review);
    array_push($ratings, $rating);
    $avg_rating += $rating;
  }
  if (count($ratings)) {
    $avg_rating /= count($ratings);
  }
  else {
    $avg_rating = 0;
  }
  return array($reviews, $ratings, $avg_rating);
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->
