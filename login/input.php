<?php
//セッション開始
session_start();
session_regenerate_id(true);

if (!empty($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('../components/head.php'); ?>

<body>
<?php include('../components/nav.php'); ?>

    <main id="id" class="d-flex justify-content-center">
        <div class="w-50 mt-3 p-5 bg-light">
            <h2 class="h2 mb-3 fw-normal text-center">Sign in</h2>
            <form action="auth.php" method="post">
                <div class="form-floating mb-2">
                    <input type="email" name="email" value="<?= @$regist['email'] ?>" class="form-control">
                    <label for="" class="form-label">Email</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control">
                    <label for="" class="form-label">Password</label>
                </div>
                <div>
                    <button class="w-100 mb-2 btn btn-primary">Sign in</button>
                    <a href="../regist" class="w-100 btn btn-outline-primary">Regist</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>