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


					<div class="text">

							<article class="Farticle">
								<header>
									<span>27 Avril 2018</span>
									<h2>Site JDR Esaip<br />
									les debuts</h2>
									<p>Ce site a pour objectif de presenter de maniere rapide ce qu'est l'association<br />
									et ce qu'elle va faire durant les prochains semestres. Sur le site vous pouvez vous login,<br />
									voir les dates d'evenements,...</p>
								</header>
							</article>

							<section>
								<section class="Particle">
								<article>
									<header>
										<h2><a href="#">Events</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
									<p>Chanter les petites marionnettes à 14h</p>
									<ul class="actions">
										<li><a href="#" class="button">Rediriger</a></li>
									</ul>
								</article>
								</section>
								
								<section class="Sarticle">
								<article>
									<header>
										<h2><a href="#">Contacts</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
									<p>Guillaume Lor : MJ Inexpériementé XD</br>
									Mathieu Ponthoreau : Président de l'association je crois^^</br>
									Emmanuel Poissonnière : Chieur de Service Professionnel et Diplômé ^^
									</p>
									<ul class="actions">
									</ul>
								</article>
								</section>
							</section>
					</div>
					<footer id=footer>
						<section>
							<section>
								<h3>Adresse</h3>
								<p>Rue 8 mai 1945<br />
								Saint-Barthelemy D'Anjou, 49124</p>
							</section>
							<section>
								<h3>Telephone</h3>
								<p><a href="#">00-00-00-00-00</a></p>
							</section>
							<section>
								<h3>Email</h3>
								<p><a href="#">ESAIPLan@hotmail.fr</a></p>
							</section>
							<section>
							<h3>&copy; Untitled</h3><h3>Design: <a href="#">ESAIP Administration</a></h3>
							</section>
						</section>
					</footer>
	</body>
</html>