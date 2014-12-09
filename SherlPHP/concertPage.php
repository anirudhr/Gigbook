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

 <body>
<?php
require("connectdb.php");
require("user_homepage_functions.php");
$uname = $_SESSION['name'];
//$cid = $_GET['cid'];
$cid=2;
 ?>
<div id="wrapper" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto;"> 
 
  <div id="inner-1" style="float:left; width:60%;border:dotted #CC3300; ">
    WELCOME <?= $uname; ?>
  </div>
 
  <div id="inner-2" style="float:right; width:30%; border:dotted #CC3300;"> 
    <form style="float:right;" action="userSearch" method='post'>
    <input type="text" placeholder="Search for users" name="searcheduser"/>
    <input type="button" value=" Logout" onclick="logout()"/>
    </form>
  </div>
</div>
<div id="wrapper" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto;"> 
  <?php echo "<img src='images/concert_images/$cid.jpg' style='width:100%; height:200px;'/>";?>
  
</div>
<div id="homebody" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto; ">
	<div id="sidebar" style="float:left; width:29%;border:dotted #CC3300; ">
    	
         <div id="linklist" style=" height:59%;border:dotted #CC3300; ">
        	 <a href="profile.php" style="text-decoration:none;">Profile</a><br />
   			 <a href="userFollows.php" style="text-decoration:none;">Follow</a><br />
             <a href="userLikesGenre.php" style="text-decoration:none;" >Genre</a><br />
             <a href="userLikesBands.php" style="text-decoration:none;">Bands</a><br />
             <a href="userLists.php" style="text-decoration:none;">Lists</a>
             
			 
    	</div>
    
  </div>
 
  <div id="inner-2" style="float:right; width:68%; border:dotted #CC3300;"> 
  <div id="inner-2" style="height:19%; border:dotted #CC3300;">
          <?php 
		if ($stmt=$mysqli->prepare("Select cname,ctime,postedtime,tkturl,cover,vname,building, street,city,capacity,url,state,zip from concert natural join venue where cid=?")){
	$stmt->bind_param("i", $cid);
  $stmt->execute();
 $stmt->bind_result($cname,$ctime,$postedtime,$tkturl,$cover,$vname,$building, $street,$city,$capacity,$url,$state,$zip);
while ($stmt->fetch()) {


?>

<table border="0">
<tr>
<td><label>Concert name :</label></td>
<td><label><?=$cname;?></label></td>
</tr>
<tr>
<td><label>Concert time :</label></td>
<td><label><?=$ctime;?></label></td>
</tr>
<tr>
<td><label>Cover price :</label></td>
<td><label><?=$cover;?></label></td>
</tr>
<tr>
<td><label>Ticket URL :</label></td>
<td><label><a href='http://<?=$tkturl;?>'><?=$tkturl;?></label></td>
</tr>
<tr>
<td><label>Venue :</label></td>
<td><label><a href='http://<?=$url;?>'><?=$vname;?></a><br />
<?=$building;?> <?=$street;?>,
<?=$city;?>, <?=$state;?> <?=$zip;?><br />
</label></td>
</tr>
<tr>
<td><label>Capacity: :</label></td>
<td><label><?=$capacity;?></label></td>
</tr>

<?php
}}
?>
</table>


        </div>
    	
  </div>

</body>
</html>
        	