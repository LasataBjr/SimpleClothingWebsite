<?php
	error_reporting(E_ALL);
	require_once("useful_func.php");
	$a = new useful_func(); 
	$row = $_GET['row'];
	$col= 'SN';
	$table = "featured_product_tb";
	if($a->delete($table,$col,$row)){
		header("Location: shoptable.php");
		exit();
	}else{
		echo "Deletion Error!";
	}
?>