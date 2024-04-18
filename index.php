<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth">
        <form method = "POST" action="login.php" class="auth-form">
            <label class="form-login-text form-items">Логин</label>
            <input type="text" class="form-login form-items" name = "login">
            <label class="form-login-text form-items">Пароль</label>
            <input type="password" class="form-password form-items" name = "password">
            <input type="submit" class="form-button" value="Войти">
        </form>
        <?php 
        require_once __DIR__.'/boot.php';
        flash(); ?>
    </div>
</body>
</html>