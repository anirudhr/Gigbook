<?php
include ("connectdb.php");
$bname=$_POST['bname'];
$cname=$_POST['cname'];
$vid=$_POST['vid'];
$ctime=$_POST['cdate'].$_POST['ctime'];
$tkturl=$_POST['tkturl'];
$cover=$_POST['cover'];
$avail=$_POST['avail'];

if($stmt = $mysqli->prepare("INSERT INTO concert (cname,vid,ctime,postedtime,tkturl,cover,availability)VALUES (?,?,?,now(),?,?,?)")) {
	
	$stmt->bind_param('sissss', $cname,$vid,$ctime,$tkturl,$cover,$avail);
	
  $stmt->execute();
 

}
if($stmt2 = $mysqli->prepare("select cid from concert where cname = ? )")) {
	
	$stmt2->bind_param('s', $cname);
	
  $stmt2->execute();
  $stmt2->bind_result('i',$cid);
  echo $cid;

}

 


else
echo "Unsuccesful";
	
	?>