<?php

$GETCOUNTSMALL = 3;
$GETCOUNTLARGE = 10;

function get_n_concerts($mysqli, $bname, $flagstr) {//Function that returns an array of arrays (cids, cnames, bnames) $GETCOUNTSMALL long. Use: list($cids, $cnames, $bnames) = get_n_concerts($mysqli, $usrname);
  global $GETCOUNTSMALL;
	$stmt = $mysqli->stmt_init();
	
	if ($flagstr == 'n') {
    $get_n_concerts_query = "	SELECT concert.cid, concert.cname, rel_band_performs_concert.bname
          FROM rel_band_performs_concert
          JOIN concert ON rel_band_performs_concert.cid = concert.cid
          WHERE rel_band_performs_concert.bname = ?
          AND concert.ctime > NOW()
          ORDER BY concert.ctime ASC
          LIMIT " . $GETCOUNTSMALL;
  }
  else if ($flagstr == 'old') {
    $get_n_concerts_query = "	SELECT concert.cid, concert.cname, rel_band_performs_concert.bname
          FROM rel_band_performs_concert
          JOIN concert ON rel_band_performs_concert.cid = concert.cid
          WHERE rel_band_performs_concert.bname = ?
          AND concert.ctime < NOW()
          ORDER BY concert.ctime ASC";
  }
	
	if(!$stmt->prepare($get_n_concerts_query)) {
		throw new Exception("get_n_concerts: failed to prepare statement");
	}
	else {
		$stmt->bind_param('s', $bname);
		if (!$stmt->execute()) {
			throw new Exception("get_n_concerts: failed to execute");
		}
		$cid = NULL;
		$cname = NULL;
		$bname = NULL;
		$stmt->bind_result($cid, $cname, $bname);
    $cids = array();
    $cnames = array();
    $bnames = array();
		while($stmt->fetch()) {
			array_push($cids, $cid);
			array_push($cnames, $cname);
			array_push($bnames, $bname);
		}
		return array($cids, $cnames, $bnames);
	}
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
	else {
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
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->
