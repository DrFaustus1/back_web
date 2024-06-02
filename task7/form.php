<!DOCTYPE html>

<style>
/* Сообщения об ошибках и поля с ошибками выводим с красной обводкой. */
.error {
  border: 2px solid red;
}
    </style>
  </head>
  <body>

<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <title>Task</title>
  <link rel="stylesheet" href="style7.css">
</head>

<body>

  <div id="main-aside-wrapper">
    <div id="cont" class="container">
      <div id="form" class="col-12 order-lg-3 order-sm-2">
      <div id="vhod">
          <?php 
          if (empty($_SESSION['login'])){
          ?>
          <a href="login7.php" >Войти</a>
          
          <?php 
          }else { ?><a href="login7.php" >Выйти</a><?php } ?>
          
        </div>
        <form action="" method="POST">
          ФИО:
          <label>
            <input name="fio"  <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>" placeholder="Введите ФИО">
          </label>
          <br>
          <br>
          E-mail:
          <label>
            <input type="email" name="email" placeholder="Введите e-mail" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>">
          </label>
          <p>Ваш год рождения:</p>
          <label>
            <select name="year">
              <option value="1995" <?php if($values['year'] == 1995) {print 'selected';}?>>1995</option>
              <option value="1996" <?php if($values['year'] == 1996) {print 'selected';}?>>1996</option>
              <option value="1997" <?php if($values['year'] == 1997) {print 'selected';}?>>1997</option>
              <option value="1998" <?php if($values['year'] == 1998) {print 'selected';}?>>1998</option>
              <option value="1999" <?php if($values['year'] == 1999) {print 'selected';}?>>1999</option>
              <option value="2000" <?php if($values['year'] == 2000) {print 'selected';}?>>2000</option>
              <option value="2001" <?php if($values['year'] == 2001) {print 'selected';}?>>2001</option>
              <option value="2002" <?php if($values['year'] == 2002) {print 'selected';}?>>2002</option>
              <option value="2002" <?php if($values['year'] == 2003) {print 'selected';}?>>2003</option>
              <option value="2002" <?php if($values['year'] == 2004) {print 'selected';}?>>2004</option>
              <option value="2002" <?php if($values['year'] == 2005) {print 'selected';}?>>2005</option>
              <option value="2002" <?php if($values['year'] == 2006) {print 'selected';}?>>2006</option>
              <option value="2002" <?php if($values['year'] == 2007) {print 'selected';}?>>2007</option>
              <option value="2002" <?php if($values['year'] == 2008) {print 'selected';}?>>2008</option>
              <option value="2002" <?php if($values['year'] == 2009) {print 'selected';}?>>2009</option>
              <option value="2002" <?php if($values['year'] == 2010) {print 'selected';}?>>2010</option>
              <option value="2002" <?php if($values['year'] == 2011) {print 'selected';}?>>2011</option>
              <option value="2002" <?php if($values['year'] == 2012) {print 'selected';}?>>2012</option>
              <option value="2002" <?php if($values['year'] == 2013) {print 'selected';}?>>2013</option>
              <option value="2002" <?php if($values['year'] == 2014) {print 'selected';}?>>2014</option>
              <option value="2002" <?php if($values['year'] == 2015) {print 'selected';}?>>2015</option>
              <option value="2002" <?php if($values['year'] == 2016) {print 'selected';}?>>2016</option>
              <option value="2002" <?php if($values['year'] == 2017) {print 'selected';}?>>2017</option>
              <option value="2002" <?php if($values['year'] == 2018) {print 'selected';}?>>2018</option>
              <option value="2002" <?php if($values['year'] == 2019) {print 'selected';}?>>2019</option>
              <option value="2002" <?php if($values['year'] == 2020) {print 'selected';}?>>2020</option>
              <option value="2002" <?php if($values['year'] == 2021) {print 'selected';}?>>2021</option>
              <option value="2002" <?php if($values['year'] == 2022) {print 'selected';}?>>2022</option>
              <option value="2002" <?php if($values['year'] == 2023) {print 'selected';}?>>2023</option>
              <option value="2002" <?php if($values['year'] == 2024) {print 'selected';}?>>2024</option>

            </select>
          </label>

          <p>Пол:</p>
          <label>
            <input type="radio" name="gender" value="male" <?php if($values['gender'] == 'M') {print 'checked';}?> <?php if ($errors['gender']) {print 'class="error"';} ?> />Мужчина
          </label>
          <label>
            <input type="radio" name="gender" value="female" <?php if($values['gender'] == 'F') {print 'checked';}?> <?php if ($errors['gender']) {print 'class="error"';} ?> />Женщина
          </label>


          <p>Любимый яп</p>
          <label>
            <select name="power[]" multiple=multiple>
              <option value="1" <?php if ($errors['power']) {print 'class="error"';} ?>
            <?php
              $arr = str_split($values['power']);
              foreach($arr as $el)
                if ($el == 1)
                  print 'selected';
            ?>
              >Pascal</option>
              <option value="2" <?php if ($errors['power']) {print 'class="error"';} ?>
              <?php
              $arr = str_split($values['power']);
              foreach($arr as $el)
                if ($el == 2)
                  print 'selected';
            ?>
              > C</option>
              <option value="3" <?php if ($errors['power']) {print 'class="error"';} ?>
              <?php
              $arr = str_split($values['power']);
              foreach($arr as $el)
                if ($el == 3)
                  print 'selected';
            ?>
              >C++</option>
              <option value="4" <?php if ($errors['power']) {print 'class="error"';} ?>
              <?php
              $arr = str_split($values['power']);
              foreach($arr as $el)
                if ($el == 4)
                  print 'selected';
            ?>
              >Python</option>
            </select>
          </label>

          <p id="bio">Биография</p>
          <label>
            <textarea placeholder="Расскажите о себе" name="biography" rows="6" cols="60"  <?php if ($errors['biography']) {print 'class="error"';} ?> ><?php print $values['biography'];?></textarea>
          </label>
          <br>

          <label>
            С контрактом ознакомлен(-а)
            <input type="checkbox" name="ok" >
          </label>
          <br>
          <input type="submit" value="Отправить">
        </form>
      </div>
    </div>
  </div>
</body>

</html>