<?php include  __DIR__  . '/../elements/header.php' ?>

<?php if (isset($message)) {
    $error = $message;
} else {
    $error = '';
} ?>

<form action="" method="post">
    <input type="email" name="email" id="email">
    <input type="password" name="password" id="password">

    <button type="submit">Se connecter</button>
    <?= $error ?>
</form>
<?php include  __DIR__  . '/../elements/footer.php' ?>