<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div data-role="page" id="four">

<!-------------- Second page header ----------->
<div data-role="header">
<h1>JQuery Mobile Form</h1>
</div>
<!-------------- Second page main content ----------->
<div data-role="main" class="ui-content">
<p>
<?php


$checkid = $_POST["checkid"];

foreach ($checkid as $id)
{
	echo $id."<br>";
}



?>
</p>
<a href="#pageone" data-role="button" data-icon="delete" data-iconpos="right" data-theme="b" data-inline="true">Close</a>
</div>
<!-------------- Second page footer ----------->
<div data-role='footer'>
<h4>Page Footer</h4>
</div>
</div>

</body>
</html>
