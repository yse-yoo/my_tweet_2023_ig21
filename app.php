<?php
//ベースのフォルダのパス
const BASE_DIR = __DIR__;

//env.php読み込み
require_once(BASE_DIR . "/env.php");

//モデルファイル読み込み
require_once(BASE_DIR . "/app/models/User.php");
require_once(BASE_DIR . "/app/models/Tweet.php");

//セッション開始
session_start();
session_regenerate_id(true);