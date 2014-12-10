<?php

function get_attended_concerts($mysqli, $uname) { //function that returns details of all old concerts attended by user to post reviews and ratings
  $stmt = $mysqli->stmt_init();
  $get_attended_concerts_query = "	SELECT concert.cid, concert.cname, rel_band_performs_concert.bname, concert.ctime, venue.vname, venue.building, venue.street, venue.city, venue.state, venue.zip, venue.url
                                    FROM rel_user_attends_concert
                                    JOIN concert ON rel_user_attends_concert.cid = concert.cid
                                    JOIN venue ON venue.vid = concert.vid
                                    JOIN rel_band_performs_concert ON rel_band_performs_concert.cid = concert.cid
                                    WHERE rel_user_attends_concert.uname = ?
                                    AND concert.ctime < NOW()
                                    ORDER BY concert.ctime DESC";
	if(!$stmt->prepare($get_attended_concerts_query)) {
		throw new Exception("get_attended_concerts_query: failed to prepare statement");
		
	}
  $stmt->bind_param('s', $uname);
  if (!$stmt->execute()) {
    throw new Exception("get_attended_concerts_query: failed to execute");
		
  }
  $cid = NULL;
  $cname = NULL;
  $bname = NULL;
  $ctime = NULL;
  $vname = NULL;
  $building = NULL;
  $street = NULL;
  $city = NULL;
  $state = NULL;
  $zip = NULL;
  $url = NULL;
  $stmt->bind_result($cid, $cname, $bname, $ctime, $vname, $building, $street, $city, $state, $zip, $url);
  $cids = array();
  $cnames = array();
  $bnames = array();
  $ctimes = array();
  $vnames = array();
  $buildings = array();
  $streets = array();
  $citys = array();
  $states = array();
  $zips = array();
  $urls = array();
  while($stmt->fetch()) {
    array_push($cids, $cid);
    array_push($cnames, $cname);
    array_push($bnames, $bname);
    array_push($ctimes, $ctime);
    array_push($vnames, $vname);
    array_push($buildings, $building);
    array_push($streets, $street);
    array_push($citys, $city);
    array_push($states, $state);
    array_push($zips, $zip);
    array_push($urls, $url);
  }
  return array($cids, $cnames, $bnames, $ctimes, $vnames, $buildings, $streets, $citys, $states, $zips, $urls);
}

?>

<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->
