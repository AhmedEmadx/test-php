<?php

function escape($string) {
	return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}

function strip_magic_slashes($str) {
	return get_magic_quotes_gpc() ? stripslashes($str) : $str;
}