<?php
include ("connectdb.php");
$bname=$_POST['bname'];
$cname=$_POST['cname'];
$vid=$_POST['vid'];
$ctime=$_POST['cdate'] . ' ' . $_POST['ctime'];
$tkturl=$_POST['tkturl'];
$cover=$_POST['cover'];
$avail=$_POST['avail'];
echo $cname . ' ' . $vid . ' ' . $ctime . ' ' . $tkturl . ' ' . $cover . ' ' . $avail;
if(!$stmt = $mysqli->prepare("INSERT INTO concert (cname,vid,ctime,postedtime,tkturl,cover,availability) VALUES (?,?,?,NOW(),?,?,?)")) {
	throw new Exception ("Prepare stmt1 failed: " . $mysqli->error);
}
$stmt->bind_param('sissss', $cname,$vid,$ctime,$tkturl,$cover,$avail);
if (!$stmt->execute()) {
	throw new Exception ("Exec stmt1 failed: " . $mysqli->error);
}

if(!$stmt2 = $mysqli->prepare("INSERT INTO rel_band_performs_concert (bname, cid) SELECT ?, cid FROM concert WHERE cname = ? AND ctime = ?")) {
	throw new Exception ("Prepare stmt2 failed: " . $mysqli->error);
}
$stmt2->bind_param('sss', $bname, $cname, $ctime);
if (!$stmt2->execute()){
	throw new Exception ("Exec stmt2 failed: " . $mysqli->error);
}
echo "<script language='javascript'>javascript:history.go(-1)</script>";
?>