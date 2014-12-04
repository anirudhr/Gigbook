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
  $bandbypopularities = get_bands_playing_genre($mysqli, $gname);
  foreach ($bandbypopularities as $popularity => $bname) {
    print $popularity . ' : ' . $bname . '<br/>';
  }
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->