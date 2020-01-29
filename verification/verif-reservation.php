<?php
	if(isset($_POST['reservation']))
	{
		if(!empty($_POST['emplacement']) && !empty($_POST['lieux']) && !empty($_POST['debut']) && !empty($_POST['fin']))
		{
			if(empty($_POST['electrique'])){$_POST['electrique'] = 'off';}
			if(empty($_POST['disco'])){$_POST['disco'] = 'off';}
			if(empty($_POST['activites'])){$_POST['activites'] = 'off';}
			
			$emplacement = $_POST['emplacement'];
			$lieux = $_POST['lieux'];
			$debut = $_POST['debut'];
			$fin = $_POST['fin'];
			$electrique = $_POST['electrique'];
			$disco = $_POST['disco'];
			$activites = $_POST['activites'];
			$id_utilisateurs = $_SESSION['id'];
			
			if($emplacement == 'Tente'){$prix = '10';}
			if($emplacement == 'Camping Car'){$prix = '20';}
			
			$dureesejour = (strtotime($fin) - strtotime($debut));
			$dureesejour = $dureesejour/86400;
			
			$prix = $prix * $dureesejour;
			
			if($electrique == 'on'){$prix = $prix + 2;}
			if($disco == 'on'){$prix = $prix + 17;}
			if($activites == 'on'){$prix = $prix + (30 * $dureesejour);}
			
			$sql= "INSERT INTO reservation (lieu, type, arrive, depart, electrique, disco, activites, prix, id_utilisateurs) VALUES ('$lieux', '$emplacement', '$debut', '$fin', '$electrique', '$disco', '$activites', '$prix', '$id_utilisateurs')";
			mysqli_query($connexion, $sql);
			mysqli_close($connexion);
			header('location: reservation.php');
		}
		else{
			echo "Veuillez remplir toutes les casses";
		}
	}
?>