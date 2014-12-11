<?php
//:indentSize=4:tabSize=4:noTabs=true:wrap=soft:
include ("connectdb.php");
$bname=$_POST['bname'];
$cname=$_POST['cname'];
$vid=$_POST['vid'];
$ctime=$_POST['cdate'] . " " . $_POST['ctime'];
$tkturl=$_POST['tkturl'];
$cover=$_POST['cover'];
$avail=$_POST['avail'];
//print "***" . $bname . ":" . $cname . ":" . $vid . ":" . $ctime . ":" . $tkturl . ":" . $cover . ":" . $avail . "<br/>";

if(!$stmt = $mysqli->prepare("INSERT INTO concert (cname,vid,ctime,postedtime,tkturl,cover,availability)VALUES (?,?,?,now(),?,?,?)")) {
	throw new Exception("New concert insertion: prepare failed: " . $mysqli->error);
}
$stmt->bind_param('sissss', $cname,$vid,$ctime,$tkturl,$cover,$avail);
if (!$stmt->execute()) {
    throw new Exception("New concert insertion: execute failed: " . $mysqli->error);
}
if(!$stmt3 = $mysqli->prepare("INSERT INTO rel_band_performs_concert (cid,bname)
    SELECT cid, ? FROM concert WHERE cname = ? AND ctime = ?")) {
	throw new Exception("New concert band performance insertion: prepare failed: " . $mysqli->error);
}
$stmt3->bind_param('sss', $bname, $cname, $ctime);
if (!$stmt3->execute()) {
    throw new Exception("New concert band performance insertion: execute failed: " . $mysqli->error);
}
echo "<script language='javascript'>javascript:history.go(-1)</script>";
?>
