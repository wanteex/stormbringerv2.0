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
                                $reponse1 = $bdd->query('SELECT * FROM personage Where id_player ='.$_SESSION['id']);
                        ?>
                                    <form method="post" action="see_character.php">
                         
                                    <label for="perso">quel personnage voulez vous voir ?</label><br />
                                    <select name="perso" id="perso">
                        <?php
                                    while ($donnees1 = $reponse1->fetch())
                                    {
                        ?>
                                       <option value= <?php echo $donnees1['id_character'];?> > <?php echo $donnees1['name_character']; ?></option>
                        <?php
                                    }
                        ?>
                                    </select>
                                    <p><input type="submit" value="Voir" /></p>
                        <?php
                                $reponseperso= $bdd->query('SELECT * FROM personage Where id_character ='.$_POST['perso']);
                                $donnees = $reponseperso->fetch();
                                $reponsenatio = $bdd->query('SELECT * FROM nationality Where id_na ='.$donnees['id_na']);
                                $donneesnatio = $reponsenatio->fetch();
                                $reponsecult = $bdd->query('SELECT * FROM cult Where id_cu ='.$donnees['id_cu']);
                                $donneescult = $reponsecult->fetch();
                                $reponsechar = $bdd->query('SELECT * FROM characteristic Where id_ch ='.$donnees['id_ch']);
                                $donneeschar = $reponsechar->fetch();
                                $reponsehp = $bdd->query('SELECT * FROM hp Where id_hp ='.$donnees['id_hp']);
                                $donneeshp = $reponsehp->fetch();
                                $reponseMH = $bdd->query('SELECT * FROM mental_health Where id_sf ='.$donnees['id_sf']);
                                $donneesMH = $reponseMH->fetch();
                                $reponsecon = $bdd->query('SELECT * FROM knowledge Where id_kn ='.$donnees['id_kn']);
                                $donneescon = $reponsecon->fetch();
                        
                                $reponsela1 = $bdd->query('SELECT * FROM language Where id_la ='.$donneescon['id_la1']);
                                $donneesla1 = $reponsela1->fetch();
                                $reponsela2 = $bdd->query('SELECT * FROM language Where id_la ='.$donneescon['id_la2']);
                                $donneesla2 = $reponsela2->fetch();
                                $reponsela3 = $bdd->query('SELECT * FROM language Where id_la ='.$donneescon['id_la3']);
                                $donneesla3 = $reponsela3->fetch();
                                $reponsela4 = $bdd->query('SELECT * FROM language Where id_la ='.$donneescon['id_la4']);
                                $donneesla4 = $reponsela4->fetch();
                                $reponsela5 = $bdd->query('SELECT * FROM language Where id_la ='.$donneescon['id_la5']);
                                $donneesla5 = $reponsela5->fetch();
                                $reponsela6 = $bdd->query('SELECT * FROM language Where id_la ='.$donneescon['id_la6']);
                                $donneesla6 = $reponsela6->fetch();
                        
                                $reponseskill = $bdd->query('SELECT * FROM skill Where id_sk ='.$donnees['id_sk']);
                                $donneesskill = $reponseskill->fetch();
                        
                                $reponseag = $bdd->query('SELECT * FROM agility Where id_ag ='.$donneesskill['id_ag']);
                                $donneesag = $reponseag->fetch();
                                $reponsepe = $bdd->query('SELECT * FROM perception Where id_pe ='.$donneesskill['id_pe']);
                                $donneespe = $reponsepe->fetch();
                                $reponseha = $bdd->query('SELECT * FROM handing Where id_ha ='.$donneesskill['id_ha']);
                                $donneesha = $reponseha->fetch();
                                $reponseco = $bdd->query('SELECT * FROM communication Where id_co ='.$donneesskill['id_co']);
                                $donneesco = $reponseco->fetch();
                                $reponsedi = $bdd->query('SELECT * FROM discretion Where id_di ='.$donneesskill['id_di']);
                                $donneesdi = $reponsedi->fetch();
                        
                        
                        ?>
                        
                                        <p1>Nom: <?php echo $donnees['name_character'] ;?> </p1></br>
                                        <fieldset1>
                                        <legend>SEXE</legend>
                                        <p>
                                        <?php echo $donnees['sex'] ;?>      
                                        </p>
                                        </fieldset1>
                        
                                        <fieldset1>
                                        <legend>AGE</legend>
                                        <p>
                                        <?php echo $donnees['age'] ;?>      
                                        </p>
                                        </fieldset1>
                                    </br>
                                        <fieldset1>
                                        <legend>YEUX</legend>
                                        <p>
                                        <?php echo $donnees['eyes_colors'] ;?>      
                                        </p>
                                        </fieldset1>
                        
                                        <fieldset1>
                                        <legend>CHEVEUX</legend>
                                        <p>
                                        <?php echo $donnees['hairs_colors'] ;?>     
                                        </p>
                                        </fieldset1>
                        
                                        
                        
                                        <fieldset2>
                                        <legend>NATIONALITY</legend>
                                        <p>
                                        <?php echo $donneesnatio['name'] ;?>      
                                        </p>
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>CLASSE SOCIAL</legend>
                                        <p>
                                        <?php 
                                            if ($donnees['id_SC1'] != 1) {
                                                $reponseSC = $bdd->query('SELECT * FROM social_class Where id_sc ='.$donnees['id_SC1']);
                                                $donneesSC = $reponseSC->fetch();
                                                echo $donneesSC['name'].",";
                                            }
                                            if ($donnees['id_SC2'] != 1) {
                                                $reponseSC = $bdd->query('SELECT * FROM social_class Where id_sc ='.$donnees['id_SC2']);
                                                $donneesSC = $reponseSC->fetch();
                                                echo $donneesSC['name'].",";
                                            }
                                            if ($donnees['id_SC3'] != 1) {
                                                $reponseSC = $bdd->query('SELECT * FROM social_class Where id_sc ='.$donnees['id_SC3']);
                                                $donneesSC = $reponseSC->fetch();
                                                echo $donneesSC['name'];
                                            }
                                        ?>    
                                        </p>
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>CULTE</legend>
                                        <p>
                                        <?php echo $donneescult['name_cult'] ;?>      
                                        </p>
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>CARACTERISTIQUE</legend>
                                        <p><?php echo 'FORce: '.$donneeschar['strength'] ;?> </p>
                                        <p><?php echo 'CONstitution: '.$donneeschar['constitution'] ;?> </p>
                                        <p><?php echo 'TAIlle: '.$donneeschar['size'] ;?> </p>
                                        <p><?php echo 'INTelligence: '.$donneeschar['intelligence'] ;?> </p> 
                                        <p><?php echo 'POUvoir: '.$donneeschar['power'] ;?> </p> 
                                        <p><?php echo 'DEXterité: '.$donneeschar['dexterity'] ;?> </p> 
                                        <p><?php echo 'CHArisme: '.$donneeschar['charism'] ;?> </p> 
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>SANTE</legend>
                                        <p><?php echo 'Point de vie actuel: '.$donneeshp['currently'] ;?> </p>
                                        <p><?php echo 'Point de vie max: '.$donneeshp['max'] ;?> </p> 
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>SANTE MENTAL</legend>
                                        <p><?php echo 'Sante mental actuel: '.$donneesMH['currently'] ;?> </p>
                                        <p><?php echo 'Seuil de folie temporaire: '.$donneesMH['sft'] ;?> </p> 
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>CONNAISSANCE</legend>
                                        <p><?php echo 'Evaluer un trésors: '.$donneescon['evaluate_a_treasure'] ;?> </p>
                                        <p><?php echo 'Premier soin: '.$donneescon['first_aid'] ;?> </p>
                                        <p><?php echo 'Cartographie: '.$donneescon['cartography'] ;?> </p> 
                                        <p><?php echo 'Mémoriser: '.$donneescon['memorize'] ;?> </p> 
                                        <p><?php echo 'Connaissance des plantes: '.$donneescon['plant_knowledge'] ;?> </p> 
                                        <p><?php echo 'Connaissance des poisons: '.$donneescon['poison_knowledge'] ;?> </p>  
                                    </br>
                                        <p><?php echo 'Language Commun: '.$donneesla1['_read'].'/'.$donneesla1['_write'] ;?> </p>
                                        <p><?php echo 'Bas Melnibonéen: '.$donneesla2['_read'].'/'.$donneesla2['_write'] ;?> </p> 
                                        <p><?php echo 'Haut Melnibonéen: '.$donneesla3['_read'].'/'.$donneesla3['_write'] ;?> </p>  
                                        <p><?php echo 'Pande: '.$donneesla4['_read'].'/'.$donneesla4['_write'] ;?> </p> 
                                        <p><?php echo 'Mabden: '.$donneesla5['_read'].'/'.$donneesla5['_write'] ;?> </p> 
                                        <p><?php echo 'Orgien: '.$donneesla6['_read'].'/'.$donneesla6['_write'] ;?> </p>
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>Compétence d'armes</legend>
                                        <?php 
                                            if ($donnees['id_ws1'] != 1) {
                                                $reponsews = $bdd->query('SELECT * FROM weapon_skill Where id_ws ='.$donnees['id_ws1']);
                                                $donneesws = $reponsews->fetch();
                                        ?>
                                                <p> <?php echo $donneesws['weapon_name'].': '.$donneesws['attack'].'/'.$donneesws['damage'].'/'.$donneesws['parad'] ;?> </p>
                                        <?php }
                                            if ($donnees['id_ws2'] != 1) {
                                                $reponsews = $bdd->query('SELECT * FROM weapon_skill Where id_ws ='.$donnees['id_ws2']);
                                                $donneesws = $reponsews->fetch();
                                        ?>
                                                <p> <?php echo $donneesws['weapon_name'].': '.$donneesws['attack'].'/'.$donneesws['damage'].'/'.$donneesws['parad'] ;?> </p>
                                        <?php }
                                            if ($donnees['id_ws3'] != 1) {
                                                $reponsews = $bdd->query('SELECT * FROM weapon_skill Where id_ws ='.$donnees['id_ws3']);
                                                $donneesws = $reponsews->fetch();
                                        ?>
                                                <p> <?php echo $donneesws['weapon_name'].': '.$donneesws['attack'].'/'.$donneesws['damage'].'/'.$donneesws['parad'] ;?> </p>
                                        <?php }
                                            if ($donnees['id_ws4'] != 1) {
                                                $reponsews = $bdd->query('SELECT * FROM weapon_skill Where id_ws ='.$donnees['id_ws4']);
                                                $donneesws = $reponsews->fetch();
                                        ?>
                                                <p> <?php echo $donneesws['weapon_name'].': '.$donneesws['attack'].'/'.$donneesws['damage'].'/'.$donneesws['parad'] ;?> </p>
                                        <?php }
                                            if ($donnees['id_ws5'] != 1) {
                                                $reponsews = $bdd->query('SELECT * FROM weapon_skill Where id_ws ='.$donnees['id_ws5']);
                                                $donneesws = $reponsews->fetch();
                                        ?>
                                                <p> <?php echo $donneesws['weapon_name'].': '.$donneesws['attack'].'/'.$donneesws['damage'].'/'.$donneesws['parad'] ;?> </p>
                                        <?php }
                                            if ($donnees['id_ws6'] != 1) {
                                                $reponsews = $bdd->query('SELECT * FROM weapon_skill Where id_ws ='.$donnees['id_ws6']);
                                                $donneesws = $reponsews->fetch();
                                        ?>
                                                <p> <?php echo $donneesws['weapon_name'].': '.$donneesws['attack'].'/'.$donneesws['damage'].'/'.$donneesws['parad'] ;?> </p>
                                        <?php }
                                        ?> 
                                        </fieldset2>
                                        
                                        <fieldset2>
                                        <legend>Communication</legend>
                                        <p><?php echo 'Crédit: '.$donneesco['credit'] ;?> </p>
                                        <p><?php echo 'Eloquence: '.$donneesco['persuade'] ;?> </p>
                                        <p><?php echo 'Persuader: '.$donneesco['eloquence'] ;?> </p>
                                        <p><?php echo 'Chanter: '.$donneesco['sing'] ;?> </p>
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>Manipulation</legend>
                                        <p><?php echo 'Jongler: '.$donneesha['juggle'] ;?> </p>
                                        <p><?php echo 'Crocheter: '.$donneesha['crochet'] ;?> </p>
                                        <p><?php echo 'Passe-Passe: '.$donneesha['trick'] ;?> </p>
                                        <p><?php echo 'Faire un piège: '.$donneesha['make_a_knot'] ;?> </p>
                                        <p><?php echo 'Faire un noeud: '.$donneesha['make_a_trap'] ;?> </p>
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>Perception</legend>
                                        <p><?php echo 'Equilibre: '.$donneespe['balance'] ;?> </p>
                                        <p><?php echo 'Ecouler: '.$donneespe['listen'] ;?> </p>
                                        <p><?php echo 'Sentir: '.$donneespe['feel'] ;?> </p>
                                        <p><?php echo 'Chercher: '.$donneespe['look_for'] ;?> </p>
                                        <p><?php echo 'Voir: '.$donneespe['see'] ;?> </p>
                                        <p><?php echo 'Goûter: '.$donneespe['to_taste'] ;?> </p>
                                        <p><?php echo 'Pister: '.$donneespe['track'] ;?> </p>
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>Agility</legend>
                                        <p><?php echo 'Grimper: '.$donneesag['to_climb'] ;?> </p>
                                        <p><?php echo 'Eviter: '.$donneesag['to_avoid'] ;?> </p>
                                        <p><?php echo 'Sauter: '.$donneesag['jump'] ;?> </p>
                                        <p><?php echo 'Equitation: '.$donneesag['horse_riding'] ;?> </p>
                                        <p><?php echo 'Nager: '.$donneesag['swim'] ;?> </p>
                                        <p><?php echo 'Culbuter: '.$donneesag['trumble'] ;?> </p>
                                        </fieldset2>
                        
                                        <fieldset2>
                                        <legend>Discretion</legend>
                                        <p><?php echo 'Embuscade: '.$donneesdi['ambush'] ;?> </p>
                                        <p><?php echo 'Dissimuler: '.$donneesdi['hide'] ;?> </p>
                                        <p><?php echo 'Se cacher: '.$donneesdi['to_hide'] ;?> </p>
                                        <p><?php echo 'Mouvement silencieux: '.$donneesdi['silent_movement'] ;?> </p>
                                        <p><?php echo 'Couper un bourse: '.$donneesdi['cut_a_purse'] ;?> </p>
                                        </fieldset2>
                        
                                        </div>
                        <?php
                            }
                        
                        ?>
        </article>
    </body>
</html>