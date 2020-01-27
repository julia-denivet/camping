<?php
	$connexion = mysqli_connect("localhost", "root", "", "camping");
	$sql = "SELECT * FROM utilisateurs WHERE id='".$_SESSION['id']."'";
	$req = mysqli_query($connexion, $sql);
	$data = mysqli_fetch_assoc($req);

	$modif_donnees = false;
	$erreur_login = false;
	$erreur_casse = false;
	
	if(isset($_POST['modifier']))
	{
		if(!empty($_POST['login']) && !empty($_POST['passe']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']))
		{
			$login = $_POST['login'];
			$passe = $_POST['passe'];
			$prenom = $_POST['prenom'];
			$nom = $_POST['nom'];
			$mail = $_POST['mail'];
			$img_profil_folder = $data['img_profil_folder'];
			$anc_img = $data['img_profil'];
			$tmp_file = $_FILES['image']['tmp_name'];
			$type_file = $_FILES['image']['type'];
			$name_file = $_FILES['image']['name'];
			
			if(is_uploaded_file($tmp_file))
			{
				$content_dir = $img_profil_folder;
				$suppr_img = "$content_dir/$anc_img";
				$new_img = "$content_dir/$name_file";
				unlink($suppr_img);
				move_uploaded_file($tmp_file, $new_img);
				$sql = "UPDATE utilisateurs SET img_profil = '$name_file'  WHERE login = '".$_SESSION['login']."'";
				mysqli_query($connexion, $sql);
				$modif_donnees = true;
			}
			
			if($login != $data['login'])
			{
				$nouveau_login = "SELECT id FROM utilisateurs WHERE login='".$login."'";
				$resultat = mysqli_query ($connexion, $nouveau_login);
				$nombre_login = mysqli_num_rows($resultat);

				if($nombre_login < 1)
				{
					$sql = "UPDATE utilisateurs SET login = '$login' WHERE login = '".$_SESSION['login']."'";
					mysqli_query($connexion, $sql);
					$_SESSION['login'] = $_POST['login'];
					$modif_donnees = true;
				}
				else
				{
					$erreur_login = true;
				}
			}
			
			if($passe != $data['password'])
			{
				$passe = password_hash($passe, PASSWORD_DEFAULT);
				$sql = "UPDATE utilisateurs SET password = '$passe' WHERE login = '".$_SESSION['login']."'";
				mysqli_query($connexion, $sql);
				$modif_donnees = true;
			}
			
			if($prenom != $data['prenom'])
			{
				$sql = "UPDATE utilisateurs SET prenom = '$prenom' WHERE login = '".$_SESSION['login']."'";
				mysqli_query($connexion, $sql);
				$modif_donnees = true;
			}
			
			if($nom != $data['nom'])
			{
				$sql = "UPDATE utilisateurs SET nom = '$nom' WHERE login = '".$_SESSION['login']."'";
				mysqli_query($connexion, $sql);
				$modif_donnees = true;
			}
			
			if($mail != $data['email'])
			{
				if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $mail))
				{
					$nouveau_mail = "SELECT id FROM utilisateurs WHERE email='".$mail."'";
					$resultat = mysqli_query ($connexion, $nouveau_mail);
					$nombre_mail = mysqli_num_rows($resultat);

					if($nombre_mail < 1)
					{
						$sql = "UPDATE utilisateurs SET email = '$mail' WHERE login = '".$_SESSION['login']."'";
						mysqli_query($connexion	, $sql);
						$modif_donnees = true;
					}
					else
					{
						$erreur_casse = true;
					}
				}
				else
				{
					$erreur_casse = true;
				}
			}
		}
		else
		{
			$erreur_casse = true;
		}
	}
?>