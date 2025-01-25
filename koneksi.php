<?php

// Load credentials from .env
$filename = './.env';
$file = fopen($filename, 'r');
$env = array();
if ($file) {
	$env_contents = fread($file, filesize($filename));
	$env_contents = str_replace("\r\n", "\n", $env_contents); // Handle newline on Windows
	$env_vars = explode("\n", $env_contents);
	foreach ($env_vars as $var) {
		$chunk = explode('=', $var);
		$key = $chunk[0];
		$value = $chunk[1];
		$env[$key] = $value;
	}
}

$host = $env['MARIADB_HOST'];
$user = $env['MARIADB_USER'];
$pass = $env['MARIADB_ROOT_PASSWORD'];
$db   = $env['MARIADB_DATABASE'];

$conn = new mysqli($host, $user, $pass, $db);
