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
							<h2>enregistrement</h2>
							<p>Votre personnage a bien été enregistré</p>
						</article>
<?php
// Connexion à la base de données
include("includes/identifiants.php");
// Insertion du message à l'aide d'une requête préparée
$agi = $bdd -> prepare('INSERT INTO agility(to_climb, to_avoid, jump, horse_riding, swim, trumble) VALUES(:to_climb, :to_avoid, :jump, :horse_riding, :swim, :trumble)');
$agi->execute(array(	'to_climb' => $_POST['to_climb'],
						'to_avoid' => $_POST['to_avoid'],
						'jump' => $_POST['jump'],
						'horse_riding' => $_POST['horse_riding'],
						'swim' => $_POST['swim'], 
						'trumble' => $_POST['trumble'],
					));
$hom = $bdd -> prepare('INSERT INTO home(name, valuable, specification, possesion_of) VALUES(:name, :valuable, :specification, :possesion_of)');
$hom->execute(array(	'name' => $_POST['name'],
						'valuable' => $_POST['valuable'],
						'specification' => $_POST['specification'],
						'possesion_of' => $_POST['name_character'],
					));



$charact = $bdd -> prepare('INSERT INTO characteristic(strength, constitution, size, intelligence, power, dexterity, charism) VALUES(:strength, :constitution, :size, :intelligence, :power, :dexterity, :charism)');
$charact->execute(array('strength' => $_POST['strength'],
						'constitution' => $_POST['constitution'],
						'size' => $_POST['size'],
						'intelligence' => $_POST['intelligence'],
						'power' => $_POST['power'],
						'dexterity' => $_POST['dexterity'],
						'charism' => $_POST['charism'],
					));


$comm = $bdd -> prepare('INSERT INTO communication(credit, persuade, eloquence, sing) VALUES(:credit, :persuade, :eloquence, :sing)');
$comm->execute(array('credit' => $_POST['credit'],
					'persuade' => $_POST['persuade'],
					'eloquence' => $_POST['eloquence'],
					'sing' => $_POST['sing'],
					));

$dis = $bdd -> prepare('INSERT INTO discretion(ambush, hide, to_hide, silent_movement, cut_a_purse) VALUES(:ambush, :hide, :to_hide, :silent_movement, :cut_a_purse)');
$dis->execute(array('ambush' => $_POST['ambush'],
					'hide' => $_POST['hide'],
					'to_hide' => $_POST['to_hide'],
					'silent_movement' => $_POST['silent_movement'],
					'cut_a_purse' => $_POST['cut_a_purse'],
					));

$han = $bdd -> prepare('INSERT INTO handing(juggle, crochet, trick, make_a_knot, make_a_trap) VALUES(:juggle, :crochet, :trick, :make_a_knot, :make_a_trap)');
$han->execute(array('juggle' => $_POST['juggle'],
					'crochet' => $_POST['crochet'],
					'trick' => $_POST['trick'],
					'make_a_knot' => $_POST['make_a_knot'],
					'make_a_trap' => $_POST['make_a_trap'],
					));

$percep = $bdd -> prepare('INSERT INTO perception(balance, listen, feel, look_for, see, to_taste, track) VALUES(:balance, :listen, :feel, :look_for, :see, :to_taste, :track)');
$percep->execute(array('balance' => $_POST['balance'],
					'listen' => $_POST['listen'],
					'feel' => $_POST['feel'],
					'look_for' => $_POST['look_for'],
					'see' => $_POST['see'],
					'to_taste' => $_POST['to_taste'],
					'track' => $_POST['track'],
					));

$lan = $bdd -> prepare('INSERT INTO language(language_name, _read, _write) VALUES(:language_name, :_read, :_write)');
$lan->execute(array('language_name' => 'Langage Commun',
					'_read' => $_POST['laCr'],
					'_write' => $_POST['laCw'],
					));
$lan->execute(array('language_name' => 'Bas Melnibonéen',
					'_read' => $_POST['laBMr'],
					'_write' => $_POST['laBMw'],
					));
$lan->execute(array('language_name' => 'Haut Melnibonéen',
					'_read' => $_POST['laHMr'],
					'_write' => $_POST['laHMw'],
					));
$lan->execute(array('language_name' => 'Pande',
					'_read' => $_POST['laPr'],
					'_write' => $_POST['laPw'],
					));
$lan->execute(array('language_name' => 'Mabden',
					'_read' => $_POST['laMr'],
					'_write' => $_POST['laMw'],
					));
$lan->execute(array('language_name' => 'Orgien',
					'_read' => $_POST['laOr'],
					'_write' => $_POST['laOw'],
					));

$ws = $bdd -> prepare('INSERT INTO weapon_skill(weapon_name, attack, parad, damage) VALUES(:weapon_name, :attack, :parad, :damage)');
$ws->execute(array('weapon_name' => $_POST['weapon_name1'],
					'attack' => $_POST['attack1'],
					'parad' => $_POST['parad1'],
					'damage' => $_POST['damage1'],
					));
$ws->execute(array('weapon_name' => $_POST['weapon_name2'],
					'attack' => $_POST['attack2'],
					'parad' => $_POST['parad2'],
					'damage' => $_POST['damage2'],
					));
$ws->execute(array('weapon_name' => $_POST['weapon_name3'],
					'attack' => $_POST['attack3'],
					'parad' => $_POST['parad3'],
					'damage' => $_POST['damage3'],
					));
$ws->execute(array('weapon_name' => $_POST['weapon_name4'],
					'attack' => $_POST['attack4'],
					'parad' => $_POST['parad4'],
					'damage' => $_POST['damage4'],
					));
$ws->execute(array('weapon_name' => $_POST['weapon_name5'],
					'attack' => $_POST['attack5'],
					'parad' => $_POST['parad5'],
					'damage' => $_POST['damage5'],
					));
$ws->execute(array('weapon_name' => $_POST['weapon_name6'],
					'attack' => $_POST['attack6'],
					'parad' => $_POST['parad6'],
					'damage' => $_POST['damage6'],
					));

$invoc = $bdd -> prepare('INSERT INTO invocation(type, specialization, description, elan_cost) VALUES(:type, :specialization, :description, :elan_cost)');
$invoc->execute(array('type' => $_POST['type'],
					'specialization' => $_POST['specialization'],
					'description' => $_POST['description'],
					'elan_cost' => $_POST['elan_cost'],
					));

$posse = $bdd -> prepare('INSERT INTO possesion(money, debt, weapon) VALUES(:money, :debt, :weapon)');
$posse->execute(array('money' => $_POST['money'],
					'debt' => $_POST['debt'],
					'weapon' => $_POST['weapon'],
					));

$hp = $bdd -> prepare('INSERT INTO hp(max, currently) VALUES(:max, :currently)');
$hp->execute(array('max' => $_POST['max'],
					'currently' => $_POST['Hpcurrently'],
					));
$hp = $bdd -> prepare('INSERT INTO mental_health(sft, currently) VALUES(:sft, :currently)');
$hp->execute(array('sft' => $_POST['sft'],
					'currently' => $_POST['MHcurrently'],
					));


$LC=0;
$LBM=0;
$LHM=0;
$LP=0;
$LM=0;
$LO=0;
$reponsela = $bdd->query('SELECT * From language');
while ($donnees=$reponsela->fetch()){
	if($donnees['_read']==$_POST['laCr'] && $donnees['_write']==$_POST['laCw'] && $donnees['language_name']=="Langage Commun"){
		$guarry=$donnees['id_la'];
		if($guarry >= $LC){
				$LC=$guarry;
		}
	}
}
$reponsela = $bdd->query('SELECT * From language');
while ($donnees=$reponsela->fetch()){
	if($donnees['_read']==$_POST['laBMr'] && $donnees['_write']==$_POST['laBMw'] && $donnees['language_name']=="Bas Melnibonéen"){
		$guarry=$donnees['id_la'];
		if($guarry >= $LBM){
				$LBM=$guarry;
		}
	}
}
$reponsela = $bdd->query('SELECT * From language');
while ($donnees=$reponsela->fetch()){
	if($donnees['_read']==$_POST['laHMr'] && $donnees['_write']==$_POST['laHMw'] && $donnees['language_name']=="Haut Melnibonéen"){
		$guarry=$donnees['id_la'];
		if($guarry >= $LHM){
				$LHM=$guarry;
		}
	}
}
$reponsela = $bdd->query('SELECT * From language');
while ($donnees=$reponsela->fetch()){
	if($donnees['_read']==$_POST['laPr'] && $donnees['_write']==$_POST['laPw'] && $donnees['language_name']=="Pande"){
		$guarry=$donnees['id_la'];
		if($guarry >= $LP){
				$LP=$guarry;
		}
	}
}
$reponsela = $bdd->query('SELECT * From language');
while ($donnees=$reponsela->fetch()){
	if($donnees['_read']==$_POST['laMr'] && $donnees['_write']==$_POST['laMw'] && $donnees['language_name']=="Mabden"){
		$guarry=$donnees['id_la'];
		if($guarry >= $LM){
				$LM=$guarry;
		}
	}
}
$reponsela = $bdd->query('SELECT * From language');
while ($donnees=$reponsela->fetch()){
	if($donnees['_read']==$_POST['laOr'] && $donnees['_write']==$_POST['laOw'] && $donnees['language_name']=="Orgien"){
		$guarry=$donnees['id_la'];
		if($guarry >= $LO){
				$LO=$guarry;
		}
	}
}
$kno = $bdd -> prepare('INSERT INTO knowledge(evaluate_a_treasure, first_aid, cartography, memorize, plant_knowledge, poison_knowledge, craft, id_la1, id_la2, id_la3, id_la4, id_la5, id_la6) VALUES(:evaluate_a_treasure, :first_aid, :cartography, :memorize, :plant_knowledge, :poison_knowledge, :craft, :id_la1, :id_la2, :id_la3, :id_la4, :id_la5, :id_la6)');
$kno->execute(array('evaluate_a_treasure' => $_POST['evaluate_a_treasure'],
					'first_aid' => $_POST['first_aid'],
					'cartography' => $_POST['cartography'],
					'memorize' => $_POST['memorize'],
					'plant_knowledge' => $_POST['plant_knowledge'],
					'poison_knowledge' => $_POST['poison_knowledge'],
					'craft' => $_POST['craft'],
					'id_la1' => $LC,
					'id_la2' => $LBM,
					'id_la3' => $LHM,
					'id_la4' => $LP,
					'id_la5' => $LM,
					'id_la6' => $LO,
					));

$ag=0;
$co=0;
$di=0;
$pe=0;
$ha=0;
$reponseag = $bdd->query('SELECT * From agility');
while ($donnees=$reponseag->fetch()){
	if($donnees['to_climb']==$_POST['to_climb'] && $donnees['to_avoid']==$_POST['to_avoid'] && $donnees['jump']==$_POST['jump'] && $donnees['horse_riding']==$_POST['horse_riding'] && $donnees['swim']==$_POST['swim'] && $donnees['trumble']==$_POST['trumble']){
		$guarry=$donnees['id_ag'];
		if($guarry >= $ag){
				$ag=$guarry;
		}
	}
}
$reponseco = $bdd->query('SELECT * From communication');
while ($donnees=$reponseco->fetch()){
	if($donnees['credit']==$_POST['credit'] && $donnees['persuade']==$_POST['persuade'] && $donnees['eloquence']==$_POST['eloquence'] && $donnees['sing']==$_POST['sing']){
		$guarry=$donnees['id_co'];
		if($guarry >= $co){
				$co=$guarry;
		}
	}
}
$reponsepe = $bdd->query('SELECT * From perception');
while ($donnees=$reponsepe->fetch()){
	if($donnees['balance']==$_POST['balance'] && $donnees['listen']==$_POST['listen'] && $donnees['feel']==$_POST['feel'] && $donnees['look_for']==$_POST['look_for'] && $donnees['see']==$_POST['see'] && $donnees['to_taste']==$_POST['to_taste'] && $donnees['track']==$_POST['track']){
		$guarry=$donnees['id_pe'];
		if($guarry >= $pe){
				$pe=$guarry;
		}
	}
}
$reponseha = $bdd->query('SELECT * From handing');
while ($donnees=$reponseha->fetch()){
	if($donnees['juggle']==$_POST['juggle'] && $donnees['crochet']==$_POST['crochet'] && $donnees['trick']==$_POST['trick'] && $donnees['make_a_knot']==$_POST['make_a_knot'] && $donnees['make_a_trap']==$_POST['make_a_trap']){
		$guarry=$donnees['id_ha'];
		if($guarry >= $ha){
				$ha=$guarry;
		}
	}
}
$reponsedi = $bdd->query('SELECT * From discretion');
while ($donnees=$reponsedi->fetch()){
	if($donnees['ambush']==$_POST['ambush'] && $donnees['hide']==$_POST['hide'] && $donnees['to_hide']==$_POST['to_hide'] && $donnees['silent_movement']==$_POST['silent_movement'] && $donnees['cut_a_purse']==$_POST['cut_a_purse']){
		$guarry=$donnees['id_di'];
		if($guarry >= $di){
				$di=$guarry;
		}
	}
}
$ski = $bdd -> prepare('INSERT INTO skill(communication, handing, perception, agility, discretion, id_ag, id_pe, id_ha, id_co, id_di) VALUES(:communication, :handing, :perception, :agility, :discretion, :id_ag, :id_pe, :id_ha, :id_co, :id_di)');
$ski->execute(array('communication' => $_POST['communication'],
					'handing' => $_POST['handing'],
					'perception' => $_POST['perception'],
					'agility' => $_POST['agility'],
					'discretion' => $_POST['discretion'],
					'id_ag' => $ag,
					'id_pe' => $pe,
					'id_ha' => $ha,
					'id_co' => $co,
					'id_di' => $di,
					));

$ch=0;
$ho=0;
$hp=0;
$sf=0;
$in=0;
$kn=0;
$po=0;
$sk=0;
$ws1=1;
$ws2=1;
$ws3=1;
$ws4=1;
$ws5=1;
$ws6=1;
$reponsech = $bdd->query('SELECT * From characteristic');
while ($donnees=$reponsech->fetch()){
	if($donnees['strength']==$_POST['strength'] && $donnees['constitution']==$_POST['constitution'] && $donnees['size']==$_POST['size'] && $donnees['intelligence']==$_POST['intelligence'] && $donnees['power']==$_POST['power'] && $donnees['dexterity']==$_POST['dexterity'] && $donnees['charism']==$_POST['charism']){
		$guarry=$donnees['id_ch'];
		if($guarry >= $ch){
				$ch=$guarry;
		}
	}
}
$reponsehp = $bdd->query('SELECT * From hp');
while ($donnees=$reponsehp->fetch()){
	if($donnees['currently']==$_POST['Hpcurrently'] && $donnees['max']==$_POST['max']){
		$guarry=$donnees['id_hp'];
		if($guarry >= $hp){
				$hp=$guarry;
		}
	}
}
$reponsesf = $bdd->query('SELECT * From mental_health');
while ($donnees=$reponsesf->fetch()){
	if($donnees['currently']==$_POST['MHcurrently'] && $donnees['sft']==$_POST['sft']){
		$guarry=$donnees['id_sf'];
		if($guarry >= $sf){
				$sf=$guarry;
		}
	}
}
$reponsein = $bdd->query('SELECT * From invocation');
while ($donnees=$reponsein->fetch()){
	if($donnees['type']==$_POST['type'] && $donnees['specialization']==$_POST['specialization'] && $donnees['description']==$_POST['description'] && $donnees['elan_cost']==$_POST['elan_cost']){
		$guarry=$donnees['id_in'];
		if($guarry >= $in){
				$in=$guarry;
		}
	}
}

$reponsekn = $bdd->query('SELECT * From knowledge');
while ($donnees=$reponsekn->fetch()){
	if($donnees['evaluate_a_treasure']==$_POST['evaluate_a_treasure'] && $donnees['first_aid']==$_POST['first_aid'] && $donnees['cartography']==$_POST['cartography'] && $donnees['memorize']==$_POST['memorize'] && $donnees['plant_knowledge']==$_POST['plant_knowledge'] && $donnees['poison_knowledge']==$_POST['poison_knowledge'] && $donnees['craft']==$_POST['craft'] && $donnees['id_la1']==$LC && $donnees['id_la2']==$LBM && $donnees['id_la3']==$LHM && $donnees['id_la4']==$LP && $donnees['id_la5']==$LM && $donnees['id_la6']==$LO){
		$guarry=$donnees['id_kn'];
		if($guarry >= $kn){
				$kn=$guarry;
		}
	}
}
$reponsepo = $bdd->query('SELECT * From possesion');
while ($donnees=$reponsepo->fetch()){
	if($donnees['money']==$_POST['money'] && $donnees['debt']==$_POST['debt'] && $donnees['weapon']==$_POST['weapon']){
		$guarry=$donnees['id_po'];
		if($guarry >= $po){
				$po=$guarry;
		}
	}
}
$reponsein = $bdd->query('SELECT * From invocation');
while ($donnees=$reponsein->fetch()){
	if($donnees['type']==$_POST['type'] && $donnees['specialization']==$_POST['specialization'] && $donnees['description']==$_POST['description'] && $donnees['elan_cost']==$_POST['elan_cost']){
		$guarry=$donnees['id_in'];
		if($guarry >= $in){
				$in=$guarry;
		}
	}
}
$reponsesk = $bdd->query('SELECT * From skill');
while ($donnees=$reponsesk->fetch()){
	if($donnees['communication']==$_POST['communication'] && $donnees['handing']==$_POST['handing'] && $donnees['perception']==$_POST['perception'] && $donnees['agility']==$_POST['agility'] && $donnees['discretion']==$_POST['discretion'] && $donnees['id_ag']==$ag && $donnees['id_pe']==$pe && $donnees['id_ha']==$ha && $donnees['id_co']==$co && $donnees['id_di']==$di){
		$guarry=$donnees['id_sk'];
		if($guarry >= $sk){
				$sk=$guarry;
		}
	}
}
$reponsews1 = $bdd->query('SELECT * From weapon_skill');
while ($donnees=$reponsews1->fetch()){
	if($donnees['weapon_name']==$_POST['weapon_name1'] && $donnees['attack']==$_POST['attack1'] && $donnees['parad']==$_POST['parad1'] && $donnees['damage']==$_POST['damage1']){
		$guarry=$donnees['id_ws'];
		if($guarry >= $ws1){
				$ws1=$guarry;
		}
	}
}
$reponsews2 = $bdd->query('SELECT * From weapon_skill');
while ($donnees=$reponsews2->fetch()){
	if($donnees['weapon_name']==$_POST['weapon_name2'] && $donnees['attack']==$_POST['attack2'] && $donnees['parad']==$_POST['parad2'] && $donnees['damage']==$_POST['damage2']){
		$guarry=$donnees['id_ws'];
		if($guarry >= $ws2){
				$ws2=$guarry;
		}
	}
}
$reponsews3 = $bdd->query('SELECT * From weapon_skill');
while ($donnees=$reponsews3->fetch()){
	if($donnees['weapon_name']==$_POST['weapon_name3'] && $donnees['attack']==$_POST['attack3'] && $donnees['parad']==$_POST['parad3'] && $donnees['damage']==$_POST['damage3']){
		$guarry=$donnees['id_ws'];
		if($guarry >= $ws3){
				$ws3=$guarry;
		}
	}
}
$reponsews4 = $bdd->query('SELECT * From weapon_skill');
while ($donnees=$reponsews4->fetch()){
	if($donnees['weapon_name']==$_POST['weapon_name4'] && $donnees['attack']==$_POST['attack4'] && $donnees['parad']==$_POST['parad4'] && $donnees['damage']==$_POST['damage4']){
		$guarry=$donnees['id_ws'];
		if($guarry >= $ws4){
				$ws4=$guarry;
		}
	}
}
$reponsews5 = $bdd->query('SELECT * From weapon_skill');
while ($donnees=$reponsews5->fetch()){
	if($donnees['weapon_name']==$_POST['weapon_name5'] && $donnees['attack']==$_POST['attack5'] && $donnees['parad']==$_POST['parad5'] && $donnees['damage']==$_POST['damage5']){
		$guarry=$donnees['id_ws'];
		if($guarry >= $ws5){
				$ws5=$guarry;
		}
	}
}
$reponsews6 = $bdd->query('SELECT * From weapon_skill');
while ($donnees=$reponsews6->fetch()){
	if($donnees['weapon_name']==$_POST['weapon_name6'] && $donnees['attack']==$_POST['attack6'] && $donnees['parad']==$_POST['parad6'] && $donnees['damage']==$_POST['damage6']){
		$guarry=$donnees['id_ws'];
		if($guarry >= $ws6){
				$ws6=$guarry;
		}
	}
}
$reponseho = $bdd->query('SELECT * From home');
while ($donnees=$reponseho->fetch()){
	if($donnees['name']==$_POST['name'] && $donnees['valuable']==$_POST['valuable'] && $donnees['specification']==$_POST['specification'] && $donnees['possesion_of']==$_POST['name_character']){
		$guarry=$donnees['id_ho'];
		if($guarry >= $ho){
				$ho=$guarry;
		}
	}
}


$per = $bdd->prepare('INSERT INTO personage (name_player, name_character, sex, age, eyes_colors, hairs_colors, size, weight, personnal_history, stricking_fack, affliction, elan_point, id_SC1, id_SC2, id_SC3, id_ch, id_cu, id_ho, id_hp, id_sf, id_in, id_kn, id_po, id_sk, id_na, id_ws1, id_ws2, id_ws3, id_ws4, id_ws5, id_ws6) VALUES(:name_player, :name_character, :sex, :age, :eyes_colors, :hairs_colors, :size, :weight, :personnal_history, :stricking_fack, :affliction, :elan_point,  :id_SC1, :id_SC2, :id_SC3, :id_ch, :id_cu, :id_ho, :id_hp, :id_sf, :id_in, :id_kn, :id_po, :id_sk, :id_na, :id_ws1, :id_ws2, :id_ws3, :id_ws4, :id_ws5, :id_ws6)');
$per->execute(array('name_player' => $_POST['name_player'], 
					'name_character' => $_POST['name_character'], 
					'sex' => $_POST['sex'], 
					'age' => $_POST['age'],
					'eyes_colors' => $_POST['eyes_colors'],
					'hairs_colors' => $_POST['hairs_colors'],
					'size' => $_POST['size'],
					'weight' => $_POST['weight'],
					'personnal_history' => $_POST['personnal_history'],
					'stricking_fack' => $_POST['stricking_fack'],
					'affliction' => $_POST['affliction'],
					'elan_point' => $_POST['elan_point'],
					'id_SC1' => $_POST['social_class1'],
					'id_SC2' => $_POST['social_class2'],
					'id_SC3' => $_POST['social_class3'],
					'id_ch' => $ch,
					'id_cu' => $_POST['cult'],
					'id_ho' => $ho,
					'id_hp' => $hp,
					'id_sf' => $sf,
					'id_in' => $in,
					'id_kn' => $kn,
					'id_po' => $po,
					'id_sk' => $sk,
					'id_na' => $_POST['nationality'],
					'id_ws1' =>$ws1,
					'id_ws2' =>$ws2,
					'id_ws3' =>$ws3,
					'id_ws4' =>$ws4,
					'id_ws5' =>$ws5,
					'id_ws6' =>$ws6,
				));
echo '		name_player:'.$_POST['name_player'].
					'		name_character:'.$_POST['name_character']. 
					'		sex:'.$_POST['sex'].
					'		age:'.$_POST['age'].
					'		eyes_colors:'.$_POST['eyes_colors'].
					'		hairs_colors:'.$_POST['hairs_colors'].
					'		size:'.$_POST['size'].
					'		weight:'.$_POST['weight'].
					'		personnal_history:'.$_POST['personnal_history'].
					'		stricking_fack:'.$_POST['stricking_fack'].
					'		affliction:'.$_POST['affliction'].
					'		elan_point:'.$_POST['elan_point'].
					'		id_SC1:'.$_POST['social_class1'].
					'		id_SC2:'.$_POST['social_class2'].
					'		id_SC3:'.$_POST['social_class3'].
					'		id_ch:'.$ch.
					'		id_cu:'.$_POST['cult'].
					'		id_ho:'.$ho.
					'		id_hp:'.$hp.
					'		id_sf:'.$sf.
					'		id_in:'.$in.
					'		id_kn:'.$kn.
					'		id_po:'.$po.
					'		id_sk:'.$sk.
					'		id_na:'.$_POST['nationality'].
					'		id_ws1:'.$ws1.
					'		id_ws2:'.$ws2.
					'		id_ws3:'.$ws3.
					'		id_ws4:'.$ws4.
					'		id_ws5:'.$ws5.
					'		id_ws6:'.$ws6;

?>