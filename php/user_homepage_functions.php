<?php
function get3concerts($mysqli, $uname) {
	$stmt = $mysqli->stmt_init();
	
	$get3concerts_query = "	SELECT concert.cid, concert.cname, rel_band_performs_concert.bname
				FROM rel_user_attends_concert
				JOIN concert ON rel_user_attends_concert.cid = concert.cid
				JOIN rel_band_performs_concert ON rel_band_performs_concert.cid = rel_user_attends_concert.cid
				WHERE rel_user_attends_concert.uname = ?
				AND concert.ctime > NOW()
				ORDER BY concert.ctime ASC
				LIMIT 3";
	
	if(!$stmt->prepare($get3concerts_query)) {
		throw new Exception("get3concerts: failed to prepare statement");
	}
	else {
	    $cids = array();
	    $cnames = array();
	    $bnames = array();
		$stmt->bind_param('s', $uname);
		if (!$stmt->execute()) {
			throw new Exception("get3concerts: failed to execute");
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

function get3bandsfan($mysqli, $uname, &$bnames) {
	$stmt = $mysqli->stmt_init();
	$get3bandsfan_query = " SELECT bname FROM rel_user_fan_band
                          WHERE uname = ?
                          ORDER BY RAND()
                          LIMIT 3";
	
	if(!$stmt->prepare($get3bandsfan_query)) {
		throw new Exception("get3bandsfan: failed to prepare");
	}
	else {
		$stmt->bind_param('s', $uname);
		if (!$stmt->execute()) {
			throw new Exception("get3bandsfan: failed to execute");
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
  $get3bandsreco_query = "CALL sp_band_suggest_list(?, @bname)";
  if(!$stmt->prepare($get3bandsreco_query)) {
    throw new Exception("get3bandsreco: failed to prepare");
  }
  else {
    $stmt->bind_param('s', $uname);
    $num_dup_check = 5; //Check for duplicate recommendations 5 times;
    //$bnames = array();
    for ($count = 0; $count < 3; $count++) {
      if (!$stmt->execute()) {
        throw new Exception("get3bandsreco: failed to execute");
      }
      //$stmt->bind_result($bname);
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
    //return $bnames;
  }
}

function getnext10userposts($mysqli, $uname) {
  //static
  //array containing posts loaded so far?
}

function getnext10bandlinks($mysqli, $uname) {
  
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->
