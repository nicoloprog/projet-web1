<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Synthèse | Connexion</title>
	<link rel="stylesheet" href="public/css/admin.css">
	<link rel="stylesheet" href="public/css/menu.css">
	<link rel="stylesheet" href="public/css/navbar.css">
	<link rel="stylesheet" href="public/css/principal.css">
</head>

<body>
	<header>
		<div class="entete-nav">
			<img src="public/images/logo.png" width="235px" height="134px" alt="logo" class="img-navbar">
			<nav>
				<div class="mini-contact">
					<div class="liens-contact">
						<div class="logo-contact">
							<img src="public/images/phone-icon.png" width="30px" height="30px" />
							<a href="callto:+14504361531">450 436-1531</a>
						</div>
						<div class="logo-contact">
							<img class="margin-top-fix" src="public/images/email-icon.png" width="30px" height="30px" />
							<a href="mailto:info@pubg4.com">info@pubg4.com</a>
						</div>
					</div>
					<div class="socials">
						<a href="https://facebook.com" target='_blank'>
							<img src="public/images/facebook-icon.png" width="32px" height="32px">
						</a>
						<a href="https://instagram.com" target='_blank'>
							<img src="public/images/instagram-icon.png" width="32px" height="32px">
						</a>
						<a href="https://twitter.com" target='_blank'>
							<img src="public/images/twitter-icon.png" width="32px" height="32px">
						</a>
					</div>
				</div>
				<div class="entete">
					<div class="liens-nav">
						<a href="index"><u>Accueil</u></a>
						<a href="menu-principal">Menu</a>
						<a href="#2">À propos</a>
						<a href="#3">Contact</a>
					</div>
					<a href="connexion">
						<button>Connexion</button>
					</a>
				</div>
				<?php if (isset($_GET["success"])) : ?>
					<p class="success">Votre compte a été ajouté à l'infolettre</p>
				<?php endif; ?>
			</nav>

		</div>
	</header>

	<main>
		<!-- ENTETE -->
		<div class="bienvenue conteneur">
			<div class="circle-border circle1"></div>
			<div class="circle-border circle2"></div>
			<div class="circle-border circle3"></div>
			<div class="texte-accueil">
				<h3>Bienvenue sur notre site web</h3>
				<p>
					Vous cherchez un restaurant au service rapide sans sacrifier la qualité&nbsp?
					Nous servont un large éventail de plats, y compris notre spécialité le tartare, sans faire de compromis sur la qualité.
					Le pub G4 est fière de vous présenter son tous nouveau menu interactif.
				</p>
				<div class="bouton-accueil">
					<a href="menu-principal">
						<button class="bouton-orange">Menu</button>
					</a>
					<a href="callto:+14504361531">
						<button><img src="public/images/phone-icon.png" width="19px" height="19px" /> Réservez </button>
					</a>
				</div>
			</div>
			<div class="image-accueil">
				<img src="public/images/restaurant.png" alt="" width="650px" height="610px">
			</div>
		</div>

		<!-- NOS CRÉATIONS -->
		<section id="1" class="accueil-decouverte">
			<div class="conteneur">
				<h3 class="categorie-header categorie-header-noir no-margin-bottom">Nos créations</h3>
				<p class="decouverte-description">
					La salle à manger et toute l'équipe sont prêtes et heureuses de vous recevoir.<br> Un service professionnel et chaleureux sauront rendre votre expérience mémorable.
				<p>
				<div class="grid">
					<?php foreach ($plats_creations as $creation) : ?>
						<div class="carte-plat">
							<?php if ($creation["media"]) : ?>
								<div class='image-wrapper'>
									<img src="<?= $creation["media"] ?>" alt="dessert" width="298" height="225" class="image-plat">
								</div>
							<?php endif; ?>
							<h4 class="titre"><?= $creation["titre"] ?></h4>
							<p class="description"><?= $creation["description"] ?></p>
							<span class="prix"><?= $creation["prix"] ?>$</span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<!-- A PROPOS DE NOUS -->
		<section id="2" class="a-propos">
			<div class="conteneur">
				<h3 class="categorie-header categorie-header-noir no-margin-bottom">À propos de nous</h3>
				<div class="contenu-apropos">
					<div class="gauche-apropos">
						<img src="public/images/chef.png" alt="" width="588px" height="675px">
					</div>
					<div class="droite-apropos">
						<div class="description-apropos">
							<p>Le restaurant Pub G4 est le lieu par excellence pour les amateurs de viandes et de tartare. Avec ses assiettes excentriques et ses portions généreuses, son ambiance festive et son service hors pair, Le Pub G4 est une expérience bien plus que culinaire !</p>
						</div>
						<hr>
						<div class="points-apropos">
							<div class="points-apropos1">
								<p><img src="public/images/check.png" alt="" width="15px" height="15px"> Une tablée gourmande sous les reines d'un chef passionné</p>
								<p><img src="public/images/check.png" alt="" width="15px" height="15px"> Des produits premiums méticuleusement choisis et préparés sous vos yeux par notre personnel attentioné</p>
								<p><img src="public/images/check.png" alt="" width="15px" height="15px"> Une équipe compétente, dévouée à l’excellence</p>
							</div>
							<div class="points-apropos2">
								<p><img src="public/images/check.png" alt="" width="15px" height="15px"> Obtenez des cocktails et drinks aussi raffinés qu’originaux</p>
								<p><img src="public/images/check.png" alt="" width="15px" height="15px"> Une ambiance festive et colorée, ce qui veux dire le meilleur endroit pour venir regarder le sport</p>
								<p><img src="public/images/check.png" alt="" width="15px" height="15px"> Une expérience gastronomique incroyable</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- SATISFACTION CLIENT -->
		<section class="satisfaction-client">
			<div class="conteneur">
				<div class="satisfaction-wrapper">
					<h3 class="categorie-header categorie-header-noir no-margin-bottom">Satisfaction Client</h3>
					<p class="decouverte-description">
						Nos clients adorent l'expérience restaurant. Nous croyons que les gens ne peuvent être vraiment heureux à l'extérieur qu'après avoir atteint le bonheur à l'intérieur de leurs estomacs.
					<p>
					<div class="bulle bulle4"></div>
					<div class="bulle bulle2"></div>
					<div class="bulle bulle1"></div>
					<div class="bulle bulle3"></div>
				</div>
			</div>

			<!-- INFOLETTRE -->
			<div id="7" class="infolettre">
				<!-- <img src="public/images/restaurant2.png" width="100%" height="407px"> -->
				<h3>
					Découvrez les nouveautés au menu en vous abonnant à notre infolettre
				</h3>
				<form action="infolettre-submit" method="POST">
					<input name="nom" placeholder="Nom" />
					<input name="courriel" placeholder="Courriel" />
					<button class="bouton-orange">Abonnez-vous</button>
				</form>
				<?php if (isset($_GET["success"])) : ?>
					<p class="success">Votre compte a été ajouté à l'infolettre</p>
				<?php endif; ?>
			</div>
		</section>

		<!-- CONTACT -->
		<section id="3" class="contact">
			<div class="conteneur flex-conteneur">
				<div class="texte-contact">
					<h3>Contact</h3>
					<p>Lundi - Vendredi <br>
						8:00 am à 9:00 pm<br>
						<br>
						Samedi - Dimanche<br>
						8:30 am à 10:00pm
					</p>
					<p><strong>Téléphone: </strong>450 436-1531</p>
					<p><strong>Adresse:</strong> 297, rue St-Georges, Saint-Jérôme (Québec), J7Z 5A2</p>
				</div>
				<div class="map">
					<div class="mapouter">
						<div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=650&amp;height=450&amp;hl=en&amp;q=297, rue St-Georges, Saint-Jérôme (Québec), J7Z 5A2&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://formatjson.org/word-counter">Word Counter</a></div>
					</div>
				</div>
			</div>
		</section>

		<!-- FOOTER -->
		<section class="footer-principal">
			<div class="conteneur">
				<div class="footer-contenu">
					<div class="footer-logo">
						<img src="public/images/logo.png" width="399px" height="198px" alt="logo" class="">
					</div>
					<div class="footer-nav">
						<h3>Navigation</h3>
						<p><a href="index">Accueil</a></p>
						<p><a href="menu-principal">Menu</a></p>
						<p><a href="#2">À propos</a></p>
						<p><a href="#3">Contact</a></p>
					</div>
					<div class="footer-categorie">
						<h3>Catégorie</h3>
						<p><a href="menu-principal#4">Entrées</a></p>
						<p><a href="menu-principal#5">Plats principaux</a></p>
						<p><a href="menu-principal#6">Désserts</a></p>
						<p><a href="index#1">Découverte</a></p>
					</div>
					<div class="footer-social">
						<h3>Suivez-nous</h3>
						<p><a href="https://facebook.com" target='_blank'>
								<img src="public/images/facebook-icon.png" width="32px" height="32px">
							</a>
							<a href="https://instagram.com" target='_blank'>
								<img src="public/images/instagram-icon.png" width="32px" height="32px">
							</a>
							<a href="https://twitter.com" target='_blank'>
								<img src="public/images/twitter-icon.png" width="32px" height="32px">
							</a>
						</p>
						<p>
							<a href="connexion">
								<button>Connexion</button>
							</a>
						</p>
					</div>
				</div>
		</section>
	</main>
	<script type="module" src="public/scripts/LireJson.js"></script>
</body>

</html>