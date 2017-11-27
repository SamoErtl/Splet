<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Logged-in</title>

<h1>Successfull register.</h1>

<?php include("view/menu-links.php"); ?>

<p>Welcome <b><?= $username ?></b>. Your made an account. You are now already log-in.</p>
<ul>
    <li><b>Username:</b> <code class="highlight"><?= $username ?></code></li>
</ul>
