<?php
function get_bands_playing_genre($mysqli, $gname) {// Returns array of band names playing a specific genre sorted by popularity
  $stmt = $mysqli->stmt_init();
  $get_bands_playing_genre_query = "SELECT rel_band_plays_genre.bname FROM rel_band_plays_genre WHERE gname = ?";
  if(!$stmt->prepare($get_bands_playing_genre_query)) {
    throw new Exception("get_bands_playing_genre: failed to prepare");
  }
  else {
    $stmt->bind_param('s', $gname);
		if (!$stmt->execute()) {
			throw new Exception("get_bands_playing_genre: failed to execute");
		}
		$bname = NULL;
		$stmt->bind_result($bname);
		$bnames = array();
		while($stmt->fetch()) {
			array_push($bnames, $bname);
		}
		$stmt = $mysqli->stmt_init();
		$get_popularity_by_band_query = "CALL sp_band_popularity(?, @popularity)";
		if(!$stmt->prepare($get_popularity_by_band_query)) {
      throw new Exception("get_popularity_by_band_query: failed to prepare");
    }
    else {
      $popularities_by_band = array();
      foreach ($bnames as $bandname) {
        $stmt->bind_param('s', $bandname);
        if (!$stmt->execute()) {
          throw new Exception("get_popularity_by_band_query: failed to execute");
        }
        $stmt->fetch();
        $result = $mysqli->query('SELECT @popularity as popularity');
        if (!$result) {
          throw new Exception("Get popularity failed for band " . $bname);
        }
        $row = $result->fetch_assoc();
        $popularities_by_band[$bandname] = $row['popularity'];
      }
      //rsort($popularities_by_band);//sort high to low by values
      return $popularities_by_band;
		}
	}
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->
