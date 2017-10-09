<form action="#" method="post">

		<p><input type="text" name="login" value="<?php echo $userRed[0]['login'];?>" placeholder="Логин"></p>
		
		<p><input type="text" name="pass" placeholder="Новый пароль"></p>
		

		<p><input type="text" name="last-name" value="<?php echo $userRed[0]['lastname'];?>" placeholder="Фамилия"></p>
		
		<p><input type="text" name="name" value="<?php echo $userRed[0]['firstname'];?>" placeholder="Имя"></p>
		

		<p><input type="text" name="patronymic" value="<?php echo $userRed[0]['patronymic'];?>" placeholder="Отчество"></p>

		<p><input type="text" name="email" value="<?php echo $userRed[0]['email'];?>" placeholder="E-mail"></p>
		<input type="hidden" value="<?php echo $userRed[0]['id'];?>" name="userId">
		

	Роль: 
	<select name="select"> 
		<?php
			if($userRed[0]['role'] === 'user') {
				echo '<option value="user" selected>Пользователь</option>';
				echo ' <option value="admin">Администратор</option>';
			}
			elseif($userRed[0]['role'] === 'admin') {
				echo '<option value="user">Пользователь</option>';
				echo ' <option value="admin" selected>Администратор</option>';
			}
		?>
    </select>
	<p><input type="submit" name="btn-redact-user" value="Сохранить"> <a href="./"> Вернуться</a></p>
	
	
</form>