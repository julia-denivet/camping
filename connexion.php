<?php
    session_start();
    
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="camping.css">
<title>Document sans nom</title>
</head>

<body>
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
    <form>
        <input type="text" name="login" placeholder="login"><br/>
        <input type="password" name="password" placeholder="password"<br/>        
        <input type="submit" name="Valider">    
    </form>
    <?php
        if (isset($_POST['Valider']))
            {
              if (!empty($_POST['login'])&&!empty($_POST['password'])) 
              {
                  $connexion = mysqli_connect("localhost","root","","camping");
                  $sql = "SELECT*FROM utilisateurs WHERE login='".$_POST['login']."'";
                  $req = mysqli_query($connexion, $sql);
                  $data = mysqli_fetch_all($req);

                  if (password_verify($_POST['password'], $data['password'])) 
                  {
                     $_SESSION['login'] = $_POST['login'];
                     $_SESSION['password'] = $_POST['passe'];
                     header('Location: index.php');
                  }
                  else {
                      echo "Mauvais login / mot de passe incorrect."
                  }
                  mysqli_close($connexion);
              }
              else {
                  echo "Remplissez tous les champs pour vous connecter ! "
              }
            }
	?>
   

</html>