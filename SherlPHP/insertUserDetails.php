<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add User Details</title>
</head>

<body>
<?php
	include "connectdb.php";
	$uname=$_POST["uname"];
	$pwd=$_POST["pass"];
	$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];
	$city=$_POST["city"];
	$email=$_POST["uemail"];
	$dob=$_POST["DOB"];
	$file_path = "uploads/";
	/* Create table doesn't return a resultset */

 function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
	 
	 
	 
if (!empty($_FILES["uploadedimage"]["name"])) {
	
	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=$uname.$ext;
	
	$target_path = "images/user/".$imagename;

if(move_uploaded_file($temp_name, $target_path)) {
	
	if($stmt = $mysqli->prepare("INSERT INTO user (uname, lastname, firstname, password, lastlogintime,city, birthdate, email,joindate)VALUES (?,?,?,?,now(),?,?,?,now())")) {
	
	$stmt->bind_param('sssssss', $uname,$lastname,$firstname,$pwd,$city,$dob,$email);
	
  $stmt->execute();
 
}

 	
}else{

   exit("Error While uploading image on the server");
} 

}
else
echo "Unsuccesful";
	

 
?>
</body>
</html>