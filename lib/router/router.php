<?php

include 'controller/usersController.php';


$users = new UsersController($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


	if(!empty($_GET['action'])) {
		if($_GET['action'] == 'exit') {
			$users->getExit();
		}
		
	}
	
	$users->getMainPage();
	
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	
	if(!empty($_POST['btn-new-user'])) {
			$users->errorNewUser($_POST['login'], $_POST['pass'], $_POST['last-name'], $_POST['name'], $_POST['patronymic'], $_POST['email'], $_POST['select']);
	
	}
	
	if(!empty($_POST['btn-redact-user'])) {
			$users->getUpdateUser($_POST['login'], $_POST['pass'], $_POST['last-name'], $_POST['name'], $_POST['patronymic'], $_POST['email'], $_POST['select'], $_POST['userId']);
	
	}
	
	if(!empty($_POST['btn-redact-my-profil'])) {
			$users->getUpdateUser($_POST['login'], $_POST['pass'], $_POST['last-name'], $_POST['name'], $_POST['patronymic'], $_POST['email'], 'user', $_SESSION['id']);
			
			
	
	}
	
	
	if(!empty($_POST['btn-del-user'])) {
		$users->getDelUser((int)$_POST['del-user-id']);
	}
	
	if(!empty($_POST['btn-vxod-user'])) {
		$users->getLogin($_POST['login'], $_POST['password']);
	}
	
}


