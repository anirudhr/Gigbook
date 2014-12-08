<?php
// Start the session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<?php

include "connectdb.php";

	$followee="%{$_POST['followee']}%";
	
if ($stmt = $mysqli->prepare("select u.uname, u.firstname,u.lastname from user u where u.uname like ?")) {
	
	$stmt->bind_param("s", $followee);
  $stmt->execute();
   $result = $stmt->get_result();
 $row_cnt = $result->num_rows;
 if($row_cnt==0){
	 echo "<script language='javascript'>alert('No user matched your search!');</script>";
	 
	 echo "<script language='javascript'>javascript:history.go(-1)</script>";
 }
 else{
  
  ?>
 
       Search results
   <table border ="0" style="border-collapse:separate; border-spacing:5em;"  >

   
   
   <?php
     while ($myrow = $result->fetch_assoc()) {
		 $myrow['uname']=htmlspecialchars($myrow['uname']);
		?>
        
        <tr >
        <td width="100"><?php echo "<img src='images/user/$myrow[uname].jpg' style='width:100px; height:100px;'/>";?></td>
       
        <td><a href="visitUserPage.php?user=<?=$myrow['uname'];?>" style="text-decoration:none;"><?=$myrow['firstname'];?>  <?=$myrow['lastname'];?></a><br /><br />
</td>
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