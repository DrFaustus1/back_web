<html lang="en">
<head>
  <meta charset='utf-8'/>
  <link rel="stylesheet" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'/>
</head>
<body>
<?php $sessionStarted = !empty($_COOKIE[session_name()]) &&
      !empty($_SESSION['login']); ?>
<a href="./login.php"> 
<?php if($sessionStarted) print('Logout');
	else print('Login');
?>
 </a>
<div class="form-wrapper">
<div class="form-layer">
<?php
	/*print_r("No Errors:".boolval(empty($errors)));
	print("<br/>");
	print_r("Session cookie:".!empty($_COOKIE[session_name()]));
	print("<br/>");
	print_r("Session start:".session_start());
	print("<br/>");
	print_r("Login info:".!empty($_SESSION['login']));
	*/
?>

<h1 class ="titles" id="linktitle"> Form </h1>
  <form action ="" method = "POST">
	<label>
			Name:<br />
			<input name="field-name-1" <?php if($errors['name']) print('class="error"');?> value="<?php print($values['name'])?>" /> <?php if($errors['name']) print($messages['bad_name']) ?>
		  </label><br />
	<label>
			email:<br />
			<input name="field-email" type="email" <?php if($errors['email']) print('class="error"');?> value="<?php print($values['email'])?>" /> <?php if($errors['email']) print($messages['bad_email']) ?>
		  </label><br />
	<label>
			Birth-date :<br />
			<input name="field-date" 
			  type="date" <?php if($errors['birth_date']) print('class="error"');?> value="<?php print($values['birth_date'])?>" /> <?php if($errors['birth_date']) print($messages['bad_date']) ?> 
		  </label><br />
	Sex: <label><input type="radio" <?php if($values['sex'] === 'male') print('checked="checked"');?>
			name="radio-group-1" value = "male" />
			Male </label>
		  <label><input type="radio" <?php if($values['sex'] === 'female') print('checked="checked"');?>
			name="radio-group-1" value = "female" />
			Female </label> <?php if($errors['sex']) print($messages['bad_sex']) ?><br />

	<label>
			Fav languages::
			<br/>
			<select name="field-name-4[]" <?php if($errors['super']) print('class="error"');?>
			  multiple="multiple">
			  <option value="Pascal" <?php if(isset($values['super'])!==false) print('selected');?>>Pascal</option>
			  <option value="C" <?php if(isset($values['super'])!==false) print('selected');?>>C</option>
			  <option value="CPP" <?php if(isset($values['super'])!==false) print('selected');?>>C++</option>
			  <option value="Python" <?php if(isset($values['super'])!==false) print('selected');?>>Python</option>
			</select>
			<?php if($errors['super']) print($messages['bad_super']) ?>
		  </label><br />
	<label>
	Biography: <br/>
	  <textarea name = "bio-field" <?php if($errors['bio']) print('class="error"');?>> <?php echo($values['bio']);?> </textarea>
	</label> <br/>
	<?php if($errors['bio']) print($messages['bad_bio'])?>
	<label>
	  <input type = "checkbox" name = "checkbox" value="realslim"> I agree with the contract </label>
	   <br/>
	   <?php if($errors['check']) print($messages['bad_check'])?>
	  Send: <br/>
	  <input type="submit" value="Sending" />
	  <br/>
	  <?php print($messages['saved']);
		print('<br/>');
		print($messages['passmessage']); 
	  ?>
  </form>
</div>
</div>
</body>
</html>