<?php
function get_user_liked_bands($mysqli, $uname) {
  $stmt = $mysqli->stmt_init();
  $get_user_liked_bands_query = " SELECT rel_user_fan_band.bname, rel_band_plays_genre.gname
                                  FROM rel_user_fan_band
                                  JOIN rel_band_plays_genre on rel_user_fan_band.bname = rel_band_plays_genre.bname
                                  WHERE rel_user_fan_band.uname = ?";
  if(!$stmt->prepare($get_user_liked_bands_query)) {
    throw new Exception("get_bands_playing_genre: failed to prepare");
  }
  $stmt->bind_param('s', $uname);
  if (!$stmt->execute()) {
    throw new Exception("get_user_liked_bands: failed to execute");
  }
  $bname = NULL;
  $gname = NULL;
  $stmt->bind_result($bname, $gname);
  $bnames = array();
  $gnames = array();
  while($stmt->fetch()) {
    array_push($bnames, $bname);
    array_push($gnames, $gname);
  }
  return array($bnames, $gnames);
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->