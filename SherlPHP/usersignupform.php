<!DOCTYPE html>
<html>
<head>
<title>Untitled Document</title>
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
<form id="msform" action="insertUserDetails.php" method="post" enctype="multipart/form-data">
	<!--<ul id="progressbar">
		<li class="active">Account Setup</li>
		
		<li>Personal Details</li>
        <li>Profile Picture</li>
	</ul>
	<fieldset>-->
		<h2 class="fs-title">Create your account</h2>
		<!--<h3 class="fs-subtitle">This is step 1</h3>-->
		<input type="text" name="uname" placeholder="Username" required>
		<input type="password" name="pass" placeholder="Password" required>
		<input type="password" name="cpass" placeholder="Confirm Password" required>
		<!--<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
    <fieldset>-->
		<h2 class="fs-title">Personal Details</h2>
		<h3 class="fs-subtitle">We will never sell it</h3>
		<input type="text" name="fname" placeholder="First Name" />
		<input type="text" name="lname" placeholder="Last Name" />
        <input type="email" name="uemail" required placeholder="Email" />
       
		<input type="text" name="city" placeholder="City" />
         <label style="color:#FFF;text-align:left">Birthdate</label>
        <input type="date" name="DOB" placeholder="Birthdate (YYYY-MM-DD) " />
		
		<!--<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>-->
		<h2 class="fs-title">Profile Picture</h2>
		<h3 class="fs-subtitle">Select image to upload:</h3>
		<input type="file" name="uploadedimage" id="uploadedimage" style="color:#FFF">
    
		<!--<input type="button" name="previous" class="previous action-button" value="Previous" />-->
	
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
	<!--</fieldset>-->
	
    
</form>

</body>
</html>