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
        <h6>Liste d'employés</h6>
        <section class="compte">
            <a class="retour" href="fil-activites"><button>retour</button></a>
            <section class="ajout-activite-section">
                <a href="compte-creation"><button class="bouton-orange">Ajouter</button></a>
            </section>
        </section>
        <div class="titre-employe">
            <p style="flex-grow: 1; flex-basis: 50px">Actions</p>
            <p style="flex-grow: 1; flex-basis: 50px"></p>
            <p style="flex-grow: 2; flex-basis: 100px">Matricule</p>
            <p style="flex-grow: 3; flex-basis: 100px">Prénom</p>
            <p style="flex-grow: 3; flex-basis: 100px">Nom</p>
            <p style="flex-grow: 4; flex-basis: 250px">Courriel</p>
            <p style="flex-grow: 3; flex-basis: 100px">Status</p>
        </div>
        <hr>
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <div class="contenu-employe">
                <a class="supprime" style='flex-grow: 1; flex-basis: 50px' href="suppression2?id=<?= $utilisateur["id"] ?>">
                    🚫
                </a>
                <a class="modifie" style='flex-grow: 1; flex-basis: 50px' href="utilisateur-modification?id=<?= $utilisateur["id"] ?>">
                    ✎
                </a>
                <h4 style='flex-grow: 2; flex-basis: 100px'><?= $utilisateur["id"] ?></h4>
                <h4 style='flex-grow: 3; flex-basis: 100px'><?= $utilisateur["prenom"] ?></h4>
                <p style='flex-grow: 3; flex-basis: 100px'><?= $utilisateur["nom"] ?></p>
                <p style='flex-grow: 4; flex-basis: 250px'><?= $utilisateur["courriel"] ?></p>
                <p style='flex-grow: 3; flex-basis: 100px'><?= $utilisateur["status_nom"] ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    </main>
</body>

</html>