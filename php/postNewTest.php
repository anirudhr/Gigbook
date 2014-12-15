              <?php require('connectdb.php');
              $user_rep = 16;
              if ($user_rep > 15) {
              	echo "
              	<div class='new_concert' id='concert_post'>
              	<div class='get-in-touch'>
              	<a class='p-btn' style='width:100%;text-align:center'>Post a new concert</a>
              	<br/><br/>
              	<table border='0' >
              	<form action='postConcerts.php' method='post'>
              	<tr >
              	<td><label>Enter concert name:</label></td>
              	<td> <input type='text' value='' name='cname'/></td>
              	</tr>
              	<tr >
              	<td><label>Enter band name:</label></td>
              	<td> <input type='text' value='' name='bname'/></td>
              	</tr>
              	<tr>
              	<td><label>Date and Time</label></td><td> <input type='date' name='cdate'/><input type='time' name='ctime'/></td>
              	</tr>
              	<tr>
              	<td><label>Cover </label></td><td><input type='text' value='' name='cover'/></td>
              	</tr>
              	<tr>
              	<td><label>Ticket URL </label></td><td><input type='text' value='' name='tkturl'/></td>
              	</tr>
              	<tr>
              	<td><label>Availability </label></td><td><input type='text' value='' name='avail'/><br/></td>
              	</tr>
              	<tr> 
              	<td><label>Venue name</label> </td>
              	<td><select name='vid'>
              	";
              	if ($stmt = $mysqli->prepare('select distinct vid, vname from venue ')) {
              	$stmt->execute();
              	$stmt->bind_result($vid,$vname);
              	echo "<option value=' '></option>\n";
              	while($stmt->fetch()) {
              		$vname = htmlspecialchars($vname);
              		print "<option value='" . $vid . "'>" . $vname . "</option>\n"; 
              	}
              	$stmt->close();
              	$mysqli->close();
              	}
              	echo "</select></td>
              	</tr>
              	</table>                          
              	<input type='submit' value='POST'/>
              	</form>
              	</div>
              	</div>";
              }
              ?>
