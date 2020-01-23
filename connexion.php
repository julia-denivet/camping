<?php
    session_start();
    
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="camping.css">
<title>Document sans nom</title>
</head>

<body class="bodyco">
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
    <section class="sectionco">
        <form method="post" class="formco">
            <h1 class="h1co">Connexion</h1>
            <input class="tailleinput" type="text" name="login" placeholder="login"><br/>
            <input class="tailleinput" type="password" name="password" placeholder="password"<br/>        
            <input class="Validerco" type="submit" name="Valider">    
         </form>
    </section>
    
    <?php
        if (isset($_POST['Valider']))
            {
                $login = $_POST['login'];
                $password = $_POST ['password'];
                
                
                if ($login && $password)
                    {
                        $connect = mysqli_connect('localhost','root','', 'camping') or die ('Error');
                        $query = "SELECT*FROM utilisateurs WHERE login = '".$login."'";
                        $reg = mysqli_query ($connect,$query);
                        /*permet de lire/retourner une ligne du tableau, la première par défaut*/
                        $rows = mysqli_fetch_assoc($reg);

                        if ($login == $rows ['login'])
                        {
                            if (password_verify($_POST['password'],$rows['password']))
                            {	
                                session_start();
                                $_SESSION['login']=$login;
                                $_SESSION['password']=$password;
                                $_SESSION['id']=$rows['id'];
                                header('location: index.php');

                            } else echo "<p class = 'alertconnexion'>mot de passe incorrect</p>";

                        } else echo "<p class='alertconnexion'>Login ou Mot de passe incorrect</p>";

                    } else echo "<p class='alertconnexion'>Veuillez saisir tous les champs</p>";
                }
	?>

</html>