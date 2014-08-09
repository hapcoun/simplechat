<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
    <title>SiCHAT</title>
    <script src="/assets/js/jquery-2.1.1.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css" />
</head>
<body>
    <div class="header">
        <h1>Просто ЧАТ</h1>
    </div>
    <div class="logout"><a href="chat/logout">Выйти</a></div>
    <div id="users-list">

    </div>
    <div id="chat_window">
        <? foreach($messages as $message):?>
                <div class="row">
                    <span class="date"><?= $message['date'];?></span>
                <? if($message['user_id'] != $user_id): ?>
                    <span class="username"><?= $message['username'];?></span>
                <? endif; ?>
                    <span class="<?= ($message['user_id'] != $user_id) ? 'message' : 'my_message'?>"><?= $message['text'];?></span>
                </div>
        <? endforeach;?>
    </div>
    <form id="add-new-message" autocomplete="off">
        <input type="text" name="new-message" placeholder="Пиши сюда и жми ENTER"/>
    </form>
    <script src="/assets/js/main.js"></script>
</body>
</html>
