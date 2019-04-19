<?php
$dsn = 'mysql:host=localhost; dbname=bhara; charset=utf8';
$user = 'root';
$pass = '';

try {
	$pdo = new PDO($dsn,$user,$pass);
} catch (PDOExecption $e){
	echo 'Connection error!' . $e->getMessage();
}
?>
