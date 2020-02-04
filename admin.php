<?php
	session_start();
	if($_SESSION['login'] == 'admin'){}
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
		<title>Profil - Camping</title>
	</head>
	
	<body>
		<header id="header">
			<?php
				include("header.php");
			?>
		</header>
			
		<main id="admin">
			<section id="admin_reservation_affichage">
				<section id="admin_reservation_affichage_header">
					<div class="admin_reservation_affichage_compartiment">ID</div>
					<div class="admin_reservation_affichage_compartiment">PSEUDO</div>
					<div class="admin_reservation_affichage_compartiment">ARRIVEE</div>
					<div class="admin_reservation_affichage_compartiment">DEPART</div>
					<div class="admin_reservation_affichage_compartiment">TYPE</div>
					<div class="admin_reservation_affichage_compartiment">LIEU</div>
					<div class="admin_reservation_affichage_compartiment">OPTION</div>
					<div class="admin_reservation_affichage_compartiment">PRIX</div>
					<div class="admin_reservation_affichage_compartiment">SUPPR</div>
				</section>
				
				<?php
					$connexion = mysqli_connect("localhost", "root", "", "camping");
					$requete = "SELECT * FROM reservation";
					$resultat = mysqli_query($connexion, $requete);
					
					while($donnees = mysqli_fetch_array($resultat))
					{
						echo '<section id="admin_reservation_affichage_reservation">';
							$requete2 = "SELECT login FROM utilisateurs WHERE id = ".$donnees['id_utilisateurs']."";
							$resultat2 = mysqli_query($connexion, $requete2);
							$donnees2 = mysqli_fetch_array($resultat2);
							echo '<div class="reservation_affichage_compartiment">', $donnees['id'], '</div>';
							echo '<div class="reservation_affichage_compartiment">', $donnees2['login'], '</div>';
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
							echo '<div class="reservation_affichage_compartiment"><form method="post"><button type="submit" name="suppr_reserv" value="'.$donnees['id'].'">X</button></form></div>';
						echo '</section>';
					}
				
					include('verification/verif-suppr.php');
				?>
			</section>
			
			<section id="modif_reservation_form">
				<h1>MODIFICATION RESERVATION</h1>
				<form method="post">
					<fieldset><legend>RESERVATION NUMERO</legend>
						<select name="id_reservation" class="reservation_form_css">
							<option value="">--Selectionner la réservation--</option>
							<?php
								$requete = "SELECT id FROM reservation";
								$resultat = mysqli_query($connexion, $requete);
								while($donnees = mysqli_fetch_array($resultat))
								{
									echo '<option value="', $donnees['id'],'">', $donnees['id'], '</option>';
								}
							?>
						</select>
					</fieldset>
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
					
					<input type="submit" id="modif_reservation_form_validation" value="MODIFIER RESERVATION" name="modif_reservation"/>
					<?php
						include("verification/verif-modif-reservation.php");
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