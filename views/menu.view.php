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
    <main class="conteneur">
        <h6>Liste de plats</h6>
        <a class="retour" href="fil-activites"><button>retour</button></a>
        </p>
        <section class="ajout-activite-section">
            <a class="ajout_activite" href="activite-creation"><button class="bouton-orange">Ajouter un plat</button></a>
        </section>
        <hr>
        <section class="activites">
            <?php foreach ($plats as $plat) : ?>
                <div class="contenu-employe">
                    <a style="flex-grow: 1; flex-basis: 50px" class="supprime" href="suppression?id=<?= $plat["id"] ?>">
                        🚫
                    </a>
                    <a style="flex-grow: 1; flex-basis: 50px" class="modifie" href="plat-modification?id=<?= $plat["id"] ?>">
                        ✎
                    </a>
                    <?php if ($plat["media"]) : ?>
                        <div style="flex-grow: 4; flex-basis: 250px">
                            <img class="activite" src="<?= $plat["media"] ?>" style="width: 250px;" alt="">
                        </div>
                    <?php endif; ?>
                    <h4 style="flex-grow: 2; flex-basis: 100px"><?= $plat["titre"] ?></h4>
                    <p style="flex-grow: 4; flex-basis: 200px"><?= $plat["description"] ?></p>
                    <p style="flex-grow: 2; flex-basis: 100px">Prix: <?= $plat["prix"] ?>$</p>
                    <p style="flex-grow: 2; flex-basis: 100px">Catégorie: <?= $plat["categorie_nom"] ?></p>
                </div>
                <hr>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>