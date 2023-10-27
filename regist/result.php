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

    <h2>会員登録完了</h2>
    <p>
        登録ありがとうございました。
    </p>
</body>

</html>