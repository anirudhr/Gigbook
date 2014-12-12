<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include "connectdb.php";

function getext($imagetype) {
    if(empty($imagetype)) {
        return false;
    }
    switch($imagetype) {
        case 'image/bmp': return '.bmp';
        case 'image/gif': return '.gif';
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        default: return false;
    }
}

$uname=$_POST["uname"];
$pwd=$_POST["pass"];
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$city=$_POST["city"];
$email=$_POST["uemail"];
$dob=$_POST["DOB"];
$target_dir = "users/";
$target_file = $target_dir . $uname . ".jpg";
$uploadOk = 1;
$imageFileType = getext($_FILES["uploadedimage"]["type"]);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["uploadedimage"]["tmp_name"]);
    if($check == false) {
        throw new Exception("File is not an image.");
        $uploadOk = 0;
    }
    if (file_exists($target_file)) {
        throw new Exception("Sorry, file already exists.");
        $uploadOk = 0;
    }
    if($imageFileType != ".jpg") {
        throw new Exception("Sorry, only JPG files are allowed. Uploaded file is " . $imageFileType);
        $uploadOk = 0;
    }
    if ($uploadOk) {
            if (move_uploaded_file($_FILES["uploadedimage"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["uploadedimage"]["name"]). " has been uploaded.";
        }
        else {
            throw new Exception("Sorry, there was an error uploading your file.");
        }
    }
    else {
        throw new Exception("Upload failed.");
    }
}
$stmt = $mysqli->stmt_init();
if(!$stmt->prepare("INSERT INTO user (uname, lastname, firstname, password, lastlogintime,city, birthdate, email,joindate)VALUES (?,?,?,?,now(),?,?,?,now())")) {
    throw new Exception("Insert prepare failed: " . $mysqli->error);
}
$stmt->bind_param('sssssss', $uname,$lastname,$firstname,$pwd,$city,$dob,$email);
if (!$stmt->execute()) {
  throw new Exception("Insert exec failed: " . $mysqli->error);
}
echo '<script type="text/javascript">window.location="login.php"</script>';

//:indentSize=4:tabSize=4:noTabs=true:wrap=soft:

?>
</body>
</html>