<?php
//セッション開始
session_start();
session_regenerate_id(true);

//セッションにユーザがあれば消す
if (!empty($_SESSION['auth_user'])) {
    unset($_SESSION['auth_user']);
}

// ログイン画面にリダイレクト
header('Location: ../login/');
exit;