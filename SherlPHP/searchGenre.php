<?php
// Start the session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function handleClick(cb) {
	  alert("Clicked, new value = " + cb.value);
	 

}
</script>
</head>

<body>
<?php

require("connectdb.php");

	$genre="%{$_POST['genre']}%";
	
if ($stmt = $mysqli->prepare("select gname from genre where gname like ?")) {
	
	$stmt->bind_param("s", $genre);
  $stmt->execute();
 $result = $stmt->get_result();
 $row_cnt = $result->num_rows;
 if($row_cnt==0){
	 echo "<script language='javascript'>alert('No genre matched your search!');</script>";
	 
	 echo "<script language='javascript'>window.location='userLikesGenre.php';</script>";
 }
 else{
 
  
  ?>
 Search results
       
   <table border ="0"  >

   
   
   <?php
    while ($myrow = $result->fetch_assoc()) {
		?>
       
        <tr>
         <form action="likegenre.php" method="post">
    <td background="genrepic.jpg" WIDTH="300" HEIGHT="300" VALIGN="bottom" align="center"style="opacity:0.85" >
    <FONT SIZE="+1" COLOR="#FFFFFF"><?=$myrow['gname'];?></FONT>
    <input type="hidden" name='gname' value='<?=$myrow['gname'];?>'/>
    <a href="DisplayBandAccToGenre.php?gname=<?=$myrow['gname'];?>" style="color:#CCC; padding-left:20px; padding-right:0"  >Bands</a>
	<input type="submit" class="myButton" value="LIKE" style="float:right"/>
  </td>
  </form>
        </tr>
        
       
		
        <?php
		
	}
	
	echo '</table>';
 }
        $stmt->close();
	$mysqli->close();
    }

?>
</body>
</html>