<?php
require_once('../app.php');

//セッションにユーザがあれば消す
if (!empty($_SESSION['auth_user'])) {
    unset($_SESSION['auth_user']);
}

// ログイン画面にリダイレクト
header('Location: ../login/');
exit;