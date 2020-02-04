<?php
	if(isset($_POST['suppr_reserv']))
	{
		$sql = "DELETE FROM reservation WHERE id = '".$_POST['suppr_reserv']."'";
		$resultat_suppr = mysqli_query($connexion, $sql);
		header('Location: admin.php');
	}
?>