<?php
	if(isset($_POST['reservation']))
	{
		if(!empty($_POST['emplacement']) && !empty($_POST['lieux']) && !empty($_POST['debut']) && !empty($_POST['fin']) && !empty($_POST['electrique']) && !empty($_POST['disco']) && !empty($_POST['activites']))
		{
			$emplacement = $_POST['emplacement'];
			$lieux = $_POST['lieux'];
			$debut = $_POST['debut'];
			$fin = $_POST['fin'];
			$electrique = $_POST['electrique'];
			$disco = $_POST['disco'];
			$activites = $_POST['activites'];
			$id_utilisateurs = $_SESSION['id'];
			
			$sql= "INSERT INTO reservation (lieu, type, arrive, depart, electrique, disco, activites, id_utilisateurs) VALUES ('$lieux', '$emplacement', '$debut', '$fin', '$electrique', '$disco', '$activites', '$id_utilisateurs')";
			mysqli_query($connexion, $sql);
			mysqli_close($connexion);
		}
		else{
			echo "Veuillez remplir toutes les casses";
		}
	}
?>