<?php

$GETCOUNTSMALL = 3;
$GETCOUNTLARGE = 10;

function get_n_concerts($mysqli, $bname, $flagstr) {//Function that returns an array of arrays (cids, cnames, bnames) $GETCOUNTSMALL long. Use: list($cids, $cnames, $bnames) = get_n_concerts($mysqli, $usrname);
  global $GETCOUNTSMALL;
	$stmt = $mysqli->stmt_init();
	
	if ($flagstr == 'n') {
    $get_n_concerts_query = "	SELECT concert.cid, concert.cname, rel_band_performs_concert.bname, venue.vname, venue.building, venue.street, venue.city, venue.state, venue.zip, venue.capacity, venue.url, venue.lat, venue.lng
                              FROM rel_band_performs_concert
                              JOIN concert ON rel_band_performs_concert.cid = concert.cid
                              JOIN venue ON venue.vid = concert.vid
                              WHERE rel_band_performs_concert.bname = ?
                              AND concert.ctime > NOW()
                              ORDER BY concert.ctime ASC
                              LIMIT " . $GETCOUNTSMALL;
  }
  else if ($flagstr == 'old') {
    $get_n_concerts_query = "	SELECT concert.cid, concert.cname, rel_band_performs_concert.bname, venue.vname, venue.building, venue.street, venue.city, venue.state, venue.zip, venue.capacity, venue.url, venue.lat, venue.lng
                              FROM rel_band_performs_concert
                              JOIN concert ON rel_band_performs_concert.cid = concert.cid
                              JOIN venue ON venue.vid = concert.vid
                              WHERE rel_band_performs_concert.bname = ?
                              AND concert.ctime > NOW()
                              ORDER BY concert.ctime ASC
                              LIMIT " . $GETCOUNTSMALL;
  }
	
	if(!$stmt->prepare($get_n_concerts_query)) {
		throw new Exception("get_n_concerts: failed to prepare statement");
		
	}
  $stmt->bind_param('s', $bname);
  if (!$stmt->execute()) {
    throw new Exception("get_n_concerts: failed to execute");
		
  }
  $cid = NULL;
  $cname = NULL;
  $bname = NULL;
  $vname = NULL;
  $building = NULL;
  $street = NULL;
  $city = NULL;
  $state = NULL;
  $zip = NULL;
  $capacity = NULL;
  $url = NULL;
  $lat = NULL;
  $lng = NULL;
  $stmt->bind_result($cid, $cname, $bname, $vname, $building, $street, $city, $state, $zip, $capacity, $url, $lat, $lng);
  $cids = array();
  $cnames = array();
  $bnames = array();
  $vnames = array();
  $buildings = array();
  $streets = array();
  $citys = array();
  $states = array();
  $zips = array();
  $capacitys = array();
  $urls = array();
  $lats = array();
  $lngs = array();
  while($stmt->fetch()) {
    array_push($cids, $cid);
    array_push($cnames, $cname);
    array_push($bnames, $bname);
    array_push($vnames, $vname);
    array_push($buildings, $building);
    array_push($streets, $street);
    array_push($citys, $city);
    array_push($states, $state);
    array_push($zips, $zip);
    array_push($capacitys, $capacity);
    array_push($urls, $url);
    array_push($lats, $lat);
    array_push($lngs, $lng);
  }
  return array($cids, $cnames, $bnames, $vnames, $buildings, $streets, $citys, $states, $zips, $capacitys, $urls, $lats, $lngs);
}

function get_band_genres($mysqli, $bname) {
  $stmt = $mysqli->stmt_init();
  $get_band_genres_query = "SELECT gname
                            FROM rel_band_plays_genre
                            WHERE bname = ?
                            ORDER BY gname ASC";
  if(!$stmt->prepare($get_band_genres_query)) {
		throw new Exception("get_band_genres_query: failed to prepare");
		
	}
  $stmt->bind_param('s', $bname);
  if (!$stmt->execute()) {
    throw new Exception("get_band_genres_query: failed to execute");
		
  }
  $gname = NULL;
  $stmt->bind_result($gname);
  $gnames = array();
  while($stmt->fetch()) {
    array_push($gnames, $gname);
  }
		return $gnames;
}

function get_n_band_links($mysqli, $bname) {//get links posted by the band sorted in order
  //global $GETCOUNTLARGE;
  //static $loadedposts = //string containing linkids loaded so far
  $stmt = $mysqli->stmt_init();
  $get_n_band_links_query = " SELECT linkid, linkurl, linkinfo
                              FROM band_links
                              WHERE bname = ?
                              ORDER BY band_links.postedtime ASC";//no limits
  if(!$stmt->prepare($get_n_band_links_query)) {
		throw new Exception("get_n_band_links_query: failed to prepare");
		
	}
  $stmt->bind_param('s', $bname);
  if (!$stmt->execute()) {
    throw new Exception("get_n_band_links_query: failed to execute");
		
  }
  $linkid = NULL;
  $linkurl = NULL;
  $linkinfo = NULL;
  $stmt->bind_result($linkid, $linkurl, $linkinfo);
  $linkids = array();
  $linkurls = array();
  $linkinfos = array();
  while($stmt->fetch()) {
    array_push($linkids, $linkid);
    array_push($linkurls, $linkurl);
    array_push($linkinfos, $linkinfo);
  }
  return array($linkids, $linkurls, $linkinfos);
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->
