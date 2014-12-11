<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
</head>

<body bgcolor="#000000">


<center>
   <table border ="0"  >
 <tr >
 <td width="100%"  >
    <?php 
	$gname=$_GET['gname'];
	echo "<img src='images/genre/$gname.jpg' width='300px' height='300px'/></center>";
	?>
    </td>
    </tr>
  
   
   <?php
   require("connectdb.php");
require("genre_page_functions.php");
$gname=$_GET['gname'];
   
   try {
  $popularities_by_band = get_bands_playing_genre($mysqli, $gname);
  foreach ($popularities_by_band as $bname => $popularity) {
	 echo "<img src='images/band/$bname.jpg' style='width:100px; height:100px;'";
   	echo "$popularity . ' : ' . $bname ";
  		}
   }
	catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
}
	?>
    </table>
    </center>
	
</body>
</html>
<!--/*:indentSize=2:tabSize=2:noTabs=true:wrap=soft:*/-->