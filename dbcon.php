<?php
	$host = '127.0.0.1';
	$db = 'newdb';
	$user = 'root';
	$pass = '';
	// $charset = 'utf8';
	$dsn = "mysql:host=$host;dbname=$db;";

	$pdo = new PDO($dsn,$user,$pass);
?>