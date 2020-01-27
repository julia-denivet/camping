<?php
	session_start();
	if(isset($_SESSION['login']) || isset($_SESSION['password'])){}
	else
	{
		header('Location: index.php');
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title>Contact - Camping</title>
	</head>

	<body>
		<header id="header">
			<?php
				include("header.php");
			?>
		</header>
		
		<main id="reservation">
			
			<?php
				include("verification/verif-reservation.php");
			?>
		</main>
		
		<footer>
			<?php
				include("footer.php");
			?>
		</footer>
	</body>
</html>