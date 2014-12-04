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
require("user_liked_bands_functions.php");
$uname = 'Alice';
try {
  list($user_liked_bnames, $user_liked_gnames) = get_user_liked_bands($mysqli, $uname);
  for ($i = 0; $i < count($user_liked_bnames); $i++) {
    print $user_liked_bnames[$i] . " : " . $user_liked_gnames[$i] . "<br/>";
  }
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
}
?>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->