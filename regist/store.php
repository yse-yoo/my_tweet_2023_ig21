<?php
// セッションスタート
session_start();
session_regenerate_id(true);

//セッションからデータ取得
$regist = $_SESSION['regist'];

//TODO: データチェック
//TODO: SQLを作成して
//TODO: データベースに保存
// $sql = "INSERT INTO (name, email, ....) VLAUES($name, $emaile, $password)";
// $xxxx->query($sql);
$isSuccess = true;

// セッション削除
unset($_SESSION['regist']);

//結果画面にリダイレクト（URL転送）
if ($isSuccess) {
    //成功したら 完了画面
    header('Location: result.php');
} else {
    //失敗したら 入力画面
    header('Location: input.php');
}
