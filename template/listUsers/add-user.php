

<form action="#" method="post">

<?php
	if(!empty($_POST['btn-new-user']) && empty($_POST['login'])) {
		echo '<p><input type="text" name="login" placeholder="Логин"> <span style="color: red;">Введите Логин</span></p>';
		}
	else {?>
		<p><input type="text" name="login" value="<?php if(!empty($_POST['login'])) echo $_POST['login'];?>" placeholder="Логин"></p>
		<?php	
	}
	
	if(!empty($_POST['btn-new-user']) && empty($_POST['pass'])) {				
			echo '<p><input type="text" name="pass" placeholder="Пароль"> <span style="color: red;">Введите Пароль</span></p>';
		}
	else {?>
		<p><input type="text" name="pass" value="<?php if(!empty($_POST['pass'])) echo $_POST['pass'];?>" placeholder="Пароль"></p>
		<?php	
	}
	
	if(!empty($_POST['btn-new-user']) && empty($_POST['last-name'])) {				
			echo '<p><input type="text" name="last-name" placeholder="Фамилия"> <span style="color: red;">Введите Фамилию</span></p>';
		}
	else {?>
		<p><input type="text" name="last-name" value="<?php if(!empty($_POST['last-name'])) echo $_POST['last-name'];?>" placeholder="Фамилия"></p>
		<?php	
	}
	
	if(!empty($_POST['btn-new-user']) && empty($_POST['name'])) {				
			echo '<p><input type="text" name="name" placeholder="Имя"> <span style="color: red;">Введите Имя</span></p>';
		}
	else {?>
		<p><input type="text" name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name'];?>" placeholder="Имя"></p>
		<?php	
	}
	
	if(!empty($_POST['btn-new-user']) && empty($_POST['patronymic'])) {				
			echo '<p><input type="text" name="patronymic" placeholder="Отчество"> <span style="color: red;">Введите отчество</span></p>';
		}
	else {?>
		<p><input type="text" name="patronymic" value="<?php if(!empty($_POST['patronymic'])) echo $_POST['patronymic'];?>" placeholder="Отчество"></p>
		<?php	
	}
	
	if(!empty($_POST['btn-new-user']) && empty($_POST['email'])) {				
			echo '<p><input type="text" name="email" placeholder="E-mail"> <span style="color: red;">Введите E-mail</span></p>';
		}
	else {?>
		<p><input type="text" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>" placeholder="E-mail"></p>
		<?php	
	}
	
	
	
?>
	Роль: 
	<select name="select"> 
        <option value="user">Пользователь</option> 
        <option value="admin">Администратор</option>
    </select>
	<p><input type="submit" name="btn-new-user"> <a href="./"> Вернуться</a></p>
</form>