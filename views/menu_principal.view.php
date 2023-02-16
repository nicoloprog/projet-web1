<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synthèse | Fil d'activités</title>
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
                        <a href="index#2">À propos</a>
                        <a href="index#3">Contact</a>
                    </div>
                    <a href="connexion">
                        <button>Connexion</button>
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <main class="conteneur">
        <hr style="margin: 0">
        <div class="entete-menuprincipal">
            <h2>Menu</h2>
            <h5>Restaurant</h5>
        </div>

        <!-- ENTRÉES -->
        <section id="4">
            <h3 class="categorie-header">Entrées</h3>
            <div class="grid">
                <?php foreach ($entrees as $entree) : ?>
                    <div class="carte-plat">
                        <?php if ($entree["media"]) : ?>
                            <div class='image-wrapper'>
                                <img src="<?= $entree["media"] ?>" alt="entree" width="298" height="225" class="image-plat">
                            </div>
                        <?php endif; ?>
                        <h4 class="titre"><?= $entree["titre"] ?></h4>
                        <p class="description"><?= $entree["description"] ?></p>
                        <span class="prix"><?= $entree["prix"] ?>$</span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- PLATS PRINCIPAUX -->
        <section id="5">
            <h3 class="categorie-header">Plats Principaux</h3>
            <div class="grid">
                <?php foreach ($plats_principaux as $plat) : ?>
                    <div class="carte-plat">
                        <?php if ($plat["media"]) : ?>
                            <div class='image-wrapper'>
                                <img src="<?= $plat["media"] ?>" alt="plat" width="298" height="225" class="image-plat">
                            </div>
                        <?php endif; ?>
                        <h4 class="titre"><?= $plat["titre"] ?></h4>
                        <p class="description"><?= $plat["description"] ?></p>
                        <span class="prix"><?= $plat["prix"] ?>$</span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- DÉSSERTS -->
        <section id="6">
            <h3 class="categorie-header">Désserts</h3>
            <div class="grid">
                <?php foreach ($desserts as $dessert) : ?>
                    <div class="carte-plat">
                        <?php if ($dessert["media"]) : ?>
                            <div class='image-wrapper'>
                                <img src="<?= $dessert["media"] ?>" alt="dessert" width="298" height="225" class="image-plat">
                            </div>
                        <?php endif; ?>
                        <h4 class="titre"><?= $dessert["titre"] ?></h4>
                        <p class="description"><?= $dessert["description"] ?></p>
                        <span class="prix"><?= $dessert["prix"] ?>$</span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

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
                    <p><a href="index#2">À propos</a></p>
                    <p><a href="index#3">Contact</a></p>
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
</body>

</html>