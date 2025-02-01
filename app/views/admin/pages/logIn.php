<?php include  __DIR__  . '/../elements/header.php' ?>

<?php if (isset($message)) {
    $error = $message;
} else {
    $error = '';
} ?>

<h3>Login Admin</h3>
<form action="" method="post">
    <input type="email" name="email" id="email" value="admin1@gmail.com">
    <input type="password" name="password" id="password" value="admin">

    <button type="submit">Se connecter</button>
    <?= $error ?>
</form>

<?php include  __DIR__  . '/../elements/footer.php' ?>  