<?php
require_once __DIR__.'/boot.php';

$login = $_POST['login'];

  try{

$authInfo = $mysqli->query("SELECT * FROM `users` WHERE `Логин` = '$login'");

$user = mysqli_fetch_assoc($authInfo);

// проверяем пароль
if ($_POST['password'] == $user['Пароль']) {
     $_SESSION['user_id'] = $user['Логин'];
     header('Location: customerData.php');
     die;
 }

 header('Location: index.php');
 flash('Пользователя не существует.');

  } catch (Exception $e) {
    flash('Пользователя не существует.');
    header('Location: index.php');
    die;
  }


?>