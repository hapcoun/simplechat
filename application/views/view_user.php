<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SiCHAT</title>
    <script src="/assets/js/jquery-2.1.1.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css" />
</head>
<body>
    <div class="login">
        <div class="header"><h1>Авторизация</h1></div>
        <?php echo validation_errors(); ?>
        <?php echo form_open('user/verify'); ?>
        <input type="text" size="20" id="username" name="username" placeholder="Введи свой ник и входи..."/>
        <input id="authorize" type="submit" value="Войти"/>
        </form>
    </div>
</body>
</html>

