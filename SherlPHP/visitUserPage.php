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
include("connectdb.php");
require("user_homepage_functions.php");
$mainUser = $_SESSION['name'];
$uname = $_GET['user'];
$next_n_concerts_cids = array(); $next_n_concerts_cnames = array(); $next_n_concerts_bnames = array();
$rand_n_bands_fan = array();
$rand_n_bands_reco = array();
try {
  list($next_n_concerts_cids, $next_n_concerts_cnames, $next_n_concerts_bnames) = get_n_concerts($mysqli, $uname);
  $rand_n_bands_fan = get_n_bands_fan($mysqli, $uname);
  //$rand_n_bands_reco = get_n_bands_reco($mysqli, $uname);
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
  exit();
}
 ?>
<div id="wrapper" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto;"> 
 
  <div id="inner-1" style="float:left; width:60%;border:dotted #CC3300; ">
    WELCOME <?= $mainUser; ?>
  </div>
 
  <div id="inner-2" style="float:right; width:30%; border:dotted #CC3300;"> 
    <form style="float:right;" action="searchUsers.php" method='post'>
    <input type="text" placeholder="Search for users" name="followee"/>
    <input type="submit" value="search"/>
    <input type="button" value=" Logout" onclick="logout()"/>
    </form>
  </div>
</div>
<div id="homebody" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto; ">
	<div id="sidebar" style="float:left; width:29%;border:dotted #CC3300; ">
    	<div id="circular" style=" height:39%;border:dotted #CC3300; ">
   			 <?php echo "<img src='images/user/$uname.jpg' style='width:200px; height:200px;'/>";?>
    	</div>
         <div id="linklist" style=" height:59%;border:dotted #CC3300; ">
        	 <form action="follows.php" method="post">
         <input type="hidden" name="followee" value="<?=$uname?>"/>
        	<input type="submit" value="FOLLOW!"/>
            </form>
             
			 
    	</div>
    
  </div>
 
  <div id="inner-2" style="float:right; width:68%; border:dotted #CC3300;"> 
  <div id="inner-2" style="height:19%; border:dotted #CC3300;">
         <?php 
		$result=$mysqli->query("Select * from user where uname='$uname'");
	if(! $result)
{
	die("Error");
}
$row_cnt = $result->num_rows;
if($row_cnt==0)
{
		echo "No result";
	
}
else
{  
while($row=$result->fetch_assoc())
	{
		 	 	 	 	
		
		$user=$row["uname"];
		$email=$row["email"];
		
		$pwd=$row["password"];
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$city=$row["city"];
	
	$dob=$row["birthdate"];
	}
     
	
}



?>

<table border="0">
<tr>
<td><label>Firstname:</label></td>
<td><label><?=$firstname;?></label></td>
</tr>
<tr>
<td><label>Lastname</label></td>
<td><label><?=$lastname;?></label></td>
</tr>
<tr>
<td><label>Birthdate</label></td>
<td><label><?=$dob;?></label></td>
</tr>
<tr>
<td><label>City</label></td>
<td><label><?=$city;?></label></td>
</tr>



</table>

        </div>
    	<div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Next 3 upcoming concerts
      <?php
			
print "Next n concerts:" . "<br/>";
for ($i = 0; $i < $GETCOUNTSMALL && $i < count($next_n_concerts_cids); $i++) {
  print "\tcid: " . $next_n_concerts_cids[$i] . "<br/>";
  print "\tcname: " . $next_n_concerts_cnames[$i] . "<br/>";
  print "bname: " . $next_n_concerts_bnames[$i] . "<br/>";
}
			?>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Bands user liked
           <table border="0" width="100%" cellspacing="20">
<tr><td colspan="2"  >
</td>
</tr>
<tr>
<?php 
include("connectdb.php");
$uname = $_GET['user'];
$count =0;
if ($stmt = $mysqli->prepare("select bname from rel_user_fan_band where uname = ?")) {
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($bname);
  while($stmt->fetch()){
	  if ($count==2) 
	{echo "<tr>"; $count=0;}
	  ?>
<td width="100"><?php echo "<img src='images/band/$bname.jpg' style='width:100px; height:100px;'/>";?></td><td  style="text-align:left;"><a href="visitBandPage.php?band=<?=$bname;?>"><?=$bname;?></a></td>
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
<div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Genres
        <table border="0" width="100%" cellspacing="20">



<tr>
<?php 
include("connectdb.php");
$uname = $_GET['user'];
$count =0;
if ($stmt = $mysqli->prepare("select gname from rel_user_likes_genre where uname = ?")) {
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($gname);
  while($stmt->fetch()){
	  if ($count==2) 
	{echo "<tr>"; $count=0;}
	  ?>
<td width="100"><?php echo "<img src='images/genre/$gname.jpg' style='width:100px; height:100px;'/>";?></td><td  style="text-align:left;"><?= $gname; ?></td>
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
</div>
  
        
            
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        Posts 
        <table border="0" width="100%" >
		
<?php 
include("connectdb.php");
$uname = $_GET['user'];
if ($stmt = $mysqli->prepare("select postinfo,postedtime from user_posts where uname = ?")) {
	$stmt->bind_param("s", $uname);
  $stmt->execute();
  $stmt->bind_result($pinfo,$ptime);
  
  while($stmt->fetch()){
	
	  ?>
      <tr>
      <td><?= $pinfo; ?></td>
	  <td><?= $ptime; ?></td>
       </tr>
<?php
}
?>
 
  
  </table>
  <?php
$stmt->close();
  $mysqli->close();
 }
?>
        </div>
         
        
        
  </div>

</body>
</html>
        	