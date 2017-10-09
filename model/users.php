<?php
class Users {
	private $db = null;
	function __construct ($db) {
		$this->db = $db;
	}
	
	function showTable() {
		$sql = "SELECT * FROM `users`";
		$query = $this->db->query($sql);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		return $query->fetchAll();
	}
	
	function sortTable($key) {
		$sql = "SELECT * FROM `users` ORDER BY " . $key;
		$query = $this->db->query($sql);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		return $query->fetchAll();
	}
	
	function showUser($user_id = null) {
		if(!empty($_GET['action']) && !empty($_GET['id'])) {
			
			$sql="SELECT * FROM users WHERE id = :userId";
			
			$result = $this->db->prepare($sql);
			$result->bindValue(':userId', $_GET['id'], PDO::PARAM_INT);
			$result->execute();
			$row = $result->fetchAll();

			return $row;
		}
	}
	
	function showErrorUser($login, $pass, $lastName, $name, $patronymic, $email, $select) {
		$input_email = filter_var($email, FILTER_VALIDATE_EMAIL);
		$password = password_hash($pass, PASSWORD_DEFAULT);

		
		if($input_email === false) {
			echo '<p style="color: red;">Введите правильно email</p>';
			die();
		}
		
		$userExists = "SELECT login FROM users WHERE login = '".$login."'";
		$queryUser = $this->db->query($userExists);
		$queryUser->setFetchMode(PDO::FETCH_ASSOC);
		$res = $queryUser->fetchAll();
		
		$emailExists = "SELECT email FROM users WHERE email = '".$email."'";
		$queryEmail = $this->db->query($emailExists);
		$queryEmail->setFetchMode(PDO::FETCH_ASSOC);
		$res2 = $queryEmail->fetchAll();
		
		if(!empty($res[0]['login'])) {
			die( '<p style="color: red;">Такой пользователь уже существует</p>');
		}
		
		elseif(!empty($res2[0]['email'])) {
			die( '<p style="color: red;">Пользователь с таким email, уже существует.</p>');
		}
		
		else {
			$sql = "INSERT INTO users(login, password, lastname, firstname, patronymic, email, role) VALUES(:login, :password, :lastname, :firstname, :patronymic, :email, :role)";
			$newUserPrepare = $this->db->prepare($sql);
			$newUserPrepare->bindValue(':login', trim($login), PDO::PARAM_STR);
			$newUserPrepare->bindValue(':password', trim($password), PDO::PARAM_STR);
			$newUserPrepare->bindValue(':lastname', trim($lastName), PDO::PARAM_STR);
			$newUserPrepare->bindValue(':firstname', trim($name), PDO::PARAM_STR);
			$newUserPrepare->bindValue(':patronymic', trim($patronymic), PDO::PARAM_STR);
			$newUserPrepare->bindValue(':email', trim($input_email), PDO::PARAM_STR);
			$newUserPrepare->bindValue(':role', trim($select), PDO::PARAM_STR);
			
			
			$newUserPrepare->execute();
			
			echo '<p style="color: green;">Пользователь добавлен</p>';
		}
	}
	
	function updateUser($login, $pass, $lastName, $name, $patronymic, $email, $select, $id) {
		$input_email = filter_var($email, FILTER_VALIDATE_EMAIL);
		$password = password_hash($pass, PASSWORD_DEFAULT);

		
		if($input_email === false) {
			echo '<p style="color: red;">Введите правильно email</p>';
			die();
		}
	
		
		$sql = "UPDATE users SET login = :login, password = :password, lastname = :lastname, firstname = :firstname, patronymic = :patronymic, email = :email, role = :role WHERE id =" . $id;
			
		$newUserPrepare = $this->db->prepare($sql);
		$newUserPrepare->bindValue(':login', trim($login), PDO::PARAM_STR);
		$newUserPrepare->bindValue(':password', trim($password), PDO::PARAM_STR);
		$newUserPrepare->bindValue(':lastname', trim($lastName), PDO::PARAM_STR);
		$newUserPrepare->bindValue(':firstname', trim($name), PDO::PARAM_STR);
		$newUserPrepare->bindValue(':patronymic', trim($patronymic), PDO::PARAM_STR);
		$newUserPrepare->bindValue(':email', trim($input_email), PDO::PARAM_STR);
		$newUserPrepare->bindValue(':role', trim($select), PDO::PARAM_STR);
			
			
		$newUserPrepare->execute();
			
		echo '<p style="color: green;">Пользователь изменён</p>';
		
	}
	
	function redProfil($id) {
	
		$sql="SELECT * FROM users WHERE id = :userId";
			
		$result = $this->db->prepare($sql);
		$result->bindValue(':userId', $id, PDO::PARAM_INT);
		$result->execute();
		return $row = $result->fetchAll();
	}
	
	function delUser($id) {
	
		$sql="SELECT login FROM users WHERE id = :userId";
			
		$result = $this->db->prepare($sql);
		$result->bindValue(':userId', $id, PDO::PARAM_INT);
		$result->execute();
		$row = $result->fetchAll();
		
		if(empty($row)) {
			die ('Такого пользователя не сущетвует.');
		}
		else {
			$delUser = "DELETE FROM users WHERE id = :userId";
			$resultDelUser = $this->db->prepare($delUser);
			$resultDelUser->bindValue(':userId', $id, PDO::PARAM_INT);
			$resultDelUser->execute();
			
			echo 'Пользователь удалён.';
		}
		
	
	}
	
	
	function login($login, $password) {
	
		$pass = password_verify($password, PASSWORD_DEFAULT);
		
		
		$sqlPass = "SELECT * FROM users WHERE login = :log";
		$resPass = $this->db->prepare($sqlPass);
		$resPass->bindValue(':log', trim($login), PDO::PARAM_STR);
		$resPass->execute();
		
		$allRes = $resPass->fetchAll();
		
		if(count($allRes) == 0) {
			die('<p>Неверный логин или пароль</p>');
		}
		
		$needPassword = $allRes[0]['password'];
		
		$hash = $needPassword;
		
		if (password_verify($password, $hash)) {
			$_SESSION['userOnline'] = 'ok';
			$_SESSION['login'] = $allRes[0]['login'];
			$_SESSION['id'] = $allRes[0]['id'];
			
			if($allRes[0]['role'] === 'admin') {
				$_SESSION['role'] = 'admin';
			}
			
			elseif($allRes[0]['role'] === 'user') {
				$_SESSION['role'] = 'user';
			}
			
			header('Location: ./index.php');
		}
		

		else {
			die('<p>Неверный логин или пароль</p>');
		}
	}
	
	function userExit() {
		unset($_SESSION['login']);	
		unset($_SESSION['userOnline']);	
		unset($_SESSION['role']);	
		unset($_SESSION['id']);	
		session_destroy();
	}
	
	

	

	
}