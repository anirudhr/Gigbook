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

include "connectdb.php";

	$band="%{$_POST['band']}%";
	
if ($stmt = $mysqli->prepare("select b.bname,b.bio from band b where b.bname like ?")) {
	
	$stmt->bind_param("s", $band);
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
   <table border ="0" style="border-collapse:separate; border-spacing:5em;"  >

   
   
   <?php
     while ($myrow = $result->fetch_assoc()) {
		?>
        
        <tr >
        <td width="100"><?php echo "<img src=images/band/$myrow[bname].jpg style='width:100px; height:100px;'/>";?></td>
       
        <td>BAND NAME:<a href="hello.php"><?=$myrow['bname'];?></a><br /><br />

BIO:<?= $myrow['bio']; ?><br /><br />

        <form action="fanOfBand.php" method="post"><input type="hidden" name="bname" value=<?= $myrow['bname']; ?>/><input type="submit" value="BECOME A FAN"/></form><br /><br />
<input type="button" value="CHECK THEIR PAGE"/></td>
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