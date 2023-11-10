<?php
//セッション開始
session_start();
session_regenerate_id(true);

if (!empty($_SESSION['regist'])) {
    unset($_SESSION['regist']);
}

// 入力画面にリダイレクト
header('Location: input.php');
exit;
