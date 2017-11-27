<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Register form</title>
<?php include("view/menu-links.php"); ?>



<?php if (!empty($errorMessage)): ?>
    <p class="important"><?= $errorMessage ?></p>
<?php endif; ?>


<form action="<?= BASE_URL . $formAction ?>" method="post">
<table class="login">
<tr><td class="login"><p>Try to log-in.</p></td></tr>
<tr><td class="login"><label>Username: <input type="text" name="username" autocomplete="off" pattern=".{3,}" title="Three or more characters"
            required autofocus /></label></td></tr>
<tr><td class="login"> <label>Password: <input type="password" name="password" 
            pattern=".{6,}" title="Six or more characters"
            '''
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"  
            '''
            required />
        </label></td></tr>
<tr><td class="login"><button>Register</button></td></tr>

</form>