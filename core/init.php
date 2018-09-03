<?php
session_start();
if(!isset($_SESSION['lang']) ){
$_SESSION['lang'] = 'en';
}

$GLOBALS['config'] = array(
		'mysql' => array(
				'host' => 'mysql8000',
				'username' => 'ahmed',
				'password' => 'ahmedahmed',
				'db' => 'firestdb'
			)
	);

spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});
require_once "websupport/mail.php";
require_once 'functions/sanitize.php';


if(!Session::exists('lang')) {
	Session::put('lang', 'ar');
}

?>