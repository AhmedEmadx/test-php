<?php
session_start();
if(!isset($_SESSION['lang']) ){
$_SESSION['lang'] = 'en';
}

$GLOBALS['config'] = array(
		'mysql' => array(
				'host' => 'mysql1003.mochahost.com',
				'username' => 'sabrybmw_sabry',
				'password' => 'qazwsx1001',
				'db' => 'sabrybmw_freesia'
			),
		'remember' => array(
				'cookie_name' => 'hash',
				'cookie_expiry' => 604800
			),
		'session' => array(
				'session_name' => 'user',
				'token_name' => 'token'
			),
		'url' => array(
				'home' => 'https://www.freesialive.com/'
			)
	);

spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});
require_once "mochasupport/mail.php";
require_once 'functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if($hashCheck->count()) {
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}

if(!Session::exists('lang')) {
	Session::put('lang', 'ar');
}

?>