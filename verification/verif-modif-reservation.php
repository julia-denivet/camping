<?php
	if(isset($_POST['modif_reservation']))
	{
		if(!empty($_POST['emplacement']) && !empty($_POST['lieux']) && !empty($_POST['debut']) && !empty($_POST['fin']))
		{
			if(empty($_POST['electrique'])){$_POST['electrique'] = 'off';}
			if(empty($_POST['disco'])){$_POST['disco'] = 'off';}
			if(empty($_POST['activites'])){$_POST['activites'] = 'off';}
			
			$id_reservation = $_POST['id_reservation'];
			$debut = $_POST['debut'];
			$fin = $_POST['fin'];
			$lieux = $_POST['lieux'];
			$emplacement = $_POST['emplacement'];
			$electrique = $_POST['electrique'];
			$disco = $_POST['disco'];
			$activites = $_POST['activites'];
			$id_utilisateurs = $_SESSION['id'];
			$dureesejour = (strtotime($fin) - strtotime($debut));
			$dureesejour = ($dureesejour/86400) + 1;
			$capacitetempo = 0;
			
			if($emplacement == 'Tente'){$prix = '10'; $nb_emplacement = '1';}
			if($emplacement == 'Camping Car'){$prix = '20'; $nb_emplacement = '2';}

			$requete = "SELECT * FROM reservation WHERE lieu = '".$lieux."' AND arrive BETWEEN '".$debut."' AND '".$fin."' OR lieu = '".$lieux."' AND depart BETWEEN '".$debut."' AND '".$fin."'";
			$resultat = mysqli_query($connexion, $requete);
			$resultat2 = mysqli_fetch_all($resultat);
            
			foreach ($resultat2 as $donnees)
			{
				if ($donnees[2] == "Tente")
				{
					$capacitetempo = $capacitetempo + 1;
				}
				elseif ($donnees[2] == "Camping Car")
				{
					$capacitetempo = $capacitetempo + 2;
				}
			}

			$capacitetempo = $capacitetempo + $nb_emplacement;
			
			if ($capacitetempo <= 4) {
				if($dureesejour >= 1)
				{
					if($emplacement == 'Tente'){$prix = '10'; $nb_emplacement = '1';}
					if($emplacement == 'Camping Car'){$prix = '20'; $nb_emplacement = '2';}

					$prix = $prix * $dureesejour;

					if($electrique == 'on'){$prix = $prix + 2;}
					if($disco == 'on'){$prix = $prix + 17;}
					if($activites == 'on'){$prix = $prix + (30 * $dureesejour);}
					
					$sql= "UPDATE reservation SET lieu = '$lieux', type = '$emplacement', arrive = '$debut', depart = '$fin', electrique = '$electrique', disco = '$disco', activites = '$activites', prix = '$prix', nb_emplacement = '$nb_emplacement', id_utilisateurs = '$id_utilisateurs' WHERE id = $id_reservation";
					mysqli_query($connexion, $sql);
					mysqli_close($connexion);
				}
				else{
					echo "Veuillez vérifier vos dates";
				}
			}
			else {
				echo "Plus d'emplacement disponible pour cette période";
			}
		}
		else{
			echo "Veuillez remplir toutes les casses";
		}
	}
?>