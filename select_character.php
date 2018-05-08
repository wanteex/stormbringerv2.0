<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>JDR ESAIP</title>
        <meta http-equiv="Content-Type" content="text/html"; charset=UTF-8" />
        <link rel="stylesheet" href="CSS_1.css" />
        <link rel="icon" type="image/x-ico" href="logo.ico" />
    </head>


    <body>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <div id="rectangle"><p>JDR ESAIP Club</p></div>
                    
                    <div>
                        <nav>
                            <ul>
                                <li class="menu-acceuil"><a href="index.php">Acceuil</a></li>
                                <li class="menu-esaipJ"><a href="Stormbringer.php">Stormbringer</a>
                                    <ul class="submenu">
                                         <li><a href="National.php">Nationalité</a></li>
                                         <li><a href="Classe.php">Classe</a></li>
                                         <li><a href="Histoire.php">Histoire du Monde</a></li>
                                    </ul>
                                </li>
                                <li class="menu-esaipE"><a href="#">Donjon et Dragons</a>
                                    <ul class="submenu">
                                         <li><a href="#">Nationalité</a></li>
                                         <li><a href="#">Classe</a></li>
                                         <li><a href="#">Histoire du Monde</a></li>
                                    </ul>
                                </li>
                                <li class="menu-esaipJ"><a href="#">Login</a>
                                    <ul class="submenu">
                                         
                                         <?php 
                                         if (isset($_SESSION['pseudo'])) {
                                            echo '<li><a href="disconnect.php">Se Deconnecter</a></li>';
                                        }else{
                                            echo '<li><a href="Register.php">S\'enregistrer</a></li>';
                                            echo '<li><a href="Login.php">Se connecter</a></li>';
                                        }
                                         ?>
                                    </ul>
                                </li>
                                <?php 
                                if (isset($_SESSION['pseudo'])) {
                                    echo '<li class="menu-esaipE"><a href="#">Personnages</a>
                                            <ul class="submenu">
                                                <li><a href="#">Créer un personnage</a></li>
                                                <li><a href="select_character.php">Voir ses personnages</a></li>
                                                <li><a href="character_registration.php">Enregistrer un personnages</a></li>
                                            </ul>
                                        </li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
        <article class="Farticle">
                        <h2>Voir ses personnages</h2>   
                            <?php
                            	include("includes/identifiants.php");
                            	if ($_SESSION['level']=='0') {
                            		header("Login.php");
                            		echo '<li><a href="Login.php">cliquez ici pour se connecter</a></li> ';
                            	}else{
                                        $reponse = $bdd->query('SELECT * FROM personage Where id_player ='.$_SESSION['id']);
                            ?>
                                        <form method="post" action="see_character.php">
                             
                                        <label for="perso">quel personnage voulez vous voir ?</label><br />
                                        <select name="perso" id="perso">
                            <?php
                                        while ($donnees = $reponse->fetch())
                                        {
                            ?>
                                           <option value= <?php echo $donnees['id_character'];?> > <?php echo $donnees['name_character']; ?></option>
                            <?php
                                        }
                            ?>
                                        </select>
                                        <p><input type="submit" value="Voir" /></p>
                                    </form>
                            <?php
                            		}
                            
                            ?>
        </article>
    </body>
</html>

