<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=commerce', 'root', 'Dta2018!');

if(isset($_POST['formconnect']))
{
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($mailconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
		$requser->execute(array($mailconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['username'] = $userinfo['mail'];
			header("Location: profil.php?id=".$_SESSION['id']);
            

		}
		else
		{
			$erreur = "Mauvais mail ou mot de passe !";
		}
    }
}
else
{
	$erreur = "Tous les champs doivent être complétées !";
}


?>
<html>
	<head>
		<title>Connexion</title>
		<meta charset="utf-8">
	</head>
	<body>
		<nav  id="header" class="fixed-top navbar navbar-light bg-faded navbar-static-top navbar-expand moodle-has-zindex">

     <div class="container navbar-nav">


        <div data-region="drawer-toggle" class="d-inline-block mr-3">
            <button aria-expanded="false" aria-controls="nav-drawer" type="button" class="btn nav-link float-sm-left mr-1 btn-secondary" data-action="toggle-drawer" data-side="left" data-preference="drawer-open-nav"><i class="icon fa fa-bars fa-fw " aria-hidden="true"  aria-label=""></i><span class="sr-only">Panneau latéral</span>
            <span aria-hidden="true"> </span>
            <span aria-hidden="true"> </span>
            <span aria-hidden="true"> </span>

            </button>

            <nav class="nav navbar-nav hidden-md-down address-head">
                    <span><i class="fa fa-phone"></i>Call us : +33 (0)4 77 91 58 88</span>
                    <span><i class="fa fa-envelope-o"></i>E-mail : <a href="mailto:contact@telecom-st-etienne.fr">contact@telecom-st-etienne.fr</a></span>
            </nav>

        </div>



        <ul class="nav navbar-nav ml-auto">
            <div class="d-none d-lg-block">

            </div>
            <!-- navbar_plugin_output -->
            <li class="nav-item">

            </li>
            <!-- user_menu -->
            <li class="nav-item d-flex align-items-center">
                <div class="usermenu"><span class="login">Non connecté.</span></div>
            </li>
        </ul>
        <!-- search_box -->


    </div>
</nav>


<div class="header-main">
    <div class="container">
	<nav class="navbar navbar-light bg-faded">
        <a href="" class="navbar-brand has-logo
            ">
            <span class="logo">
                <img src="https://mootse.telecom-st-etienne.fr/pluginfile.php/1/theme_academi/logo/1546523126/telecom_logo_quadri_longueur.png" alt="Mootse">
            </span>
        </a>

    	<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>

    	<div class="collapse navbar-toggleable-md" id="navbarResponsive">

            <div class="infoarea ">

                <!-- custom_menu -->
                <li class="dropdown nav-item">
    <a class="dropdown-toggle nav-link" id="drop-down-5c90b59feefa55c90b59febd816" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
        Français ‎(fr)‎
    </a>
    <div class="dropdown-menu" aria-labelledby="drop-down-5c90b59feefa55c90b59febd816">
                <a class="dropdown-item" href="" title="English ‎(en)‎">English ‎(en)‎</a>
                <a class="dropdown-item" href="" title="Français ‎(fr)‎">Français ‎(fr)‎</a>
    </div>
</li>
                <!-- page_heading_menu -->

            </div>

        </div>
    </nav>
    </div>
</div><!DOCTYPE html>

<html  dir="ltr" lang="fr" xml:lang="fr">
<head>
    <title>MOOTSE : le Moodle de Télécom Saint-Etienne: Se connecter sur le site</title>
    <link rel="shortcut icon" href="https://mootse.telecom-st-etienne.fr/theme/image.php/academi/theme/1546523126/favicon" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="moodle, MOOTSE : le Moodle de Télécom Saint-Etienne: Se connecter sur le site" />
<link rel="stylesheet" type="text/css" href="https://mootse.telecom-st-etienne.fr/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple-min.css" /><script id="firstthemesheet" type="text/css">/** Required in order to fix style inclusion problems in IE with YUI **/</script><link rel="stylesheet" type="text/css" href="https://mootse.telecom-st-etienne.fr/theme/styles.php/academi/1546523126_1/all" />
<script type="text/javascript">
//<![CDATA[

//]]>
</script>

<meta name="robots" content="noindex" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body  id="page-login-index" class="format-site  path-login safari dir-ltr lang-fr yui-skin-sam yui3-skin-sam pagelayout-login course-1 context-1 notloggedin ">

<div id="page-wrapper">

    <div>
    <a class="sr-only sr-only-focusable" href="#maincontent">Passer au contenu principal</a>
</div><script type="text/javascript" src="https://mootse.telecom-st-etienne.fr/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple-min.js"></script><script type="text/javascript" src="https://mootse.telecom-st-etienne.fr/theme/jquery.php/core/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://mootse.telecom-st-etienne.fr/lib/javascript.php/1546523126/lib/javascript-static.js"></script>
<script type="text/javascript">
//<![CDATA[
document.body.className += ' jsenabled';
//]]>
</script>



    <div id="page" class="container-fluid mt-0">
        <div id="page-content" class="row">
            <div id="region-main-box" class="col-12">
                <section id="region-main" class="col-12">
                    <span class="notifications" id="user-notifications"></span>
                    <div role="main"><span id="maincontent"></span><div class="my-1 my-sm-5"></div>
<div class="row justify-content-center">
<div class="col-xl-6 col-sm-8 ">
<div class="card">
    <div class="card-block">
            <h2 class="card-header text-center" ><img src="https://mootse.telecom-st-etienne.fr/pluginfile.php/1/core_admin/logo/0x200/1546523126/telecom_logo_quadri_longueur.png" title="MOOTSE : le Moodle de Télécom Saint-Etienne" alt="MOOTSE : le Moodle de Télécom Saint-Etienne"/></h2>
        <div class="card-body">


            <div class="row justify-content-md-center">
                <div class="col-md-5">
                   <form method="POST" action="connexion.php">
				<input type="username" name="mailconnect" placeholder="username" />
				<input type="password" name="mdpconnect" placeholder="Mot de Passe" />
				<input type="submit" name="formconnect" value="Se Connecter !" />
			</form>
                </div>

                <div class="col-md-5">
                    <div class="forgetpass mt-3">
                        <p><a href="">Vous avez oublié votre nom d'utilisateur et/ou votre mot de passe ?</a></p>
                    </div>

                    <div class="mt-3">
                        Votre navigateur doit supporter les cookies
                        <a class="btn btn-link p-0" role="button"
    data-container="body" data-toggle="popover"
    data-placement="right" data-content="&lt;div class=&quot;no-overflow&quot;&gt;&lt;p&gt;Ce site utilise deux cookies.&lt;/p&gt;

&lt;p&gt;Un cookie (essentiel) est utilisé pour la session de travail. Il est habituellement appelé &lt;strong&gt;MoodleSession&lt;/strong&gt;. Vous devez autoriser son utilisation par le navigateur pour pouvoir ouvrir de nouvelles fenêtres sans avoir à vous reconnecter chaque fois. Le cookie est effacé lorsque vous vous déconnectez ou si vous quittez le navigateur.&lt;/p&gt;

&lt;p&gt;L&#039;autre cookie n&#039;est pas essentiel, mais rend la connexion à Moodle plus facile en mémorisant votre nom d&#039;utilisateur dans le navigateur. Vous n&#039;aurez donc pas à remplir ce champ lors de la prochaine visite. Il porte habituellement le nom &lt;strong&gt;MOODLEID&lt;/strong&gt;. Il n&#039;y a toutefois pas de problème à refuser ce cookie.&lt;/p&gt;
&lt;/div&gt; "
    data-html="true" tabindex="0" data-trigger="focus">
  <i class="icon fa fa-question-circle text-info fa-fw " aria-hidden="true" title="Aide sur Votre navigateur doit supporter les cookies" aria-label="Aide sur Votre navigateur doit supporter les cookies"></i>
</a>
                    </div>
                        <div class="mt-2">
                            <p>Des cours peuvent être accessibles aux visiteurs anonymes</p>
                            <form action="" method="post" id="guestlogin">
                                <input type="hidden" name="username" value="guest" />
                                <input type="hidden" name="password" value="guest" />
                                <button class="btn btn-secondary btn-block" type="submit">Connexion anonyme</button>
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div></div>

                </section>
            </div>
        </div>
    </div>
</div><div id="nav-drawer" data-region="drawer" class="d-print-none moodle-has-zindex closed" aria-hidden="true" tabindex="-1">
    <nav class="list-group">
        <a class="list-group-item list-group-item-action " href="" data-key="home" data-isexpandable="0" data-indent="0" data-showdivider="0" data-type="1" data-nodetype="1" data-collapse="0" data-forceopen="1" data-isactive="0" data-hidden="0" data-preceedwithhr="0" >
            <div class="m-l-0">
                <div class="media">
                    <span class="media-left">
                        <i class="icon fa fa-home fa-fw " aria-hidden="true"  aria-label=""></i>
                    </span>
                    <span class="media-body ">Accueil</span>
                </div>
            </div>
        </a>
    </nav>
</div><footer id="page-footer" class="py-3 bg-dark text-light">
<div id="footer">
    <div class="footer-main">
    <div class="container">
    <div id="course-footer"></div>
        <div class="row">
        <div class="col-md-5">
            <div class="infoarea">
            <div class="footer-logo">
                <a href="#"><img src="//mootse.telecom-st-etienne.fr/pluginfile.php/1/theme_academi/logo/1546523126/telecom_logo_quadri_longueur.png" width="100" height="100" alt="Academi"></a>
            </div>

          </div>
        </div>


        <div class="col-md-4">
          <div class="contact-info">
            <h2 class="nopadding">Contact us</h2>

             <p>25 rue du Dr Remy Annino 42000 Saint-Etienne, FR<br>
              <i class="fa fa-phone-square"></i> Phone : +33 (0)4 77 91 58 88<br>
              <i class="fa fa-envelope"></i> E-mail : <a class="mail-link" href="mailto:contact@telecom-st-etienne.fr">contact@telecom-st-etienne.fr</a><br>
            </p>

          </div>
          <div class="social-media">
            <h6>Follow us</h6>
            <ul>
                <li class="smedia-01"><a href="https://www.facebook.com/telecomsaintetienne"><i class="fa fa-facebook-square"></i></a></li>
                <li class="smedia-03"><a href="https://twitter.com/TelecomStE"><i class="fa fa-twitter-square"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="footer-bootom">
        <p>Copyright &copy; 2018 - Developed by <a href="http://lmsace.com">LMSACE.com</a>. Powered by <a href="https://moodle.org">Moodle</a></p>
    </div>

    <nav class="nav navbar-nav d-md-none">
            <ul class="list-unstyled pt-3">
                                <li><a href="#" title="Langue">Français ‎(fr)‎</a></li>
                            <li>
                                <ul class="list-unstyled ml-3">
                                                    <li><a href="" title="English ‎(en)‎">English ‎(en)‎</a></li>
                                                    <li><a href="" title="Français ‎(fr)‎">Français ‎(fr)‎</a></li>
                                </ul>
                            </li>
            </ul>
    </nav>
  </div>

  </footer>
<!--E.O.Footer-->

<footer>
<a href="https://download.moodle.org/mobile?version=2018051701.01&amp;lang=fr&amp;iosappid=633359593&amp;androidappid=com.moodle.moodlemobile">Obtenir l'app mobile</a>
</footer>


	</body>

</html>