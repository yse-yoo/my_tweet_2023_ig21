<?php
//TODO：セッションチェック
session_start();
session_regenerate_id(true);

?>
<!DOCTYPE html>
<html lang="en">

<?php include('../components/head.php'); ?>

<body>
    <?php include('../components/nav.php'); ?>

    <div class="container">
        <h2>会員登録完了</h2>
        <p>
            登録ありがとうございました。
        </p>
        <div class="mt-3">
            <a class="w-100 btn btn-outline-primary" href="../login/">ログイン</a>
        </div>
    </div>
</body>

</html>