<?php

	session_start();
	session_unset();//unset the variable that are set
	session_destroy();

	//redirecting to the login form
	header("Location:loginform.php");
			exit();
?>