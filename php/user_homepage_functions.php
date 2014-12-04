<?php

$GETCOUNTSMALL = 3;
$GETCOUNTLARGE = 10;

function get_n_concerts($mysqli, $uname) {
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
	    $cids = array();
	    $cnames = array();
	    $bnames = array();
		$stmt->bind_param('s', $uname);
		if (!$stmt->execute()) {
			throw new Exception("get_n_concerts: failed to execute");
		}
		$cid = NULL;
		$cname = NULL;
		$bname = NULL;
		$stmt->bind_result($cid, $cname, $bname);
		while($stmt->fetch()) {
		    //print "\t" . $cid . " " . $cname . " " . $bname . "<br/>";
			array_push($cids, $cid);
			array_push($cnames, $cname);
			array_push($bnames, $bname);
		}
		return array($cids, $cnames, $bnames);
	}
}

function get_n_bands_fan($mysqli, $uname) {
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

function get_n_bands_reco($mysqli, $uname) {//sp_band_suggest_list
  global $GETCOUNTSMALL;
  $stmt = $mysqli->stmt_init();
  $get_n_bands_reco_query = "CALL sp_band_suggest_list(?, @bname)";
  if(!$stmt->prepare($get_n_bands_reco_query)) {
    throw new Exception("get_n_bands_reco: failed to prepare");
  }
  else {
    $stmt->bind_param('s', $uname);
    $num_dup_check = 5; //Check for duplicate recommendations 5 times;
    $bnames = array();
    for ($count = 0; $count < $GETCOUNTSMALL; $count++) {
      if (!$stmt->execute()) {
        throw new Exception("get_n_bands_reco: failed to execute");
      }
      $stmt->fetch();
      $result = $mysqli->query('SELECT @bname as bname');
      $row = $result->fetch_assoc();
      $bname = $row['bname'];
      if ($num_dup_check > 0) {
        if (in_array($bname, $bnames)) {
          $count--;
          $num_dup_check--;
        }
        else {
          array_push($bnames, $bname);
        }
      }
    }
    return $bnames;
  }
}

function get_n_user_posts($mysqli, $uname) {
  global $GETCOUNTLARGE;
  //static array containing posts loaded so far?
  $stmt = $mysqli->stmt_init();
  $get_n_user_posts_query = "SELECT user_posts.uname, ";
}

function get_n_band_links($mysqli, $uname) {
  global $GETCOUNTLARGE;
  $stmt = $mysqli->stmt_init();
  $get_n_user_posts_query = "SELECT ";
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->
