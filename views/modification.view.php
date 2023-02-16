<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synthese | Ajout d'activités </title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/menu.css">
    <link rel="stylesheet" href="public/css/navbar.css">
    <link rel="stylesheet" href="public/css/principal.css">
</head>

<body>
    <main class="activite-submit">
        <div class="conteneur-compte">


            <section class="section-activites">
                <form action="plat-modification-submit?id=<?= $plat[0]["id"] ?>" method="POST" enctype="multipart/form-data">
                    <div class="contenu-ajout-employe">
                        <h6>Modifier un plats</h6>
                        <div>
                            <label>
                                <p class="ajout">(facultatif) Photo:</p>
                                <input type="file" name="media">
                            </label>
                        </div>
                        <div>
                            <label>
                                <p class="ajout">Nom du plat: </p>
                                <textarea id="text1" type="name" name="titre"><?= $plat[0]["titre"] ?></textarea>
                            </label>
                        </div>
                        <div>
                            <label>
                                <p class="ajout">Description du plat: </p>
                                <textarea id="text2" type="text" name="description"><?= $plat[0]["description"] ?></textarea>
                            </label>
                        </div>
                        <div>
                            <label>
                                <p class="ajout">Prix: </p>
                                <input type="text" name="prix" value=<?= $plat[0]["prix"] ?>>
                            </label>
                        </div>
                        <div>
                            <label>
                                <p class="ajout">Catégorie: </p>
                                <select name="categorie_id" id="categorie" value=<?= $plat[0]["categorie_id"] ?>>
                                    <?php $estSelectionne = false ?>
                                    <?php foreach ($categories as $categorie) : ?>
                                        <?php if ($categorie['id'] === $plat[0]["categorie_id"]) : ?>
                                            <option selected value=<?= $categorie['id'] ?>><?= $categorie['nom'] ?></option>
                                        <?php else : ?>
                                            <option value=<?= $categorie['id'] ?>><?= $categorie['nom'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <button class="publier" type="submit">Soumettre</button>
                            </label>
                        </div>
                        <a class="retour" href="liste-menu"><button class="bouton-orange">retour</button></a>
                    </div>
                </form>
            </section>

        </div>
    </main>
</body>

</html>