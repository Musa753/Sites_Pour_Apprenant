<?php 
	session_start();
	if(isset($_COOKIE['email'])) {
		$_SESSION['email'] = $_COOKIE['email'];
	}
	if(isset($_COOKIE['firstname'])) {
		$_SESSION['firstname'] = $_COOKIE['firstname'];
	}
	if(isset($_COOKIE['isAdmin'])) {
		$_SESSION['isAdmin'] = $_COOKIE['isAdmin'];
	}
	if(isset($_COOKIE['id'])) {
		$_SESSION['id'] = $_COOKIE['id'];
	}
	if(isset($_COOKIE['stayConnected'])) {
		$_SESSION['stayConnected'] = $_COOKIE['stayConnected'];
	}
	if(isset($_COOKIE['theme'])) {
		$_SESSION['theme'] = $_COOKIE['theme'];
	}
?>