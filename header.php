<img id="logo" src="Images/hipster-mountain-camping-logo-vecteur_7888-164.png" />
<nav>
	<ul>
		<li><a href="index.php">ACCUEIL</a></li>
		<?php
			if(isset($_SESSION['login']) || isset($_SESSION['password']))
			{
				echo '
					<li><a id="co_deco_bouton" href="">RESERVATION</a></li>
					<li><a id="co_deco_bouton" href="profil.php">PROFIL</a></li>
					<li><a id="co_deco_bouton" href="deconnexion.php">DECONNEXION</a></li>
				';
			}
			else
			{
				echo '<li><a id="co_deco_bouton" href="connexion.php">CONNEXION</a></li>';
			}
		?>
		<li><a href="contact.php">CONTACT</a></li>
	</ul>
</nav>