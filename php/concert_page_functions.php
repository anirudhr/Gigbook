<?php
function get_concert_info($mysqli, $cid) {//returns band(s) playing and time
  $stmt = $mysqli->stmt_init();
  $get_concert_bnames_query = " SELECT rel_band_performs_concert.bname
                        FROM rel_band_performs_concert WHERE rel_band_performs_concert.cid = ?";
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
  $get_concert_details_query = "  SELECT concert.cname, concert.ctime
                                  FROM concert
                                  WHERE concert.cid = ?";
  $stmt->bind_param('i', $cid);
  if (!$stmt->execute()) {
    throw new Exception("get_concert_details: failed to execute");
  }
  $cname = NULL;
  $ctime = NULL;
  $stmt->bind_result($cname, $ctime);
  $stmt->fetch();
  return array($bnames, $cname, $ctime);
}

function get_past_concert_info($mysqli, $cid) {//returns reviews, ratings, average rating
  $stmt = $mysqli->stmt_init();
  $get_past_concert_info_query = "  SELECT review, rating
                                    FROM rel_user_attends_concert
                                    WHERE cid = ?";
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
