<?php

$GETCOUNTSMALL = 3;
$GETCOUNTLARGE = 10;

function get_n_concerts($mysqli, $uname) {//Function that returns an array of arrays (cids, cnames, bnames) $GETCOUNTSMALL long. Use: list($cids, $cnames, $bnames) = get_n_concerts($mysqli, $usrname);
  global $GETCOUNTSMALL;
	$stmt = $mysqli->stmt_init();
	
	$get_n_concerts_query = "	SELECT concert.cid, concert.cname, rel_band_performs_concert.bname
				FROM rel_user_attends_concert
				JOIN concert ON rel_user_attends_concert.cid = concert.cid
				JOIN rel_band_performs_concert ON rel_band_performs_concert.cid = rel_user_attends_concert.cid
				WHERE rel_user_attends_concert.uname = ?
				AND concert.ctime > NOW()
				ORDER BY concert.ctime ASC
				LIMIT " . $GETCOUNTSMALL;
	
	if(!$stmt->prepare($get_n_concerts_query)) {
		throw new Exception("get_n_concerts: failed to prepare statement");
	}
	else {
		$stmt->bind_param('s', $uname);
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

function get_n_bands_fan($mysqli, $uname) {//Function that returns an array of $GETCOUNTSMALL bnames which the user is a fan of
  global $GETCOUNTSMALL;
	$stmt = $mysqli->stmt_init();
	$get_n_bands_fan_query = " SELECT bname FROM rel_user_fan_band
                          WHERE uname = ?
                          ORDER BY RAND()
                          LIMIT $GETCOUNTSMALL";
	
	if(!$stmt->prepare($get_n_bands_fan_query)) {
		throw new Exception("get_n_bands_fan: failed to prepare");
	}
	else {
		$stmt->bind_param('s', $uname);
		if (!$stmt->execute()) {
			throw new Exception("get_n_bands_fan: failed to execute");
		}
		$bname = NULL;
		$stmt->bind_result($bname);
		$bnames = array();
		while($stmt->fetch()) {
			array_push($bnames, $bname);
		}
		return $bnames;
	}
}

function get_n_bands_reco($mysqli, $uname) {//Function that returns up to $GETCOUNTSMALL recommended bands, no duplicates per call
  global $GETCOUNTSMALL;
  $stmt = $mysqli->stmt_init();
  $get_n_bands_reco_query = "CALL sp_band_suggest_list(?, @bname)";
  if(!$stmt->prepare($get_n_bands_reco_query)) {
    throw new Exception("get_n_bands_reco: failed to prepare");
  }
  $stmt->bind_param('s', $uname);
  $num_dup_check = 5; //Check for duplicate recommendations 5 times;
  $bnames = array();
  for ($count = 0; $count < $GETCOUNTSMALL; $count++) {
    if (!$stmt->execute()) {
      throw new Exception("get_n_bands_reco: failed to execute");
    }
    $stmt->fetch();
    $result = $mysqli->query('SELECT @bname as bname');
    if (!$result) {
      throw new Exception("Get bname failed");
    }
    $row = $result->fetch_assoc();
    $bname = $row['bname'];
    if ($num_dup_check > 0) {
      if (in_array($bname, $bnames) || $bname == '') {
        $count--;
        $num_dup_check--;
      }
      else {
        array_push($bnames, $bname); //only add if not a dupe
      }
    }
  }
  return $bnames;
}

function get_n_user_posts($mysqli, $uname) { //get posts by users that this user follows, sorted by time
  //global $GETCOUNTLARGE;
  //static $loadedposts = //string containing postids loaded so far
  $stmt = $mysqli->stmt_init();
  $get_n_user_posts_query = " SELECT user_posts.uname, user_posts.postid, user_posts.bname, concert.cname, user_posts.postinfo,user_posts.postedtime
                              FROM user_posts
                              JOIN rel_user_follows_user ON rel_user_follows_user.followee = user_posts.uname
                              JOIN concert ON concert.cid = user_posts.cid
                              WHERE rel_user_follows_user.follower = ?
                              ORDER BY user_posts.postedtime ASC"; //no limit
  if(!$stmt->prepare($get_n_user_posts_query)) {
		throw new Exception("get_n_user_posts: failed to prepare");
	}
	else {
		$stmt->bind_param('s', $uname);
		if (!$stmt->execute()) {
			throw new Exception("get_n_user_posts: failed to execute");
		}
		$uname = NULL;
		$postid = NULL;
		$bname = NULL;
		$cid = NULL;
		$postinfo = NULL;
		$posttime = NULL;
		$stmt->bind_result($uname, $postid, $bname, $cid, $postinfo,$posttime);
		$unames = array();
		$postids = array();
		$bnames = array();
		$cids = array();
		$postinfos = array();
		$posttimes = array();
		while($stmt->fetch()) {
			array_push($unames, $uname);
      array_push($postids, $postid);
      array_push($bnames, $bname);
      array_push($cids, $cid);
      array_push($postinfos, $postinfo);
	  array_push($posttimes, $posttime);
		}
		return array($unames, $postids, $bnames, $cids, $postinfos,$posttimes);
	}
}

function get_n_band_links($mysqli, $uname) {//get links posted by bands the user is a fan of sorted in order
  //global $GETCOUNTLARGE;
  //static $loadedposts = //string containing linkids loaded so far
  $stmt = $mysqli->stmt_init();
  $get_n_band_links_query = " SELECT band_links.linkid, rel_user_fan_band.bname, band_links.linkurl, band_links.linkinfo
                              FROM band_links
                              JOIN rel_user_fan_band ON rel_user_fan_band.bname = band_links.bname
                              WHERE uname = ?
                              ORDER BY band_links.postedtime ASC";//no limits
  if(!$stmt->prepare($get_n_band_links_query)) {
		throw new Exception("get_n_band_links_query: failed to prepare");
	}
	else {
		$stmt->bind_param('s', $uname);
		if (!$stmt->execute()) {
			throw new Exception("get_n_band_links_query: failed to execute");
		}
		$linkid = NULL;
		$bname = NULL;
		$linkurl = NULL;
		$linkinfo = NULL;
		$stmt->bind_result($linkid, $bname, $linkurl, $linkinfo);
		$linkids = array();
		$bnames = array();
		$linkurls = array();
		$linkinfos = array();
		while($stmt->fetch()) {
			array_push($linkids, $linkid);
			array_push($bnames, $bname);
			array_push($linkurls, $linkurl);
			array_push($linkinfos, $linkinfo);
		}
		return array($linkids, $bnames, $linkurls, $linkinfos);
	}
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->
