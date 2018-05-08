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
            <form action="character_registration_post.php" method="post">
        
                <p>
                        <p1>Personage</p1> </br>
                <label for="name_character">character name</label> : <input type="text" name="name_character" id="name_character" /><br         />
                <label for="name_player">player name</label> :  <input type="text" name="name_player" id="name_player" /><br />
                <label for="sex">sex</label> :
                    <select name="sex">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
            </br>
                <label for="age">age</label> :  <input type="number" name="age" id="age" /><br />
                <label for="eyes_colors">eyes colors</label> :  <input type="text" name="eyes_colors" id="eyes_colors" /><br />
                <label for="hairs_colors">hairs colors</label> :  <input type="text" name="hairs_colors" id="hairs_colors" /><br />
                <label for="size">size</label> :  <input type="number" step="any" name="size" id="size" /><br />
                <label for="weight">weight</label> :  <input type="number" step="any" name="weight" id="weight" /><br /> 
                <label for="personnal_history">personnal history</label> :  <input type="text" name="personnal_history" id="        personnal_history" /><br />
                <label for="stricking_fack">stricking fack</label> :  <input type="text" name="stricking_fack" id="stricking_fack" /><br         />
                <label for="affliction">affliction</label> :  <input type="text" name="affliction" id="affliction" /><br />
                <label for="elan_point">élan point</label> :  <input type="number" name="elan_point" id="elan_point" /><br />
            </br>
                        <p1>Hp</p1> </br>
                <label for="max">max</label> :  <input type="number" name="max" id="max" /><br />
                <label for="Hpcurrently">currently</label> :  <input type="number" name="Hpcurrently" id="Hpcurrently" /><br />
            </br>
                        <p1>Mental health</p1> </br>
                <label for="MHcurrently">currently</label> :  <input type="number" name="MHcurrently" id="MHcurrently" /><br />
                <label for="sft">sft</label> :  <input type="number" name="sft" id="sft" /><br />
            </br>
                        <p1>Characteristic</p1></br>
                <label for="strength">strength</label> :  <input type="number" name="strength" id="strength" /><br />
                <label for="constitution">constitution</label> :  <input type="number" name="constitution" id="constitution" /><br />
                <label for="size">size</label> :  <input type="number" name="size" id="size" /><br />
                <label for="intelligence">intelligence</label> :  <input type="number" name="intelligence" id="intelligence" /><br />
                <label for="power">power</label> :  <input type="number" name="power" id="power" /><br />
                <label for="dexterity">dexterity</label> :  <input type="number" name="dexterity" id="dexterity" /><br />
                <label for="charism">charism</label> :  <input type="number" name="charism" id="charism" /><br />
            </br>
                        <p1>Agility</p1></br>
                <label for="to_climb">to climb</label> :  <input type="number" name="to_climb" id="to_climb" /><br />
                <label for="to_avoid">to avoid</label> :  <input type="number" name="to_avoid" id="to_avoid" /><br />
                <label for="jump">jump</label> :  <input type="number" name="jump" id="jump" /><br />
                <label for="horse_riding">horse riding</label> :  <input type="number" name="horse_riding" id="horse_riding" /><br />
                <label for="swim">swim</label> :  <input type="number" name="swim" id="swim" /><br />
                <label for="trumble">trumble</label> :  <input type="number" name="trumble" id="trumble" /><br />
            </br>
                        <p1>Communication</p1></br>
                <label for="credit">credit</label> :  <input type="number" name="credit" id="credit" /><br />
                <label for="persuade">persuade</label> :  <input type="number" name="persuade" id="persuade" /><br />
                <label for="eloquence">eloquence</label> :  <input type="number" name="eloquence" id="eloquence" /><br />
                <label for="sing">sing riding</label> :  <input type="number" name="sing" id="sing" /><br />
            </br>
                        <p1>Discretion</p1></br>
                <label for="ambush">ambush</label> :  <input type="number" name="ambush" id="ambush" /><br />
                <label for="hide">hide</label> :  <input type="number" name="hide" id="hide" /><br />
                <label for="to_hide">to hide</label> :  <input type="number" name="to_hide" id="to_hide" /><br />
                <label for="silent_movement">silent movement</label> :  <input type="number" name="silent_movement" id="silent_movement"         /><br />
                <label for="cut_a_purse">cut a purse</label> :  <input type="number" name="cut_a_purse" id="cut_a_purse" /><br />
            </br>
                        <p1>Handling</p1></br>
                <label for="juggle">juggle</label> :  <input type="number" name="juggle" id="juggle" /><br />
                <label for="crochet">crochet</label> :  <input type="number" name="crochet" id="crochet" /><br />
                <label for="trick">trick</label> :  <input type="number" name="trick" id="trick" /><br />
                <label for="make_a_knot">make a knot</label> :  <input type="number" name="make_a_knot" id="make_a_knot" /><br />
                <label for="make_a_trap">make a trap</label> :  <input type="number" name="make_a_trap" id="make_a_trap" /><br />
            </br>
                        <p1>Perception</p1></br>
                <label for="balance">balance</label> :  <input type="number" name="balance" id="balance" /><br />
                <label for="listen">listen</label> :  <input type="number" name="listen" id="listen" /><br />
                <label for="feel">feel</label> :  <input type="number" name="feel" id="feel" /><br />
                <label for="look_for">look for</label> :  <input type="number" name="look_for" id="look_for" /><br />
                <label for="see">see</label> :  <input type="number" name="see" id="see" /><br />
                <label for="to_taste">to taste</label> :  <input type="number" name="to_taste" id="to_taste" /><br />
                <label for="track">track</label> :  <input type="number" name="track" id="track" /><br />
            </br>
                        <p1>Skill</p1></br>
                <label for="communication">communication</label> :  <input type="number" name="communication" id="communication" /><br      />
                <label for="handing">handling</label> :  <input type="number" name="handing" id="handing" /><br />
                <label for="perception">perception</label> :  <input type="number" name="perception" id="perception" /><br />
                <label for="agility">agility</label> :  <input type="number" name="agility" id="agility" /><br />
                <label for="discretion">discretion</label> :  <input type="number" name="discretion" id="discretion" /><br />
            </br>
                        <p1>Knowledge</p1></br>
                <label for="evaluate_a_treasure">evaluate a treasure</label> :  <input type="number" name="evaluate_a_treasure" id="        evaluate_a_treasure" /><br />
                <label for="first_aid">first aid</label> :  <input type="number" name="first_aid" id="first_aid" /><br />
                <label for="cartography">cartography</label> :  <input type="number" name="cartography" id="cartography" /><br />
                <label for="memorize">memorize</label> :  <input type="number" name="memorize" id="memorize" /><br />
                <label for="plant_knowledge">plant knowledge</label> :  <input type="number" name="plant_knowledge" id="plant_knowledge"         /><br />
                <label for="poison_knowledge">poison_knowledge</label> :  <input type="number" name="poison_knowledge" id="     poison_knowledge" /><br />
                <label for="craft">craft</label> :  <input type="number" name="craft" id="craft" /><br />
            </br>
                <label for="cult">cult</label> :
                    <select name="cult">
                        <optgroup label="Chaos">
                            <option value="1">Pyaray</option>
                            <option value="2">Arioch</option>
                            <option value="3">Orunlu</option>
                            <option value="4">Chardhros</option>
                            <option value="5">Balo</option>
                            <option value="6">Naryhan</option>
                            <option value="7">Chekalak</option>
                            <option value="8">Xiombarg</option>
                            <option value="9">Mabelrode</option>
                            <option value="10">Hionborn</option>
                            <option value="11">Verhan</option> 
                            <option value="12">Eequor</option>
                            <option value="13">Darnishaan</option>
                            <option value="14">Belan</option>
                            <option value="15">Malut</option>
                            <option value="16">Malchin</option>
                            <option value="17">Zhontra</option>
                            <option value="18">Slotar le vieux</option>
                            <option value="19">Urleh</option>
                            <option value="20">Teer</option>
                        </optgroup>
                        <optgroup label="Low">
                            <option value="21">Donthas</option>
                            <option value="22">Arkyn</option>
                            <option value="23">Goldar</option>
                        </optgroup>
                        <optgroup label="Elementary">
                            <option value="24">Straasha(water)</option>
                            <option value="25">Groma(earth)</option>
                            <option value="26">Lassa(air)</option>
                            <option value="43">Pozz-Mann-Llyrr(air)</option>
                            <option value="27">Kakotal(fire)</option>
                        </optgroup>
                        <optgroup label="Lord of beasts">
                            <option value="28">Nnuuum'c'c'</option>
                            <option value="29">Haaashaastaak</option>
                            <option value="30">Filet</option>
                            <option value="31">Meerclaw</option>
                            <option value="32">Raffdrak</option>
                            <option value="33">Jaanumaarch</option>
                            <option value="34">p!p!pp'hhhh'p't</option>
                            <option value="35">Skweeeeeee</option>
                            <option value="36">Uurr-Rzzzrr</option>
                            <option value="37">Mhaabar'mmpa</option>
                            <option value="38">Shwa-shwaa</option>
                            <option value="39">Keheheh</option>
                            <option value="40">Ssss'sss'ssaan</option>
                            <option value="41">Vvwyy'hunnh</option>
                            <option value="42">Muru'ah</option>                
                        </optgroup>
                    </select>
            </br>
                <label for="nationality">nationality</label> :   
                    <select name="nationality">
                        <option value="1">Melnibone</option>
                        <option value="2">Pan Tang</option>
                        <option value="3">Myrrhyn</option>
                        <option value="4">Dharijor</option>
                        <option value="5">Jharkor</option>
                        <option value="6">Shazaar</option>
                        <option value="7">Tarkesh</option>
                        <option value="8">Vilmir</option>
                        <option value="9">Ilmiora</option>
                        <option value="10">Nadsokor</option>
                        <option value="11">Désert des Larmes</option>
                        <option value="12">Eshmir</option>
                        <option value="13">Ile des Cités Pourpres</option>
                        <option value="14">Argimiliar</option>
                        <option value="15">Pikarayd</option>
                        <option value="16">Lormyr</option>
                        <option value="17">Filkhar</option>
                        <option value="18">Oin</option>
                        <option value="19">Yu</option>
                        <option value="20">Org</option>
                    </select>
            </br>
                <label for="social_class1">social class n°1</label> :   
                <select name="social_class1">
                    <option value="1">Null</option>
                    <option value="2">Guerrier</option>
                    <option value="3">Assassin</option>
                    <option value="4">Marchand</option>
                    <option value="5">Négociant</option>
                    <option value="6">Marin</option>
                    <option value="7">Second</option>
                    <option value="8">Capitaine</option>
                    <option value="9">Chasseur</option>
                    <option value="10">Fermier</option>
                    <option value="11">Prêtre</option>
                    <option value="12">Noble</option>
                    <option value="13">Voleur</option>
                    <option value="14">Mendiant</option>
                    <option value="15">Artisan</option>
                </select>
            </br>
                <label for="social_class2">social class n°2</label> :   
                <select name="social_class2">
                    <option value="1">Null</option>
                    <option value="2">Guerrier</option>
                    <option value="3">Assassin</option>
                    <option value="4">Marchand</option>
                    <option value="5">Négociant</option>
                    <option value="6">Marin</option>
                    <option value="7">Second</option>
                    <option value="8">Capitaine</option>
                    <option value="9">Chasseur</option>
                    <option value="10">Fermier</option>
                    <option value="11">Prêtre</option>
                    <option value="12">Noble</option>
                    <option value="13">Voleur</option>
                    <option value="14">Mendiant</option>
                    <option value="15">Artisan</option>
                </select>
            </br>
                <label for="social_class3">social class n°3</label> :   
                <select name="social_class3" >
                    <option value="1">Null</option>
                    <option value="2">Guerrier</option>
                    <option value="3">Assassin</option>
                    <option value="4">Marchand</option>
                    <option value="5">Négociant</option>
                    <option value="6">Marin</option>
                    <option value="7">Second</option>
                    <option value="8">Capitaine</option>
                    <option value="9">Chasseur</option>
                    <option value="10">Fermier</option>
                    <option value="11">Prêtre</option>
                    <option value="12">Noble</option>
                    <option value="13">Voleur</option>
                    <option value="14">Mendiant</option>
                    <option value="15">Artisan</option>
                </select>
            </br>
                            <p1>Language</p1></br>
                <label for="Language_commun">Language commun</label> :  <input type="number" name="laCw" id="laCw" placeholder="write"      /> <input type="number" name="laCr" id="laCr" placeholder="read" /><br />
                <label for="Bas_Melniboneen">Bas Melnibonéen</label> :  <input type="number" name="laBMw" id="laBMw" placeholder="write"         /> <input type="number" name="laBMr" id="laBMr" placeholder="read" /><br />
                <label for="Haut_Melniboneen">Haut Melnibonéen</label> :  <input type="number" name="laHMw" id="laHMw" placeholder="        write" /> <input type="number" name="laHMr" id="laHMr" placeholder="read" /><br />
                <label for="Pande">Pande</label> :  <input type="number" name="laPw" id="laPw" placeholder="write" /> <input type="     number" name="laPr" id="laPr" placeholder="read" /><br />
                <label for="Mabden">Mabden</label> :  <input type="number" name="laMw" id="laMw" placeholder="write" /> <input type="       number" name="laMr" id="laMr" placeholder="read" /><br />
                <label for="Orgien">Orgien</label> :  <input type="number" name="laOw" id="laOw" placeholder="write" /> <input type="       number" name="laOr" id="laOr" placeholder="read" /><br /> 
            </br>
                            <p1>Weapon skill 1</p1></br>
                <label for="weapon_name1">Weapon name</label> :  <input type="text" name="weapon_name1" id="weapon_name1" /><br />
                <label for="attack1">attack</label> :  <input type="number" name="attack1" id="attack1" /><br />
                <label for="parad1">parad</label> :  <input type="number" name="parad1" id="parad1" /><br />
                <label for="damage1">damage</label> :  <input type="text" name="damage1" id="damage1" /><br />
            </br>
                            <p1>Weapon skill 2</p1></br>
                <label for="weapon_name2">Weapon name</label> :  <input type="text" name="weapon_name2" id="weapon_name2" /><br />
                <label for="attack2">attack</label> :  <input type="number" name="attack2" id="attack2" /><br />
                <label for="parad2">parad</label> :  <input type="number" name="parad2" id="parad2" /><br />
                <label for="damage2">damage</label> :  <input type="text" name="damage2" id="damage2" /><br />
            </br>
                            <p1>Weapon skill 3</p1></br>
                <label for="weapon_name3">Weapon name</label> :  <input type="text" name="weapon_name3" id="weapon_name3" /><br />
                <label for="attack3">attack</label> :  <input type="number" name="attack3" id="attack3" /><br />
                <label for="parad3">parad</label> :  <input type="number" name="parad3" id="parad3" /><br />
                <label for="damage3">damage</label> :  <input type="text" name="damage3" id="damage3" /><br />
            </br>
                            <p1>Weapon skill 4</p1></br>
                <label for="weapon_name4">Weapon name</label> :  <input type="text" name="weapon_name4" id="weapon_name4" /><br />
                <label for="attack4">attack</label> :  <input type="number" name="attack4" id="attack4" /><br />
                <label for="parad4">parad</label> :  <input type="number" name="parad4" id="parad4" /><br />
                <label for="damag4">damage</label> :  <input type="text" name="damage4" id="damage4" /><br />
            </br>
                        <p1>Weapon skill 5</p1></br>
                <label for="weapon_name5">Weapon name</label> :  <input type="text" name="weapon_name5" id="weapon_name5" /><br />
                <label for="attack5">attack</label> :  <input type="number" name="attack5" id="attack5" /><br />
                <label for="parad5">parad</label> :  <input type="number" name="parad5" id="parad5" /><br />
                <label for="damage5">damage</label> :  <input type="text" name="damage5" id="damage5" /><br />
            </br>
                        <p1>Weapon skill 6</p1></br>
                <label for="weapon_name6">Weapon name</label> :  <input type="text" name="weapon_name6" id="weapon_name6" /><br />
                <label for="attack6">attack</label> :  <input type="number" name="attack6" id="attack6" /><br />
                <label for="parad6">parad</label> :  <input type="number" name="parad6" id="parad6" /><br />
                <label for="damage6">damage</label> :  <input type="text" name="damage6" id="damage6" /><br />
            </br>
                        <p1>Invocation</p1></br>
                <label for="type">type</label> :  <input type="text" name="type" id="type" /><br />
                <label for="specialization">specialization</label> :  <input type="text" name="specialization" id="specialization" /><br         />
                <label for="description">description</label> :  <input type="text" name="description" id="description" /><br />
                <label for="elan_cost">elan cost</label> :  <input type="number" name="elan_cost" id="elan_cost" /><br />
            </br>
                        <p1>Possession</p1></br>
                <label for="money">money</label> :  <input type="number" name="money" id="money" /><br />
                <label for="debt">debt</label> :  <input type="number" name="debt" id="debt" /><br />
                <label for="weapon">other(weapon/food)</label> :  <input type="text" name="weapon" id="weapon" /><br />
            </br>
                        <p1>Home</p1></br>
                <label for="name">name</label> :  <input type="text" name="name" id="name" /><br />
                <label for="valuable">valuable</label> :  <input type="number" name="valuable" id="valuable" /><br />
                <label for="specification">specification</label> :  <input type="text" name="specification" id="specification" /><br />
            </br>
        
        
                    <input type="submit" value="Envoyer" name="Envoyer">
	       </p>
            </form>
        </article>
    </body>
</html>