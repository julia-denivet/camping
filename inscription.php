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
		<title>Inscription - Camping</title>
	</head>
	
	<body>
		<header id="header">
			<?php
				include("header.php");
			?>
		</header>
		
		<main id="inscription">
			<section id="inscription_form">
				<div id="inscription_form_opacite">
					<form method="post" enctype="multipart/form-data">
						<div class="inscription_form_partie">
							<input type="text" name="login" class="inscription_2" placeholder="LOGIN"/>
							<input type="text" name="prenom" class="inscription_2" placeholder="PRENOM"/>
							<input type="password" name="passe" class="inscription_2" placeholder="MOT DE PASSE"/>
						</div>
						<div class="inscription_form_partie">
							<input type="mail" name="email" class="inscription_2" placeholder="E-MAIL"/>
							<input type="text" name="nom" class="inscription_2" placeholder="NOM"/>
							<input type="password" name="passe2" class="inscription_2" placeholder="CONFIRMATION MOT DE PASSE"/>
						</div>
						<div class="inscription_2">
							<label for="inscription_img">Choisissez une image de profil : </label>
							<input type="file" id="inscription_img" name="image" accept="image/png, image/jpeg, image/jpg">
						</div>
						<input type="submit" value="INSCRIPTION" name="inscription" class="inscription_2"/>
						<a id="inscription_3" href="connexion.php">CONNEXION</a>
						<?php
							include("verification/verif-inscription.php");
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
</html>