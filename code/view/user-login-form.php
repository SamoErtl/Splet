<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Login form</title>

<?php include("view/menu-links.php"); ?>

<?php if (!empty($errorMessage)): ?>
    <p class="important"><?= $errorMessage ?></p>
<?php endif; ?>
<form action="<?= BASE_URL . $formAction ?>" method="post">
<table class="login">
<tr><td class="login"><p>Try to log-in.</p></td></tr>
<tr><td class="login"><label>Username: <input type="text" name="username" autocomplete="off" 
            required autofocus /></label></td></tr>
<tr><td class="login"> <label>Password: <input type="password" name="password" required /></label></td></tr>
<tr><td class="login"><button>Log-in</button></td></tr>

</form>