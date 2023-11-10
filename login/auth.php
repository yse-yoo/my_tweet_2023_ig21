<?php
require_once('../app.php');

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('can not get access');
}

//TODO: サニタイズ
//POSTデータを取得
$post = $_POST;

// TODO: MySQLから email でユーザ取得
$user = new User();
// ユーザ認証
$auth_user = $user->auth($post['email'], $post['password']);

// もしユーザセッションがあれば削除
if (!empty($_SESSION['auth_user'])) {
    unset($_SESSION['auth_user']);
}

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