<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
</head>

<body bgcolor="#000000">

<?php
require("connectdb.php");
require("genre_page_functions.php");
$gname=$_GET['gname'];


?>
<center>
   <table border ="0"  >
 <tr >
 <td width="100%"  >
    <?php echo "<img src=$gname.jpg width='100%'/>";?>
    </td>
    </tr>
   <tr><td><a href="genre_page_by_popularity.php?gname=<?=$gname;?>" style="color:#CCC; padding-left:20px; padding-right:0"  ><input type="button" value="Sort by popularity"/></a></td></tr>
   
   <?php
   
   try {
  $popularities_by_band = get_bands_playing_genre($mysqli, $gname);
  foreach ($popularities_by_band as $bname => $popularity) {
	
   	echo "<tr><td>$popularity . ' : ' . $bname </td></tr>";
  		}
   }
	catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
}
	?>
    </table>
    </center>
	<?php
 $stmt->close();
	$mysqli->close();
    
?>
</body>
</html>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->