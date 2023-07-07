<nav>
	<a href="/">e-voting</a>
	<ul>
		<li> <a href="index.php">Home </a></li>
		<?php 
		if (isset($_SESSION['role'])) {
			echo "<li> <a href='logout.php'>Logout </a></li>";
		} else {
			echo "<li> <a href='login.php'>Login </a></li>";
		}
		?>
	</ul>
</nav>
