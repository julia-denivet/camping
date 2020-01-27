<?php
	session_start();
	if(isset($_SESSION['login']) || isset($_SESSION['password'])){}
	else
	{
		header('Location: index.php');
	}
	include("verification/verif-modification.php");
	$sql = "SELECT * FROM utilisateurs WHERE id='".$_SESSION['id']."'";
	$req = mysqli_query($connexion, $sql);
	$data = mysqli_fetch_assoc($req);
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css"/>
		<title>Profil - Camping</title>
	</head>
	
	<body>
		<header id="header">
			<?php
				include("header.php");
			?>
		</header>
			
		<main id="compte">
			<section id="compte_form">
				<div id="compte_form_opacite">
					<form method="post" enctype="multipart/form-data">
						<section id="compte_section_img">
							<div id="compte_div_img">
								<label for="compte_img_file" id="compte_img_label"><img id="compte_img" src="<?php echo $data['img_profil_folder'], "/", $data['img_profil']; ?>"></label>
								<input type="file" id="compte_img_file" name="image" accept="image/png, image/jpeg, image/jpg">
							</div>
						</section>
						<input type="text" name="login" class="compte_2" value="<?php echo $data['login']; ?>" placeholder="LOGIN" />
						<input type="password" name="passe" class="compte_2" value="<?php echo $data['password']; ?>" placeholder="MOT DE PASSE"/>
						<input type="text" name="prenom" class="compte_2" value="<?php echo $data['prenom']; ?>" placeholder="PRENOM" />
						<input type="text" name="nom" class="compte_2" value="<?php echo $data['nom']; ?>" placeholder="NOM" />
						<input type="text" name="mail" class="compte_2" value="<?php echo $data['email']; ?>" placeholder="MAIL" />
						<input type="submit" value="MODIFIER" name="modifier" class="compte_2"/>
						<?php
							include("verification/verif-modification-2.php");
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