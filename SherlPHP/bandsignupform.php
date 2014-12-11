<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Band Signup</title>
<link rel="stylesheet" type="text/css" href="signupstyle.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="signup.js"></script>

<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
</head>

<body>
<!-- multistep form -->
<form id="msform" action="insertBandDetails.php" method="post" enctype="multipart/form-data">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Account Setup</li>
		<li>Social Profiles</li>
		<li>Personal Details</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Create your account</h2>
		<h3 class="fs-subtitle">This is step 1</h3>
		<input type="text" name="uname" placeholder="Bandname" required>
		<input type="password" name="pass" placeholder="Password" required>
		<input type="password" name="cpass" placeholder="Confirm Password" required>
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Social Profiles</h2>
		<h3 class="fs-subtitle">Your presence on the social network</h3>
		<input type="text" name="twitter" placeholder="Twitter" />
		<input type="text" name="facebook" placeholder="Facebook" />
		<input type="text" name="gplus" placeholder="Google Plus" />
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>

    <fieldset>
		<h2 class="fs-title">Profile Picture</h2>
		<h3 class="fs-subtitle">Select image to upload:</h3>
		<input type="file" name="uploadedimage" id="uploadedimage" style="color:#FFF">
    
		<input type="button" name="previous" class="previous action-button" value="Previous" />
	
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
	</fieldset>
</form>

</body>
</html>