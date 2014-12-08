<?php
// Start the session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function showConcerts(){
	document.getElementById("innerhide").style.visibility="visible";
}
</script>
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
        	Recommendation List
            
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
    	<form method="post" action="addToList.php"/>


Choose a list to add to<br>
<select name='lname'>
<?php include "connectdb.php";

if ($stmt = $mysqli->prepare("select distinct lname from recolist where uname=?")) {
	$stmt->bind_param("s",$uname);
  $stmt->execute();
  $stmt->bind_result($lname);
  echo "<input list='lname' name='lname'>
  <datalist id='lname'>";
  while($stmt->fetch()) {
	$lname = htmlspecialchars($lname);
	echo "<option value='$lname'>$lname</option>\n";	
  }
  echo "</datalist>";
  $stmt->close();
  $mysqli->close();
}
?>
<input type="button" value="SELECT CONCERTS" onclick="showConcerts()"/>
<input type="submit" value="ADD" />
</div>
<div id="innerhide" class="innerhide" style="height:auto; border:dotted #CC3300; visibility:hidden">

<table border="1">

<?php
include "connectdb.php";
if ($stmt = $mysqli->prepare("select cname,cid from concert")) {
  $stmt->execute();
  $stmt->bind_result($cname,$cid);
  while($stmt->fetch()){?>
  <tr>
  <td><?= $cname; ?></td>
  <td><input type="checkbox" name="checkbox2[]" value="<?= $cid; ?> "/></td>
  </tr>
<?php
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
</body>
</html>