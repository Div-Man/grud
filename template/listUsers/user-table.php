
<?php
	if(!empty($_SESSION['role'])) {
		if($_SESSION['role'] == 'admin') {
			echo '<a href="?action=add-user">Добавить пользователя</a><br><br>';
		}
	}
	
?>

<form action="" method="get">
	Сортировать <select name="select">
		<option value="lastname">по фамили</option>
		<option value="firstname">по имени</option>
		<option value="login">по нику</option>
		<option value="role">по роли</option>
	</select>
	<input type="submit" value="Отобразить" name="btn-sort">
</form>
<br>

<?php

	if(!empty($_GET['select'])) {?>
		<table border="1" cellpadding="10" style="border-collapse: collapse; text-align: center;">
			<tr>
			<th>id</th>
			<th>Логин</th>
			<th colspan="3">ФИО</th>
			<th>E-Mail</th>
			<th>Роль</th>
			<?php
				if(!empty($_SESSION['role'])) {
					if($_SESSION['role'] == 'admin') {
						echo '<th colspan="2">Действие</th>';
					}
				}
			?>
			
		</tr>
		
		<?php
		foreach($sort as $key) {
			echo '<tr>';
				echo '<td>'.$key['id'].'</td>';
				echo '<td>'.$key['login'].'</td>';
				echo '<td>'.$key['lastname'].'</td>';
				echo '<td>'.$key['firstname'].'</td>';
				echo '<td>'.$key['patronymic'].'</td>';
				echo '<td>'.$key['email'].'</td>';
				echo '<td>'.$key['role'].'</td>';
				
				
				if(!empty($_SESSION['role'])) {
					if($_SESSION['role'] == 'admin') {
						echo '<td><a href="?action=redact&id='.$key['id'].'">Редактировать</a></td>';
						echo '<td><form action="" method="post">
						<input type="hidden" name="del-user-id" value="'.$key['id'].'">
						<input type="submit" value="Удалить" name="btn-del-user">
					</form></td>';
				}
			}
				
				
			echo '</tr>';
		
		}
	?>
		</table>
	<?php	
	}
	
	else {?>
		<table border="1" cellpadding="10" style="border-collapse: collapse; text-align: center;">
	<tr>
		<th>id</th>
		<th>Логин</th>
		<th colspan="3">ФИО</th>
		<th>E-Mail</th>
		<th>Роль</th>
		<?php
			if(!empty($_SESSION['role'])) {
				if($_SESSION['role'] == 'admin') {
					echo '<th colspan="2">Действие</th>';
				}
			}
		?>
		
	</tr>
	
	<?php
		foreach($table as $key) {
			echo '<tr>';
				echo '<td>'.$key['id'].'</td>';
				echo '<td>'.$key['login'].'</td>';
				echo '<td>'.$key['lastname'].'</td>';
				echo '<td>'.$key['firstname'].'</td>';
				echo '<td>'.$key['patronymic'].'</td>';
				echo '<td>'.$key['email'].'</td>';
				echo '<td>'.$key['role'].'</td>';
				
				
				if(!empty($_SESSION['role'])) {
					if($_SESSION['role'] == 'admin') {
						echo '<td><a href="?action=redact&id='.$key['id'].'">Редактировать</a></td>';
						echo '<td><form action="" method="post">
						<input type="hidden" name="del-user-id" value="'.$key['id'].'">
						<input type="submit" value="Удалить" name="btn-del-user">
					</form></td>';
				}
			}
				
				
			echo '</tr>';
		
		}
	?>
</table>
		
	<?php
	
	}
	 
?>

<br><br>



