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
			<section id="reservation_form">
				<section id="reservation_affichage_header">
					<div>ARRIVEE</div>
					<div>DEPART</div>
					<div>LIEU</div>
					<div>OPTION</div>
					<div>PRIX</div>
				</section>
				
				<?php
					$connexion = mysqli_connect("localhost", "root", "", "camping");
					$requete = "SELECT * FROM reservation WHERE id_utilisateurs = '".$_SESSION['id']."'";
					$resultat = mysqli_query($connexion, $requete);

					while($donnees = mysqli_fetch_array($resultat))
					{
						echo '<section id="reservation_affichage_header">';
							echo '<div>', $donnees['arrive'], '</div>';
							echo '<div>', $donnees['depart'], '</div>';
							echo '<div>', $donnees['lieu'], '</div>';
							echo '<div>';
								if($donnees['electrique'] == 'on'){echo 'Borne électrique';}
								if($donnees['disco'] == 'on'){echo 'Club Disco';}
								if($donnees['activites'] == 'on'){echo 'Activités';}
							echo '</div>';
							echo '<div>', $donnees['prix'], '€</div>';
						echo '</section>';
					}
				?>
			</section>
			
			<section id="reservation_form">
				<h1>NOUVELLE RESERVATION</h1>
				<form method="post">
					<div class="double_fieldset">
						<fieldset><legend>EMPLACEMENT</legend>
							<select name="emplacement" class="reservation_form_css">
								<option value="">--Type d'emplacement--</option>
								<option value="tente">Tente</option>
								<option value="campingcar">Camping car</option>
							</select>
						</fieldset>
						<fieldset><legend>LIEUX</legend>
							<select name="lieux" class="reservation_form_css">
								<option value="">--Lieux--</option>
								<option value="plage">La Plage</option>
								<option value="pins">Les Pins</option>
								<option value="marquis">Le Maquis</option>
							</select>
						</fieldset>
					</div>
					
					<div class="double_fieldset">
						<fieldset><legend>ARRIVEE</legend>
							<input type="date" name="debut" class="reservation_form_css" value="<?php echo date('Y-m-d'); ?>"/>
						</fieldset>
						<fieldset><legend>DEPART</legend>
							<input type="date" name="fin" class="reservation_form_css" value="<?php echo date('Y-m-d'); ?>"/>
						</fieldset>
					</div>

					<fieldset><legend>OPTIONS</legend>
						<div id="option">
							<label for="electrique">
								<input type="checkbox" name="electrique"/>
								Borne électrique +2€
							</label>
							<label for="disco">
								<input type="checkbox" name="disco"/>
								Disco-Club +17€
							</label>
							<label for="activites">
								<input type="checkbox" name="activites"/>
								Activités Yoga, Frisbee et Ski Nautique +30€
							</label>
						</div>
					</fieldset>
					
					<input type="submit" id="reservation_form_validation" value="RESERVER" name="reservation"/>
					<?php
						include("verification/verif-reservation.php");
					?>
				</form>
			</section>
		</main>
		
		<footer>
			<?php
				include("footer.php");
			?>
		</footer>
	</body>
</html>