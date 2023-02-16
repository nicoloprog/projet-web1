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
    <main class="conteneur">
        <div class="conteneur-compte">
            <div class="contenu-employe">
                <section class="section-activites">
                    <form action="utilisateur-modification-submit?id=<?= $utilisateur["id"] ?>" method="POST" enctype="multipart/form-data">
                        <div class="contenu-ajout-employe">
                            <h6>Modifier un employé</h6>
                            <div>
                                <label>
                                    <p class="ajout">Prenom: </p>
                                    <input type="text" name="prenom" autofocus value=<?= $utilisateur["prenom"] ?>>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <p class="ajout">Nom: </p>
                                    <input type="text" name="nom" value=<?= $utilisateur["nom"] ?>>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <p class="ajout">Courriel: </p>
                                    <input type="text" name="courriel" value=<?= $utilisateur["courriel"] ?>>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <p class="ajout">Mot de passe: </p>
                                    <input type="text" name="mot_de_passe">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <p class="ajout">Status: </p>
                                    <select name="status_id" id="status" value=<?= $utilisateur["status_id"] ?>>
                                        <?php $estSelectionne = false ?>
                                        <?php foreach ($status as $status_utilisateur) : ?>
                                            <?php if ($status_utilisateur['id'] === $utilisateur["status_id"]) : ?>
                                                <option selected value=<?= $status_utilisateur['id'] ?>><?= $status_utilisateur['nom'] ?></option>
                                            <?php else : ?>
                                                <option value=<?= $status_utilisateur['id'] ?>><?= $status_utilisateur['nom'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <button class="creer" type="submit">Soumettre</button>
                                </label>
                            </div>
                            <a class="retour" href="liste-employe"><button class="bouton-orange">retour</button></a>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>
</body>

</html>