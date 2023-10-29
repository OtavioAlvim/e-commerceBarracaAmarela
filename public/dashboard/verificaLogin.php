<?php
session_start();
if(!$_SESSION['username']) {
	$_SESSION['sem_login'] = true;
	header('Location: ../../index.php');
	exit();
}