<?php
	if(isset($_GET['uri']))
		$uri = '?uri=' . $_GET['uri'];
	else
		$uri = '';

	//echo $uri;
	header("location: ../index.php$uri");	
	exit;
?>