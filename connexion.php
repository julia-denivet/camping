<?php

	session_start();
	if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){}
	else
	{
		header('Location: index.php');
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css"/>
		<title>Connexion - Camping</title>
	</head>
	
	<body>
		<header id="header">
			<?php
				include("header.php");
			?>
		</header>
			
		<main id="connexion">
			<section id="connexion_form">
				<div id="connexion_form_opacite">
					<form method="post">
						<input type="text" name="login" class="connexion_2" placeholder="LOGIN"/>
						<input type="password" name="passe" class="connexion_2" placeholder="MOT DE PASSE"/>
						<input type="submit" value="CONNEXION" name="Connexion" class="connexion_2"/>
						<a id="connexion_3" href="inscription.php">INSCRIPTION</a>
						<?php
							include("verification/verif-connexion.php");
						?>
					</form>
				</div>
			</section>
		</main>
			
		<footer>
			<?php
				include("footer.php");
			?>
		</footer>
	</body>
>>>>>>> 33e7cceb46f151ea0de2f7d2302ff553a1fd163a
</html>