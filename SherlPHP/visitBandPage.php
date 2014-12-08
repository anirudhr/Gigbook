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



 <body>
 <?php
 require("connectdb.php");
 require("band_homepage_functions.php");
 $bname=$_GET["band"];

$next_n_concerts_cids = array(); $next_n_concerts_cnames = array(); $next_n_concerts_bnames = array();
$old_concerts_cids = array(); $old_concerts_cnames = array(); $old_concerts_bnames = array();
$linkids = array(); $linkurls = array(); $linkinfos = array();
$gnames = array();
try {
  list($next_n_concerts_cids, $next_n_concerts_cnames, $next_n_concerts_bnames) = get_n_concerts($mysqli, $bname, 'n');
  list($old_concerts_cids, $old_concerts_cnames, $old_concerts_bnames) = get_n_concerts($mysqli, $bname, 'old');
  list($linkids, $linkurls, $linkinfos) = get_n_band_links($mysqli, $bname);
  $gnames = get_band_genres($mysqli, $bname);
}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
  exit();

}
catch (Exception $e) {
  print 'Caught exception: ' . $e->getMessage() . "<br/>";
  exit();
}
 ?>


<div id="wrapper" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto;"> 
 
  <div id="inner-1" style="float:left; width:60%;border:dotted #CC3300; ">
   WELCOME
  </div>
 
  <div id="inner-2" style="float:right; width:30%; border:dotted #CC3300;"> 
    <form style="float:right;">
    
    <input type="button" value=" Logout"/>
    </form>
  </div>
</div>
<div id="homebody" style="margin-left:auto; margin-right:auto; border:solid #669933; overflow:auto; ">
	<div id="sidebar" style="float:left; width:29%;border:dotted #CC3300; ">
    	<div id="circular" style=" height:39%;border:dotted #CC3300; ">
   			 <?php echo "<img src='images/band/$bname.jpg' style='width:200px; height:200px;'/>";?>
    	</div>
         <div id="linklist" style=" height:59%;border:dotted #CC3300; ">
         <form action="fanOfBand.php" method="post">
         <input type="hidden" name="bname" value="<?=$bname?>"/>
        	<input type="submit" value="BECOME A FAN!"/>
            </form>
             
			 
    	</div>
    
  </div>
 
  <div id="inner-2" style="float:right; width:68%; border:dotted #CC3300;"> 
  <div id="inner-2" style="height:19%; border:dotted #CC3300;">
       PROFILE:
       <?php 
		$result=$mysqli->query("Select * from band where bname='$bname'");
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
		 	 	 	 	
		
		$bname=$row["bname"];
		$bio=$row["bio"];
		
		
	}
     
	
}



?>

<table border="0">
<tr>
<td><label>Band name:</label></td>
<td><label><?=$bname;?></label></td>
</tr>
<tr>
<td><label>About:</label></td>
<td><label><?=$bio;?></label></td>
</tr>
</table>

        </div>
    	<div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Upcoming concerts
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
        	Genre
            <?php
           print "Genres: " . "<br/>";
for ($i = 0; $i < count($gnames); $i++) {
  print $gnames[$i] . "<br/>";
}
?>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Links
           <?php print "Links: " . "<br/>";
for ($i = 0; $i < count($linkids); $i++) {
  print "\tlinkid: " . $linkids[$i] . "<br/>";
  print "\tlinkurl: " . $linkurls[$i] . "<br/>";
  print "linkinfo: " . $linkinfos[$i] . "<br/>";
  
}
?>
        </div>
        <div id="inner-2" style="height:19%; border:dotted #CC3300;">
        	Old concerts
           <?php print "Old concerts:" . "<br/>";
for ($i = 0; $i < count($old_concerts_cids); $i++) {
  print "\tcid: " . $old_concerts_cids[$i] . "<br/>";
  print "\tcname: " . $old_concerts_cnames[$i] . "<br/>";
  print "bname: " . $old_concerts_bnames[$i] . "<br/>";
}
?>
        </div>
        
  </div>
</div>

</body>
</html>