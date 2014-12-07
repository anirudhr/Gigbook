<?php
include_once("Connectdatabase.php");

$id=$_GET["id"];

$sql="SELECT * FROM architect where rid='".$id."'";
$res=mysql_query($sql) or die(mysql_error());

header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<markers>';

while($row=mysql_fetch_assoc($res))
{
  echo '<reply ';
  echo 'name="' . $row['user'] . '" ';
  echo '/>';
}
echo '</markers>';

mysql_close($connection);

?>