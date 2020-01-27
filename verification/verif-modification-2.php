<?php
	if($modif_donnees)
	{
		echo "Vos données bien été modifié !";
	}

	if($erreur_login == 1)
	{
		echo "Le pseudo $login est déjà utilisé";
	}

	if($erreur_casse == true)
	{
		echo "Veuillez remplir toutes les casses";
	}
?>