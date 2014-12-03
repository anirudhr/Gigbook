<?php
function get3concerts($mysqli, $uname, &$cids, &$cnames, &$bnames) {
	$stmt = $mysqli->stmt_init();
	
	$get3concerts_query = "	SELECT concert.cid, concert.cname, rel_band_performs_concert.bname
				FROM rel_user_attends_concert
				JOIN concert ON rel_user_attends_concert.cid = concert.cid
				JOIN rel_band_performs_concert ON rel_band_performs_concert.cid = rel_user_attends_concert.cid
				WHERE rel_user_attends_concert.uname = ?
				AND concert.ctime > NOW()
				ORDER BY concert.ctime ASC
				LIMIT 3"
	
	if(!$stmt->prepare($get3concerts_query)) {
		//fail
	}
	else {
		$stmt->bind_param('s', $uname);
		if (!$stmt->execute()) {
			//fail
		}
		$cid = NULL;
		$cname = NULL;
		$bname = NULL;
		$stmt->bind_result($cid, $cname, $bname);
		while($stmt->fetch()) {
			array_push($cids, $cid);
			array_push($cnames, $cname);
			array_push($bnames, $bname);
		}
	}
}

function get3bands($mysqli, $uname, &$bnames) {
	$stmt = $mysqli->stmt_init();
	
	$get3bands_query = " SELECT bname FROM rel_user_fan_band
                          WHERE uname = ?
                          ORDER BY RAND()
                          LIMIT 3"
	
	if(!$stmt->prepare($get3bands_query)) {
		//fail
	}
	else {
		$stmt->bind_param('s', $uname);
		if (!$stmt->execute()) {
			//fail
		}
		$bname = NULL;
		$stmt->bind_result($bname);
		while($stmt->fetch()) {
			array_push($bnames, $bname);
		}
	}
}
?>
