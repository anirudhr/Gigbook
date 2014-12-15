<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<script type="text/javascript">
  function checkForm(form) {
    if(form.pass.value == form.cpass.value) {
      if(form.pass.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pass.focus();
        return false;
      }
      if(form.pass.value == form.username.value) {
        alert("Error: Password must be different from username!");
        form.pass.focus();
        return false;
      }
    }
    else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pass.focus();
      return false;
    }

    alert("You entered a valid password: " + form.pass.value);
    return true;
  }
</script>
<form id="msform" action="insertBandDetails.php" method="post" enctype="multipart/form-data" onsubmit="return checkForm(this);">
	<!--<ul id="progressbar">
		<li class="active">Account Setup</li>
		
		<li>Personal Details</li>
	</ul>
	<fieldset>-->
		<h2 class="fs-title">Create your account</h2>
		<!--<h3 class="fs-subtitle">This is step 1</h3>-->
		<input type="text" name="bname" placeholder="Bandname" required>
		<input type="password" name="pass" placeholder="Password" required>
		<input type="password" name="cpass" placeholder="Confirm Password" required>
		<!--<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	

    <fieldset>-->
		<h2 class="fs-title">Profile Picture</h2>
		<h3 class="fs-subtitle">Select image to upload:</h3>
		<input type="file" name="uploadedimage" id="uploadedimage" style="color:#FFF">
    
		<!--<input type="button" name="previous" class="previous action-button" value="Previous" />-->
	
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
	</fieldset>
</form>

</body>
</html>