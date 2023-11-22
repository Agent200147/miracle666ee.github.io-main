<?php
	session_start();
	$_SESSION["name"] = null;
	$_SESSION["email"] = null;
	$_SESSION["id_user"] = null;
	header('Location: /');