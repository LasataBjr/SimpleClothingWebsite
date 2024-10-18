<?php
	session_start();
	require_once("useful_func.php");
    $a = new useful_func();
    $a->checklogin();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Display</title>
</head>
<body>
	
	<?php
		if(isset($_SESSION['Username']))
		{
			echo"<h2>Welcome,". $_SESSION['Username']."</h2>";
		}
		else
		{
			echo"Login First to View This Page";
		}
	?>
	<button><a href="logout.php">Logout</a></button>

</body>
</html>