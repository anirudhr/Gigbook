<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
</head>

<body bgcolor="#000000">

<?php
require("connectdb.php");
$gname=$_GET['gname'];
echo $gname;
if($stmt = $mysqli->prepare("select distinct bname from rel_band_plays_genre where gname = ? ")) {
	
	$stmt->bind_param('s', $gname);
	
  $stmt->execute();
   $stmt->bind_result($bname);
   ?>
   <center>
   <table border ="0" cellspacing="20" >
 <tr >
 <td width="100%" colspan="4" >
    <?php echo "<center><img src='images/genre/$gname.jpg' width='300px' height='300px'/></center>";?>
    </td>
    </tr>
   <tr><td><a href="genre_page_by_popularity.php?gname=<?=$gname;?>" style="color:#CCC;"  ><input type="button" value="Sort by popularity"/></a></td></tr>
   <tr>
   <?php
    while ($stmt->fetch()) {?>
	<td width="100"><?php echo "<img src='images/band/$bname.jpg' style='width:100px; height:100px;'/>";?></td><td><a href style='text-decoration:none; color:#FFF; font-size:24px; '><?=$bname;?></a></td>
    <td><input type="submit" value="BECOME A FAN" /></td>
    <td><input type="button" value="CHECK THEIR PAGE"/></td>
   	
    <?php
	}
	
	?>
    </tr>
    </table>
    </center>
	<?php
 $stmt->close();
	$mysqli->close();
    }
?>
</body>
</html>