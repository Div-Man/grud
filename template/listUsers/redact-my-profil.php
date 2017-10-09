
<form action="#" method="post">

		<p><input type="text" name="login" value="<?php echo $redMyProfil[0]['login'];?>" placeholder="Логин"></p>
		
		<p><input type="text" name="pass" placeholder="Новый пароль"></p>
		

		<p><input type="text" name="last-name" value="<?php echo $redMyProfil[0]['lastname'];?>" placeholder="Фамилия"></p>
		
		<p><input type="text" name="name" value="<?php echo $redMyProfil[0]['firstname'];?>" placeholder="Имя"></p>
		

		<p><input type="text" name="patronymic" value="<?php echo $redMyProfil[0]['patronymic'];?>" placeholder="Отчество"></p>

		<p><input type="text" name="email" value="<?php echo $redMyProfil[0]['email'];?>" placeholder="E-mail"></p>
		

	<p><input type="submit" name="btn-redact-my-profil" value="Сохранить"> <a href="./"> Вернуться</a></p>
	
	
</form>