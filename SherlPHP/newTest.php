<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">

function newContent()
{
    $("#div1").load("newcontent.php");
}
</script>
<body>
</body>
<div id="div1"></div>
<div id="div2"><input type="button" value="load" onclick="newContent()"/></div>
</html>