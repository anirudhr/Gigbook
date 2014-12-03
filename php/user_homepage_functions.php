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

function get3bandsfan($mysqli, $uname, &$bnames) {
	$stmt = $mysqli->stmt_init();
	$get3bandsfan_query = " SELECT bname FROM rel_user_fan_band
                          WHERE uname = ?
                          ORDER BY RAND()
                          LIMIT 3"
	
	if(!$stmt->prepare($get3bandsfan_query)) {
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

function get3bandsreco($mysqli, $uname, &$bnames) {//sp_band_suggest_list
    $stmt = $mysqli->stmt_init();
    $get3bandsreco_query = "CALL sp_band_suggest_list(?, ?)"
    if(!$stmt->prepare($get3bandsreco_query)) {
		//fail
	}
	else {
		$stmt->bind_param('s', $uname);
		for ($count = 0; $count < 3; $count++;) {
		    if (!$stmt->execute()) {
                //fail
            }
            $bname = NULL;
            $stmt->bind_result($bname);
            $stmt->fetch();
            array_push($bnames, $bname);
        }
	}
}
?>
<!--/*:indentSize=4:tabSize=4:noTabs=true:wrap=soft:*/-->
