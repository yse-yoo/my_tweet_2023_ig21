<?php
//セッション開始
session_start();
session_regenerate_id(true);

//TODO: サニタイズ
//POSTデータを取得
$post = $_POST;

// TODO: MySQLから email でユーザ取得
// TODO: パスワードチェック（Hashのチェック）

// もしユーザセッションがあれば削除
if (!empty($_SESSION['auth_user'])) {
    unset($_SESSION['auth_user']);
}

//ユーザ認証ができたとする
$auth_user['id'] = 1;
$auth_user['name'] = 'YSE';
$auth_user['email'] = 'test@test.com';

if (!empty($auth_user)) {
    //成功したら
    // セッションにユーザを登録
    $_SESSION['auth_user'] = $auth_user;

    //Tweet画面にリダイレクト
    header('Location: ../');
    exit;
} else {
    //失敗したら、ログイン入力画面にリダイレクト
    header('Location: ./');
    exit;
}
?>