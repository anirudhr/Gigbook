<?php
function get_user_liked_bands($mysqli, $uname) {
  $stmt = $mysqli->stmt_init();
  $get_user_liked_bands_query = " SELECT rel_user_fan_band.bname, rel_band_performs_concert.cid, concert.cname
                                  FROM rel_user_fan_band
                                  JOIN rel_band_performs_concert on rel_user_fan_band.bname = rel_band_performs_concert.bname
                                  JOIN concert on concert.cid = rel_band_performs_concert.cid
                                  WHERE rel_user_fan_band.uname = ?
                                  AND concert.ctime > NOW()
                                  ORDER BY concert.ctime ASC";
  if(!$stmt->prepare($get_user_liked_bands_query)) {
    throw new Exception("get_bands_playing_genre: failed to prepare");
		
  }
  $stmt->bind_param('s', $uname);
  if (!$stmt->execute()) {
    throw new Exception("get_user_liked_bands: failed to execute");
		
  }
  $bname = NULL;
  $cid = NULL;
  $cname = NULL;
  $stmt->bind_result($bname, $cid, $cname);
  $bnames = array();
  $cids = array();
  $cnames = array();
  while($stmt->fetch()) {
    array_push($bnames, $bname);
    array_push($cids, $cid);
    array_push($cnames, $cname);
  }
  return array($bnames, $cids, $cnames);
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->