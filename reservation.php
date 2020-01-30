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
			<section id="reservation_affichage">
				<section id="reservation_affichage_header">
					<div class="reservation_affichage_compartiment">ARRIVEE</div>
					<div class="reservation_affichage_compartiment">DEPART</div>
					<div class="reservation_affichage_compartiment">TYPE</div>
					<div class="reservation_affichage_compartiment">LIEU</div>
					<div class="reservation_affichage_compartiment">OPTION</div>
					<div class="reservation_affichage_compartiment">PRIX</div>
				</section>
				
				<?php
					$connexion = mysqli_connect("localhost", "root", "", "camping");
					$requete = "SELECT * FROM reservation WHERE id_utilisateurs = '".$_SESSION['id']."'";
					$resultat = mysqli_query($connexion, $requete);

					while($donnees = mysqli_fetch_array($resultat))
					{
						echo '<section id="reservation_affichage_reservation">';
							echo '<div class="reservation_affichage_compartiment">', $donnees['arrive'], '</div>';
							echo '<div class="reservation_affichage_compartiment">', $donnees['depart'], '</div>';
							echo '<div class="reservation_affichage_compartiment">', $donnees['type'], '</div>';
							echo '<div class="reservation_affichage_compartiment">', $donnees['lieu'], '</div>';
							echo '<div class="reservation_affichage_compartiment">';
								if($donnees['electrique'] == 'on'){echo '<div>Borne électrique</div>';}
								if($donnees['disco'] == 'on'){echo '<div>Club Disco</div>';}
								if($donnees['activites'] == 'on'){echo '<div>Activités</div>';}
							echo '</div>';
							echo '<div class="reservation_affichage_compartiment">', $donnees['prix'], '€</div>';
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
								<option value="Tente">Tente</option>
								<option value="Camping Car">Camping car</option>
							</select>
						</fieldset>
						<fieldset><legend>LIEUX</legend>
							<select name="lieux" class="reservation_form_css">
								<option value="">--Lieux--</option>
								<option value="La Plage">La Plage</option>
								<option value="Les Pins">Les Pins</option>
								<option value="Le Maquis">Le Maquis</option>
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
								Activités Yoga, Frisbee et Ski Nautique +30€ (par jour)
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