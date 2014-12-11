<?php
include("connectdb.php");

$cid=$_GET['cid'];

 $stmt = $mysqli->stmt_init();
  $get_concert_bnames_query = " SELECT rel_band_performs_concert.bname
                                FROM rel_band_performs_concert
                                WHERE rel_band_performs_concert.cid = ?";
  if(!$stmt->prepare($get_concert_bnames_query)) {
    throw new Exception("get_concert_bnames: failed to prepare");
		
  }
  $stmt->bind_param('i', $cid);
  if (!$stmt->execute()) {
    throw new Exception("get_concert_bnames: failed to execute");
		
  }
  $bname = NULL;
  $stmt->bind_result($bname);
  $bnames = array();
  while($stmt->fetch()) {
    array_push($bnames, $bname);
  }


$get_n_user_posts_query = " SELECT cname,vname,building,street,city,state,zip,url, ctime ,capacity, postedtime,tkturl, cover, availability from concert natural join venue where cid=?"; 
				if ($stmt = $mysqli->prepare($get_n_user_posts_query)) {
					$stmt->bind_param('i', $cid);
					$stmt->execute();
					$stmt->bind_result($cname,$vname,$building,$street,$city,$state,$zip,$url,$ctime,$cap,$postedtime,$tkturl,$cover,$avail);
					echo "</br>";
					echo "<table border='0' style='text-align:left'>";
					while($stmt->fetch()){
							
  							echo "<label style='font-size:24px;' > $bname</label>";
							echo "<img src='images/concert_images/$cid.jpg' style='width:400px; height:300px;'/>";
							echo "<tr>";
							echo"	<td>Concert :</td><td>$cname</td>";
							echo "</tr>";
							echo"	<td>Ticket URL :</td><td><a href='http://$tkturl'>$tkturl</a></td>";
							echo "</tr>";
							echo "<tr>";
							echo"	<td>Cover :</td><td>$cover</td>";
							echo "</tr>";
							echo "<tr>";
							echo"	<td>Availability :</td><td>$avail</td>";
							echo "</tr>";
							echo "<tr>";
							echo"	<td valign='top'>Venue :</td><td>$vname<br/> $building $street , $city ,$state $zip</td>";
							echo "</tr>";
							echo "<tr>";
							echo"	<td>Capacity :</td><td>$cap</td>";
							echo "</tr>";
							echo "<tr>";
							echo"	<td>URL :</td><td><a href='http://$url'>$url</a></td>";
							echo "</tr>";
							echo "<tr>";
							
							
							
							
							
					}
					echo "</table>";			
						
				}

?>