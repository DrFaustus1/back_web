<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<title>Task-4</title>
</head>
<body>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm ">
		<h1>Заполните форму</h1>
	</div>
	<?php 
		if (!empty($messages)) {
			if(isset($messages['save'])) print('<div id="messages" class="ok">'); else print('<div id="messages">');
			foreach ($messages as $message) {
				print($message);
			}
		  print('</div>');
		}
	?>
	<div class="container">
		<form action="" method="POST">
			<p><label for="name">Имя</label>
			<input name="name" <?php if (!empty($errors['name'])) {print 'class="error"';} ?> <?php if(empty($errors['name'])&&!empty($values['name'])) print 'class="ok"';?> value="<?php isset($_COOKIE['name_error'])? print trim($_COOKIE['name_error']) : print $values['name']; ?>"> </p>

			<p><label for="email">E-mail</label>
			<input type="text" id="email" name="email" <?php if(!empty($errors['email']))  print 'class="error"';?> <?php if(empty($errors['email'])&&!empty($values['email'])) print 'class="ok"';?> value="<?php isset($_COOKIE['email_error'])? print trim($_COOKIE['email_error']) : print $values['email']; ?>"> </p>
			
			<p><label for="year">Год рождения</label>
			<select id="year" name="year" <?php if(!empty($errors['year']))  print 'class="error"';?> <?php if(empty($errors['year'])&&!empty($values['year'])) print 'class="ok"';?>>
				<option selected ><?php !empty($values['year']) ? print ($values['year']) : print '' ?></option>
				<?php 
					for ($i = 1980; $i <= 2024; $i++)
						echo '<option>' . $i . '</option>';
				?>
			</select>
			
			<p><label <?php if(!empty($errors['gender'])) print 'class="error_check"'?>>Пол:</label>
			<input type="radio" id="male" value="male" name="gender" <?php if (isset($values['gender'])&&$values['gender'] == 'male') print("checked"); ?>>Мужской
			<input type="radio" id="female" value="female" name="gender" <?php if (isset($values['gender'])&&$values['gender'] == 'female') print("checked"); ?>>Женский</p>

			
			<p><label <?php if(!empty($errors['super'])) print 'class="error_check"'?>>Любимый яп:</label>
			<input type="checkbox" id="first" value="first" name="super[]"<?php if(isset($values['super']['first'])&&$values['super']['first']=='first')print("checked");?>>Pascal
			<input type="checkbox" id="second" value="second" name="super[]"<?php if(isset($values['super']['second'])&&$values['super']['second']=='second')print("checked");?>>C
			<input type="checkbox" id="third" value="third" name="super[]"<?php if(isset($values['super']['third'])&&$values['super']['third']=='third')print("checked");?>>C++
			<input type="checkbox" id="fourth" value="fourth" name="super[]"<?php if(isset($values['super']['fourth'])&&$values['super']['fourth']=='fourth')print("checked");?>>Python</p>
			
			<p><label for="bio">Биография</label>
			<textarea id="bio" name="bio" <?php if(!empty($errors['bio']))  print 'class="error"';?> <?php if(empty($errors['bio'])&&!empty($values['bio'])) print 'class="ok"';?>><?php isset($_COOKIE['bio_error']) ? print trim($_COOKIE['bio_error']) : print $values['bio'] ?></textarea>
			
			<p><label <?php if(!empty($errors['contr_check'])) print 'class="error_check"'?>>С контрактом ознакомлен:</label>
			<input type="checkbox" id="contr_check" name="contr_check" value="contr_check" <?php if (isset($values['contr_check'])&&$values['contr_check'] == 'contr_check') print("checked"); ?>></p>
			
			<p><button type="submit" value="send">Отправить</button></p>
		</form>
	</div>
</body>
</html>