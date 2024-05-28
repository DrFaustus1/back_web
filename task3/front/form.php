
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Ex3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <form action="back.php" method = "POST" class="form_class content">
            <div> ФИО: </div>
        <label>
        <input  type="text" name="uName" placeholder="Ваше имя" autocomplete="off">
        </label>
            <br/>	
            <div> Email: </div>	
            <label>
            <input  type="text" name="uMail" placeholder="E-mail" autocomplete="off">
        </label><br/>
            <div> Дата рождения: </div>
        <label>
            <input  type="date" name="uDate" autocomplete="off">
        </label>
            <br/>
        <div> Пол: </div>
            <div >
            <input type="radio" value="1" name="uGen" id="uMale" checked="checked">
            <label for="uMale"> Мужской </label>
        </div>
        <div>
            <input type="radio" value="2" name="uGen" id="uFemale">
            <label  for="uFemale"> Женский: </label>
        </div>


        <div> Любимый яп: </div>
        <label>
            <select  multiple aria-label="multiple select" name="uPow[]">
            <option value="Pascal">Pascal</option>
            <option value="C">C</option>
            <option value="C++">C++</option>
            <option value="JavaScript">JavaScript</option>
            <option value="PHP">PHP</option>
            </select>
        </label>
        </div>

            <div class="content">
            <div>Ваша биография:</div>
            <label>
            <textarea name="uBio" class="" placeholder="Ваша биография" autocomplete="off"></textarea>
            </label>
            <br/>
            </div>

        <div class="content">
            <label >
                    <input type="checkbox" id="check">С контрактом согласен!
                </label>
                <br/>
            </div>
        <div class="subButton">
            <input type="submit"  id="submitButton" value="Сохранить!">
            </div>
            </div>
        </form>
    </div>
</body>