<header>

<a id="left" href="<?= BASE_URL . "bowl" ?>">All public games</a>  

<?php if (User::isLoggedIn()): ?>
	<pre id="left"> | </pre> <a id="left" href="<?= BASE_URL . "bowl/privat" ?>">Your games</a>
	<pre id="left"> | </pre> <a id="left" href="<?= BASE_URL . "bowl/add" ?>">Add game</a>
	<a id="right" href="<?= BASE_URL . "logout" ?>">Logout (<?= User::getUsername() ?>)</a>
<?php else: ?>
	<a id="right" href="<?= BASE_URL . "register" ?>">Register</a>  <pre id="right">  </pre>
	<a id="right" href="<?= BASE_URL . "login" ?>">Login</a> 
	
<?php endif; ?>

</header>
<div id="clearLR"></div>
