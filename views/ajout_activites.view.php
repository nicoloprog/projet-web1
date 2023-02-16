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
        <div class="conteneur">
            <div class="conteneur-compte">
                <section class="section-activites">

                    <?php if (isset($_GET["erreur"])) : ?>
                        <p class="erreur">Une erreur est survenue</p>
                    <?php endif; ?>

                    <?php if (isset($_GET["succes"])) : ?>
                        <p>La publication a été ajoutée!</p>
                    <?php endif; ?>

                    <form action="activite-submit" method="POST" enctype="multipart/form-data">
                        <div class="contenu-ajout-employe">
                            <h6>Ajouter un plat à votre liste</h6>
                            <div>
                                <label>
                                    <p class="ajout">(facultatif) Photo:</p>
                                    <input type="file" name="media">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <p class="ajout">Nommé le plat: </p>
                                    <input type="text" name="titre" autofocus>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <p class="ajout">Description: </p>
                                    <textarea type="text" name="description"></textarea>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <p class="ajout">Prix: </p>
                                    <input type="float" name="prix">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <p class="ajout">Catégorie: </p>
                                    <select name="categorie_id" id="categorie">
                                        <?php foreach ($categories as $categorie) : ?>
                                            <option value=<?= $categorie['id'] ?>><?= $categorie['nom'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button class="creer" type="submit">Soumettre</button>
                                </label>
                            </div>
                        </div>
                    </form>
                    <a href="liste-menu"><button class="bouton-orange">retour</button></a>
                </section>
            </div>
        </div>
    </main>
</body>

</html>