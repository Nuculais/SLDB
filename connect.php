<?php

	$sldb = mysqli_connect('localhost', 'root', 'HillLakeForest', 'sldb');

	if($sldb->connect_errno > 0) {
		die('Could not connect to database [' . $sldb->connect_errno . ']');
	}

?>