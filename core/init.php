<?php  

session_start();

// Load Class
spl_autoload_register(function($class){
	require_once '../classes/'.$class.'.php';
});

$user = new User();

?>