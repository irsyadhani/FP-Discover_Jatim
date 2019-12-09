<?php
	$host		= "localhost";
	$username	= "root";
	$pass		= "";
	$db			= "discover_jatim";
	
	$db = new PDO ('mysql:host='.$host.';dbname='.$db.';charset=utf8mb4', $username, $pass);
	
	$db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute (PDO::ATTR_EMULATE_PREPARES, true);