<?php
// Start the session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body >
<?php
require("connectdb.php");
$uname = $_SESSION['name'];
 ?>
 <body>
<div id="wrapper" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto;"> 
 
  <div id="inner-1" style="float:left; width:60%;border:dotted #CC3300; ">
    WELCOME <?= $uname; ?>
  </div>
 
  <div id="inner-2" style="float:right; width:30%; border:dotted #CC3300;"> 
    <form style="float:right;">
  
    <input type="button" value=" Logout"/>
    </form>
  </div>
</div>
<div id="homebody" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto; ">
	<div id="sidebar" style="float:left; width:29%;border:dotted #CC3300; ">
    	<div id="profile" style=" height:39%;border:dotted #CC3300; ">
        	<div class="circular"><?php echo "<img src='images/user/$uname.jpg' style='width:200px; height:200px;'/>";?></div>
   			 
    	</div>
        <div id="linklist" style=" height:59%;border:dotted #CC3300; ">
        	 <a href="profile.php" style="text-decoration:none;">Profile</a><br />
   			 <a href="userFollows.php" style="text-decoration:none;">Follow</a><br />
             <a href="userLikesGenre.php" style="text-decoration:none;" >Genre</a><br />
             <a href="userLikesBands.php" style="text-decoration:none;">Bands</a><br />
             <a href="userLists.php" style="text-decoration:none;">Lists</a>
             
			 
    	</div>
    
  </div>
 
  <div id="inner-2" style="float:right; width:68%; border:dotted #CC3300;"> 
 	 <div id="inner-2" style="height:19%; border:dotted #CC3300; text-align:center;">
        	Bands you like
            
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
    	

<table border="0" width="100%" cellspacing="20">
<tr><td colspan="2"  ><input type="button" value="BAND ACCORDING TO GENRE PLAYED" onclick="window.location='genre.php'"/></td><td>
<form action="searchBands.php" method="post">
<input type="text" value="" placeholder="Enter band name" name="band" id="band"/>
<input type="submit" value="SEARCH"/>
</form>
</td>
</tr>
<tr>
<?php 
$count =0;
if ($stmt = $mysqli->prepare("select bname from rel_user_fan_band where uname = ?")) {
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($bname);
  while($stmt->fetch()){
	  if ($count==2) 
	{echo "<tr>"; $count=0;}
	  ?>
<td width="100"><?php echo "<img src='images/band/$bname.jpg' style='width:100px; height:100px;'/>";?></td><td  style="text-align:left;"><?= $bname; ?></td>
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
</form>
  
  </div>
</div>
</body>
</html>