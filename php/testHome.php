<?php
//:indentSize=4:tabSize=4:noTabs=true:wrap=soft:
	require("connectdb.php");
	require("user_homepage_functions.php");
	$uname = 'Bob';
	echo get_user_rep($mysqli, $uname);
?>
