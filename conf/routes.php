<?php
	$host = "localhost";
	$home = "http://" . $host . "/sobaya/";
	$route = basename($_SERVER['REQUEST_URI']);
	
	switch($route) {
		case: ''
			$route = $home . "index.php";
			header("Location: " . $host);
			break;
	}
