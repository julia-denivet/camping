<?php 
	if(isset($_POST['Connexion']))
	{
		if(!empty($_POST['login']) && !empty($_POST['passe'])) 
		{
			$connexion = mysqli_connect("localhost", "root", "", "camping");
			$sql = "SELECT * FROM utilisateurs WHERE login='".$_POST['login']."'";
			$req = mysqli_query($connexion, $sql);
			$data = mysqli_fetch_assoc($req);

			if(password_verify($_POST['passe'], $data['password']))
			{
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['id'] = $data['id'];
				header('Location: index.php');
			}
			else 
			{
				echo "Mauvais login / mot de passe. Merci de recommencer <br />";
			}
			mysqli_close($connexion);
		}
		else 
		{
			echo "Remplissez tous les champs pour vous connectez !";
		}
	}
?>