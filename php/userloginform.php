<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<section class="loginform cf">
USERS...
<form name="userlogin" id="userlogin" method="post" action="userauth.php" >
 <label for="username">Username</label>
   <input type="text" name="username" placeholder="username" required>
   <label for="password">Password</label>
   <input type="password" name="password" placeholder="password" required>
   <input type="submit" value="Login"><br />
   <input class="backbutton" type="button" value="BACK" onclick="window.location='login.php'"/>
</form>
</section>
</body>
</html>