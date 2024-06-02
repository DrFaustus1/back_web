<?php 
function connectToDB($user,$pass){
    $db = new PDO('mysql:host=localhost;dbname=u67424', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    return $db;
}
function connectDB(){
    $user = 'u67424';
    $pass = '7576191';
    $db = new PDO('mysql:host=localhost;dbname=u67424', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    return $db;
}
?>