<?php
session_start();


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="camping.css">
<title>Document sans nom</title>
</head>

<body class="bodyinscription">
<header>
        <nav>
			<ul>
                <li ><a class="aheader" href="index.php">Accueil</a></li>
                <?php
                if (isset($_SESSION['login'])) 
                {
                    echo  "<li ><a class='aheader' href='index.php'>Inscription</a></li>";

                } 
                else echo "<li ><a class='aheader' href='inscription.php'>Inscription</a></li>";
                
                ?>
				<?php
				if(isset($_SESSION['login']))
				{
				echo "<li ><a class='aheader' href='deconnexion.php'>Déconnexion</a></li>";
				
				} else echo "<li ><a class='aheader' href='connexion.php'>Connexion</a></li>";
				?>
				<li ><a class="aheader" href="reservation.php">Reservation</a></li>
			</ul>
		</nav>
</header>
		<form method="post" action="inscription.php" class="forminsc">
			<h1 class="inscription">Inscription</h1>
            <input type="text" name="login" class="tailleinput"  placeholder="Login"><br/>
            <input type="text" name="nom" class="tailleinput"placeholder="Nom"><br/>
            <input type="text" name="prenom" class="tailleinput" placeholder="Prenom"><br/>
            <input type="text" name="mail" class="tailleinput" placeholder="Mail"><br/>
			<input type="password" name="password" class="tailleinput" placeholder="Mot de passe"><br/>
			<input type="password" name="confirmpassword" class="tailleinput" placeholder="Confirmer le mot de passe"><br/><br/>
			<input type="submit" value="Valider" name="submit" class="Validerinscript">
		</form>
        <?php
		if (isset($_POST['submit']))
		{
			$login = $_POST['login'];
			
			$confirmpassword = $_POST['confirmpassword'];
			
			if ($login && $_POST['password'] && $_POST['confirmpassword'])
			{
				if ($_POST['password']== $_POST['confirmpassword'])
				{
					
                    $connexion = mysqli_connect('localhost','root','','camping');
					$requete = "SELECT * FROM utilisateurs WHERE login='".$login."'";
					$query = mysqli_query($connexion, $requete);
					$rows = mysqli_num_rows($query);

					
					if ($rows==0)
					{
                        $mdp = password_hash($_POST['password'], PASSWORD_BCRYPT,array ('cost'=> 12));
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $mail = $_POST['mail'];
                        $requete2 = "INSERT INTO utilisateurs (nom, prenom, mail, login , password) VALUES ('$nom','$prenom', '$mail', '$login','$mdp')";
						mysqli_query($connexion, $requete2);
						mysqli_close($connexion);
						header('location:connexion.php');
						
					} else echo "Ce pseudo est indisponible";
					
				} else echo "Les deux mots de passe doivent être identiques";
				
			} else echo "Veuillez saisir tous les champs";
		} 
	?>
</body>
</html>