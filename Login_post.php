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
					<h2>Connexion</h2>
					<?php
					include("includes/identifiants.php");
					$message='';
					if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
					{
					    $message = '<p>Tous les champs doivent être remplis.</p>
						<p>Cliquez <a href="Login.php">ici</a> pour revenir</p>';
					}
					else //On check le mot de passe
					{
					    $query=$bdd->prepare('SELECT * FROM account Where pseudo = :pseudo');
						$query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
					    $query->execute();
					    $data=$query->fetch();
						if ($data['password'] == md5($_POST['password'])) // Acces OK !
						{
						    $_SESSION['pseudo'] = $data['pseudo'];
						    $_SESSION['level'] = $data['level'];
						    $_SESSION['id'] = $data['id_account'];
						    $message = '<p>Bienvenue '.$data['pseudo'].', 
					        	vous êtes maintenant connecté!</p>
					        	<p>Cliquez <a href="index.php">ici</a> 
					        	pour revenir à la page d accueil</p>'; 
						}
						else // Acces pas OK !
						{
					    	$message = '<p>Une erreur s\'est produite 
					    		pendant votre identification.<br /> Le mot de passe ou le pseudo 
					    		entré n\'est pas correcte.</p><p>Cliquez <a href="Login.php">ici</a> 
					    		pour revenir à la page précédente
					    		<br /><br />Cliquez <a href="index.php">ici</a> 
					    		pour revenir à la page d accueil</p>';
						}
					    $query->CloseCursor();
					}
					echo $message.'</div></body></html>';
					?>
				</article>
</html>