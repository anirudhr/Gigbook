<!DOCTYPE html>
<html>
<head>
<title>Gigbook</title>
<style>
</style>
</head>
<body>

<?php
require("connectdb.php");
require("genre_page_functions.php");
$gname = 'Rock';
try {
  $popularities_by_band = get_bands_playing_genre($mysqli, $gname);
  foreach ($popularities_by_band as $bname => $popularity) {
    print $popularity . ' : ' . $bname . '<br/>';
  }
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->