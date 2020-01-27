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
		
		<main id="contact">
			<section id="contact_section_blanc">
				<form id="contact_form" method="post">
					<fieldset><legend>VOS COORDONNEES</legend>
						<input type="text" id="nom" name="nom" tabindex="1" placeholder="NOM"/>
						<input type="text" id="email" name="email" tabindex="2" placeholder="MAIL"/>
					</fieldset>

					<fieldset><legend>VOTRE MESSAGE</legend>
						<input type="text" id="objet" name="objet" tabindex="3" placeholder="OBJET"/>
						<textarea name="message" placeholder="MESSAGE"></textarea>
						<input id="button" type="submit" name="envoi" value="ENVOYER"/>
					</fieldset>
				</form>
				<?php
					include("verification/verif-contact.php");
				?>
			</section>
		</main>
		
		<footer>
			<?php
				include("footer.php");
			?>
		</footer>
	</body>
</html>