<?php
include 'connect.inc.php';
include 'core.inc.php';
if(loggedin())
	header('location: profile.php');
else
	{
		
		header('location: home.php');
	}
?>

