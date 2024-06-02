<?php
	header('Content-Type: text/html; charset=UTF-8');

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  	if (!empty($_GET['save'])) {
      print('Спасибо, результаты сохранены.');
  	}
    include('form.php');
 		exit();
	}else {
		$errors = false;
    $Langs  = $_POST['uPow'];
    $Lang_P = in_array('Pascal', $Langs) ? 1 : 0;
    $Lang_C = in_array('C', $Langs) ? 1 : 0;
    $Lang_CPP = in_array('C++', $Langs) ? 1 : 0;
    $Lang_JS = in_array('JavaScript', $Langs) ? 1 : 0;
    $Lang_PHP = in_array('PHP', $Langs) ? 1 : 0;


		
		$uMailReg = "/^[\w\.-]+@([\w-]+\.)+[\w-]{2,4}$/";
		
		
		
		
		if(empty($_POST['uName'])) {
			print('Заполните Имя. <br/>');
			$errors = true;
		}
		if(empty($_POST['uMail'])) {
			print('Заполните E-mail. <br/>');
			$errors = true;
		}else if (!preg_match($uMailReg, $_POST['uMail'])) {
      print('Некорректно введен E-mail. <br/>');
      $errors = TRUE;
    }
		if(empty($_POST['uDate'])) {
			print('Заполните Дату. <br/>');
			$errors = true;
		}
		if (empty($_POST['uGen'])) {
      print('Заполните Пол. <br/>');
      $errors = TRUE;
    } else if ($_POST['uGen'] != 1 && $_POST['uGen'] != 2) {
      print('Некорректно введен Пол. <br/>');
      $errors = TRUE;
    }
		/*if ($Langs < 1) {
			print('<div style="color:red;margin: 5px;border:3px solid red;">Заполните поле яп.</div> <br/>');
      $errors = TRUE;
    } else if ($Langs != 1 && $Langs != 2 &&$Langs != 3 && $Langs != 4) {
      print('Некорректно заполнен поле яп. <br/>');
			$errors = TRUE;
    }
    */
		if(empty($_POST['uBio'])) {
			print('Заполните Биографию.');
			$errors = TRUE;
		}
		if($errors) {
			include('form.php');
			exit();
		}

		
		$uName = $_POST['uName'];
		$uMail = $_POST['uMail'];
		$uDate = $_POST['uDate'];
		$uGen = $_POST['uGen'];
		//$uPow = $_POST['uPow'];
		$uBio = $_POST['uBio'];
	
		try{
			$user =  'u67424';
			$pass ='7576191';

			$db = new PDO('mysql:host=localhost;dbname=u67424', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
      $stmt = $db->prepare("INSERT INTO TaskData (Name, Email, Birthdate, Gender, Lang_P, Lang_C, Lang_CPP, Lang_JS, Lang_PHP, Bio) VALUES (:name, :email, :date, :gender, :Lang_P, :Lang_C, :Lang_CPP, :Lang_JS, :Lang_PHP, :bio)");
      $stmt->bindParam(':name', $uName);
      $stmt->bindParam(':email', $uMail);
      $stmt->bindParam(':date', $uDate);
      $stmt->bindParam(':gender', $uGen);
       $stmt->bindParam(':Lang_P', $Lang_P);
       $stmt->bindParam(':Lang_C', $Lang_C);
       $stmt->bindParam(':Lang_CPP', $Lang_CPP);
       $stmt->bindParam(':Lang_JS', $Lang_JS);
       $stmt->bindParam(':Lang_PHP', $Lang_PHP);

      $stmt->bindParam(':bio', $uBio);
			if($stmt->execute()==false){
  			print_r($stmt->errorCode());
  			print_r($stmt->errorInfo());
  			exit();
 			}
		}	catch(PDOException $e){
 				print('Error : ' . $e->getMessage());
  			exit();
		}
		print_r("Succesfully added new stuff, ");
	}









?>