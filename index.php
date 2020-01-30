<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title>Accueil - Camping</title>
	</head>

	<body id="background_accueil">
		<header id="header_accueil">
			<?php
				include("header.php");
			?>
		</header>
		
		<main id="accueil">
			<h1>LE CAMPING DES HAPPY SARDINES</h1>
			<h2><a href="reservation.php">RESERVATION</a></h2>
		</main>
		
		<footer>
			<?php
				include("footer.php");
			?>
		</footer>
	</body>
</html>