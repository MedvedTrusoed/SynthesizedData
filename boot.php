<?php

// Инициализируем сессию
session_start();

$server = 'localhost';
$DBUser = 'User1';
$DBPassword = '123';
$DBName = 'users';

$mysqli = new mysqli($server, $DBUser, $DBPassword, $DBName) or die;
  if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }


function flash(?string $message = null)
{
    if ($message) {
        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) { ?>
          <div class="alert alert-danger mb-3">
              <?=$_SESSION['flash']?>
          </div>
        <?php }
        unset($_SESSION['flash']);
    }
}

