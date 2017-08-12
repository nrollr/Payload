<?php
 	## Replace host, user, password and database to reflect your environment
 	$db = @mysqli_connect("host", "user", "password", "database");
		if ($db->connect_errno) {
			echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		}
		echo $mysqli->host_info . "\n";
?>

