<?php
	if(isset($_POST['inscription']))
	{
		if(!empty($_POST['login']) && !empty($_POST['passe']) && !empty($_POST['passe2']) && !empty($_POST['email']) && !empty($_POST['prenom']) && !empty($_POST['nom']))
		{
			$login = $_POST['login'];
			$passe = $_POST['passe'];
			$passe2 = $_POST['passe2'];
			$mail = $_POST['email'];
			$prenom = $_POST['prenom'];
			$nom = $_POST['nom'];
			$tmp_file = $_FILES['image']['tmp_name'];
			$type_file = $_FILES['image']['type'];
			$name_file = $_FILES['image']['name'];
			
			$connexion = mysqli_connect("localhost", "root", "", "camping");
			
			if($passe == $passe2)
			{
				if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $mail))
				{
					$nouveau_mail = "SELECT id FROM utilisateurs WHERE email='".$mail."'";
					$resultat = mysqli_query ($connexion, $nouveau_mail);
					$nombre_mail = mysqli_num_rows($resultat);

					if($nombre_mail < 1)
					{
						if (preg_match('#^[a-z0-9_]+#', $login))
						{
							$nouveau_login = "SELECT id FROM utilisateurs WHERE login='".$login."'";
							$resultat = mysqli_query ($connexion, $nouveau_login);
							$nombre_login = mysqli_num_rows($resultat);

							if($nombre_login < 1)
							{
								if(is_uploaded_file($tmp_file))
								{
									mkdir("Images/profils/".$login."");
									$content_dir = "Images/profils/".$login."/";
									move_uploaded_file($tmp_file, $content_dir . $name_file);
										
									$passe = password_hash($passe, PASSWORD_DEFAULT);
									$sql= "INSERT INTO utilisateurs (login, password, email, prenom, nom, img_profil_folder, img_profil, date_inscription) VALUES ('$login', '$passe', '$mail', '$prenom', '$nom', '$content_dir', '$name_file', NOW())";
									mysqli_query($connexion, $sql);
									mysqli_close($connexion);
									header('Location: connexion.php');
								}
								else
								{
									echo "Le fichier est introuvable";
								}
							}
							else
							{
								echo "Le pseudo $login est déjà utilisé";
							}
						}
						else
						{
							echo "Votre pseudo n'est pas valide";
						}
					}
					else
					{
						echo "L'adresse email $mail est déjà utilisé";
					}
				}
				else
				{
					echo "L'adresse email $email n'est pas valide";
				}
			}
			else
			{
				echo "Les deux mots de passe que <br /> vous avez rentrés ne correspondent pas";
			}
		}
		else
		{
			echo "Veuillez remplir toutes les casses";
		}
	}
?>