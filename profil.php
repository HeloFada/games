<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=commerce', 'root', 'Dta2018!');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
}
?>


<!DOCTYPE html>
<html dir="ltr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <title>Agenda &laquo; Intranet TSE</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/tse.png" />
  
    <!-- combine_css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" href="css/tribal-timetable.css"/>
    <link rel="stylesheet" href="css/add2home.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
	
  
    <script type="text/javascript" src="js/json2.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.ba-resize.js"></script> 
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/underscore.min.js"></script>
    <script type="text/javascript" src="js/underscore-tpl-loader.js"></script>
    <script type="text/javascript" src="js/Core.js"></script>
    <script type="text/javascript" src="js/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="js/bootstrap-collapse.js"></script>
    <script type="text/javascript" src="js/tribal.js"></script>
    <script type="text/javascript" src="js/tribal-shared.js"></script>
    <script type="text/javascript" src="js/tribal-timetable.js"></script>
    <script type="application/javascript" src="js/add2home.js"></script>
    <script type="application/javascript" src="js/bootstrap-select.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script><!-- Compatibilité IE8 et inférieurs -->
    <script type="text/javascript" src="js/hautpage_V2.js"></script> 

    
    <script type="text/javascript">
		(function(document,navigator,standalone) 
        {
			if ((standalone in navigator) && navigator[standalone]  ) {  
			var curnode, location=document.location, stop=/^(a|html)$/i;
			document.addEventListener('click', function(e) {
			curnode=e.target;
			while (!(stop).test(curnode.nodeName)) {
			curnode=curnode.parentNode;
			}
		if('href' in curnode && ( curnode.href.indexOf('http') || ~curnode.href.indexOf(location.host) ) ) {
			e.preventDefault();
			location.href = curnode.href;
			}
		},false);
		}
		})(document,window.navigator,'standalone');
    </script>
</head>

<body>
<div id="loader">
    Chargement
  <span class="dot1"></span><span class="dot2"></span><span class="dot3"></span>
</div>

<div id="wrap">
    <header class="page-header">
        <div class="container">
                            <a href="https://www.telecom-st-etienne.fr/intranet/" class="btn btn-danger pull-right">
                    <span class="glyphicon glyphicon-home"></span> <span class="visible-lg-inline visible-md-inline">Accueil</span>
                </a>
                            <a href="http://www.telecom-st-etienne.fr/"><div class="logo"></div></a>
            <h2>Intranet<small>Agenda</small></h2>
        </div>
    </header>

    <div class="container">

    <noscript>
        <div class="alert alert-danger"><strong>Merci d'activer JavaScript dans votre navigateur pour utiliser le portail des relations industrielles.</strong></div>
    </noscript><!-- Bandeau semaine -->
<div class="btn-toolbar semaine">
    <div class="btn-group" style="margin-left: 0;">
        <a href='edtetud.php?sem=11&annee=2019' class='btn btn-danger sem'><<</a>        
        <div class="btn-group" style="margin-left: 0;">
            <form action="edtetud.php" methode="GET">
                <select class='selectpicker' data-style='btn-danger' data-size='5' onchange='this.form.submit()' name='sem'><option value='32' >Semaine 32</option><option value='33' >Semaine 33</option><option value='34' >Semaine 34</option><option value='35' >Semaine 35</option><option value='36' >Semaine 36</option><option value='37' >Semaine 37</option><option value='38' >Semaine 38</option><option value='39' >Semaine 39</option><option value='40' >Semaine 40</option><option value='41' >Semaine 41</option><option value='42' >Semaine 42</option><option value='43' >Semaine 43</option><option value='44' >Semaine 44</option><option value='45' >Semaine 45</option><option value='46' >Semaine 46</option><option value='47' >Semaine 47</option><option value='48' >Semaine 48</option><option value='49' >Semaine 49</option><option value='50' >Semaine 50</option><option value='51' >Semaine 51</option><option value='52' >Semaine 52</option><option value='1' >Semaine 1</option><option value='2' >Semaine 2</option><option value='3' >Semaine 3</option><option value='4' >Semaine 4</option><option value='5' >Semaine 5</option><option value='6' >Semaine 6</option><option value='7' >Semaine 7</option><option value='8' >Semaine 8</option><option value='9' >Semaine 9</option><option value='10' >Semaine 10</option><option value='11' >Semaine 11</option><option value='12' selected >Semaine 12</option><option value='13' >Semaine 13</option><option value='14' >Semaine 14</option><option value='15' >Semaine 15</option><option value='16' >Semaine 16</option><option value='17' >Semaine 17</option><option value='18' >Semaine 18</option><option value='19' >Semaine 19</option><option value='20' >Semaine 20</option><option value='21' >Semaine 21</option><option value='22' >Semaine 22</option><option value='23' >Semaine 23</option><option value='24' >Semaine 24</option><option value='25' >Semaine 25</option><option value='26' >Semaine 26</option><option value='27' >Semaine 27</option><option value='28' >Semaine 28</option><option value='29' >Semaine 29</option><option value='30' >Semaine 30</option><option value='31' >Semaine 31</option>                </select>  
            </form> 
        </div>

        <a href='edtetud.php?sem=13&annee=2019' class='btn btn-danger sem'>>></a>    </div>
</div><br>
      
<!-- Affichage emploi du temps -->     
<div class="container">
    Emploi du temps de théo.tse1<br/>Du Lundi 18 Mars 2019 au Dimanche 24 Mars 2019<br><br>    
		
    <!-- recupération des données -->
    <div class="timetable" data-days="7" data-hours="12">
		<ul class="tt-events">
			<li class='tt-event btn-info' data-id='0' data-day='0' data-start='1.5' data-duration='2'>TD Synthèse d’Image <br>9h30 - 11h30<br>SALLE Newsplex</li><li class='tt-event btn-info' data-id='2' data-day='0' data-start='3.5' data-duration='1.5'>Rendez-vous à l’Administration<br>11h30 - 12h00<br></li><li class='tt-event btn-info' data-id='0' data-day='0' data-start='5.5' data-duration='1'>Réunion avec les associations<br>13h30 - 14h30<br></li><li class='tt-event btn-info' data-id='4' data-day='0' data-start='6.5' data-duration='0.5'>Pause au Foyer<br>14h30 - 15h00<br></li><li class='tt-event btn-info' data-id='5' data-day='0' data-start='7' data-duration='3'>TD Théorie des organisations en Bat A<br>15h00 - 18h00<br></li></ul>
            
        <div class="tt-times">
            <div class="tt-time" data-time="0">
                08<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="1">
                09<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="2">
                10<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="3">
                11<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="4">
                12<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="5">
                13<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="6">
                14<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="7">
                15<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="8">
                16<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="9">
                17<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="10">
                18<span class="hidden-phone">.00</span></div>
            <div class="tt-time" data-time="11">
                19<span class="hidden-phone">.00</span></div>          
        </div>
        <div class="tt-days">
            <div class="tt-day" data-day="0">
                L<span class="hidden-phone">un 18 Mars</span></div>
            <div class="tt-day" data-day="1">
                M<span class="hidden-phone">ar 19 Mars</span></div>
            <div class="tt-day" data-day="2">
                M<span class="hidden-phone">er 20 Mars</span></div>
            <div class="tt-day" data-day="3">
                J<span class="hidden-phone">eu 21 Mars</span></div>
            <div class="tt-day" data-day="4">
                V<span class="hidden-phone">en 22 Mars</span></div>
            <div class="tt-day" data-day="5">
                S<span class="hidden-phone">am 23 Mars</span></div>  
            <div class="tt-day" data-day="6">
                D<span class="hidden-phone">im 24 Mars</span></div>                     
        </div>
    </div>
    <form  method="get" action="abonnement.php">
        <input type="submit" class="btn btn-warning pull-right btn-sm" value="Abonnement ICS">
    </form>
</div>
    
<!-- Fin de la page -->


  </div> <!-- .container -->
</div> <!-- #wrap -->


<footer class="page-footer">
  <div class="container">
  
      Connecté en tant que <b>théo.tse1</b>
      (<a href="https://www.telecom-st-etienne.fr/intranet/?action=logout">déconnexion</a>)
      <br>
  © 2019 Télécom Saint-Etienne
  </div>
</footer>

<!-- ascenseur -->
<a class="backtotop">
  <img src="images/retour_haut.png" alt="Retour haut de page">
</a>


<!-- combine_script -->
<!-- footer_script -->

</body>

</html>
