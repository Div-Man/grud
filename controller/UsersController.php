<?php

class UsersController {
	private $model = null;
	
	function __construct ($db) {
		include 'model/users.php';
		$this->model = new Users($db);
	}
	
	private function render($template = null, $params = null) {
		$fileTemplate = 'template/'.$template;
		if (is_file($fileTemplate)) {
			ob_start();
			if (count($params) > 0) {
				extract($params);
			}
			include $fileTemplate;
			return ob_get_clean();
		}
	}
	
	
	function errorNewUser($login, $pass, $lastName, $name, $patronymic, $email, $select) {
		if(!empty($login) && !empty($pass) && !empty($lastName) && !empty($name) && !empty($patronymic) && !empty($email) && !empty($select)) {
			$this->model->showErrorUser($login, $pass, $lastName, $name, $patronymic, $email, $select);
		}
		
		else {
			echo '<p style="color: red;">Заполните все поля</p>';
		}
		
		
	}
	
	function getUpdateUser($login, $pass, $lastName, $name, $patronymic, $email, $select='user', $id) {
		if(!empty($login) && !empty($pass) && !empty($lastName) && !empty($name) && !empty($patronymic) && !empty($email) && !empty($id)) {
			$this->model->updateUser($login, $pass, $lastName, $name, $patronymic, $email, $select, $id);
		}
		
		else {
			echo '<p style="color: red;">Заполните все поля</p>';
		}
		
	}
	
	function getDelUser($id) {
		$this->model->delUser($id);
	}
	

	function getMainPage() {
	
		$table = $this->model->showTable();
		$userRed = $this->model->showUser($_GET['id']);
		
		if(!empty($_GET['action'])) {
			if($_GET['action'] == 'red-my-profil') {
				$redMyProfil = $this->model->redProfil($_SESSION['id']);
			}
		}
		
		else {
			$redMyProfil = null;
		}
		
		if(!empty($_GET['btn-sort'])) {
			$sort = $this->model->sortTable($_GET['select']);
		}
		
		
		echo $this->render('listUsers/main.php', [
													'table' => $table, 
													'userRed' => $userRed, 
													'redMyProfil' => $redMyProfil,
													'sort' => $sort,
												]
											);
	
	}
	
	function getLogin($login, $password) {
		if(!empty($login) && (!empty($password))) {
			$this->model->login($login, $password);
		}
		
		else {
			echo '<p style="color: red;">Заполните все поля</p>';
		}
	} 
	
	function getExit() {
		$this->model->userExit();
	}
	
	
	
	
}