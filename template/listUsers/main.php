<!DOCTYPE html>
<html>
	<head>
		<title>Пользователи</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="normalize.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			
		</header>
		
		<section class="content">
			
			<?php
			
				if(!empty($_SESSION['userOnline'] && !empty($_SESSION['login']))) {
					require_once 'profil.php';
				}
				
				if(!empty($_GET['action']) && !empty($_SESSION['userOnline'])) {
			
					if($_GET['action'] === 'add-user') {
						require_once 'add-user.php';
					}
					
					if($_GET['action'] === 'redact') {
						require_once 'redact-user.php';
					}
					
					if($_GET['action'] === 'red-my-profil') {
						require_once 'redact-my-profil.php';
					}
				}
				if(!empty($_SESSION['userOnline'])) {
					require_once 'user-table.php';
				}
				
				else {
					require_once 'vxod.php';
				}
				 
			?>
			
			
		</section>
		
		<footer>
			
		</footer>
	</body> 
</html>