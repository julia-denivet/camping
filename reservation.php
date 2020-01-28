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
			
			<?php
				if (isset($_SESSION['login'])) 
				{
					$connexion = mysqli_connect("localhost", "root","", "camping");
					$requete = "SELECT * FROM reservation WHERE id_utilisateur='".$_SESSION['id']."'";
					$resultat = mysqli_query($connexion, $requete);
					
					
				}  else header('location: connexion.php');	
			?>
				<section>
					<article>
							<div>Arrivée</div>
							<div>Départ</div>
							<div>Lieu</div>
							<div>Options</div>
					</article>
				</section>
			<?php
					while ($donnees = mysqli_fetch_array($resultat))
					
					
					{
   
							   $requete = "SELECT login FROM utilisateurs WHERE id = '".$donnees['id_utilisateur']."'";
							   $req = mysqli_query($connexion, $requete);
							   $data = mysqli_fetch_assoc($req);
							
						   
							   echo"<article>".$donnees['3']." ".$donnees['4']."  ".$donnees['lieu']."";
									
								   if ($donnees['5']== 'on') 
								   {
									  echo 'borne électrique';
								   }
								   if ($donnees['disco']== 'on') 
								   {
									  echo 'Disco-Club “Les girelles dansantes”';
								   }
								   if ($donnees['activites']== 'on') 
								   {
									  echo 'activités Yoga, Frisbee et Ski Nautique';
								   }

								echo "</article>";
								    
							   
							 
							   
								   
					} 
		
						   mysqli_close($connexion); 
					
					

				

			
				
			?>	
				


			
		</main>
		
		<footer>
			<?php
				include("footer.php");
			?>
		</footer>
	</body>
</html>