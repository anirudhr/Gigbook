<?php
// Start the session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php
require("connectdb.php");
$uname = $_SESSION['name'];
if ($stmt = $mysqli->prepare("SELECT genre.gname
FROM genre
WHERE genre.gname NOT IN (  SELECT rel_user_likes_genre.gname
                            FROM rel_user_likes_genre
                            WHERE rel_user_likes_genre.uname = ?
                         )")) {
	$stmt->bind_param('s', $uname);
  $stmt->execute();
  $stmt->bind_result($gname);
  echo $gname;
  $count=0;?>
  
   <table border="0" cellspacing="10">
   
    <tr >
  <?php
  while($stmt->fetch()) {
	$gname = htmlspecialchars($gname);
	
	if ($count==5) 
	{echo "<tr>"; $count=0;}?>
   <form action="likegenre.php" method="post">
    <td background="genrepic.jpg" WIDTH="300" HEIGHT="300" VALIGN="bottom" align="center"style="opacity:0.85" >
    <FONT SIZE="+1" COLOR="#FFFFFF"><?=$gname;?></FONT>
    <input type="hidden" name='gname' value='<?=$gname;?>'/>
    <a href="DisplayBandAcctoGenre.php?gname=<?=$gname;?>" style="color:#CCC; padding-left:20px; padding-right:0"  >Bands</a>
	<input type="submit" class="myButton" value="LIKE" style="float:right"/>
  </td>
  </form>
  
  
<?php
$count=$count+1;
  }?>
  </tr>
  
  </table>
  <?php
$stmt->close();
  $mysqli->close();
 }
?>
</body>
</html>