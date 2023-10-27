<?php
// セッションスタート
session_start();
session_regenerate_id(true);

if (isset($_SESSION['regist'])) {
    $regist = $_SESSION['regist'];
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}

function checked($value, $checkValue)
{
    return ($value == $checkValue) ? 'checked' : '';
}

function selected($value, $checkValue)
{
    return ($value == $checkValue) ? 'selected' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- 1つ上の階層の componentsフォルダの head.php を読み込む -->
<?php include('../components/head.php'); ?>

<body>
    <?php include('../components/nav.php'); ?>

    <div class="container">
        <h1>入力画面</h1>

        <?php if (isset($errors)): ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li class="text-danger"><?= $error ?></li>
            <?php endforeach ?>
        </ul>
        <?php endif ?>

        <form action="confirm.php" method="post">
            <div class="form-group">
                <label class="form-label" for="">氏名</label>
                <input class="form-control" type="text" name="name" value="<?= @$regist['name'] ?>">
            </div>
            <div>
                <label class="form-label" for="">Email</label>
                <input class="form-control" type="email" name="email" value="<?= @$regist['email'] ?>">
            </div>
            <div>
                <label class="form-label" for="">パスワード</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="mt-3">
                <button class="w-100 btn btn-primary">確認</button>
            </div>
        </form>
    </div>
</body>

</html>