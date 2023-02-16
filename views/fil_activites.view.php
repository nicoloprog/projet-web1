<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pub G4 | Page administrateur</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/menu.css">
    <link rel="stylesheet" href="public/css/navbar.css">
    <link rel="stylesheet" href="public/css/principal.css">
</head>

<body>
    <main class="conteneur">
        <div class="admin-contenu">
            <button class="bouton-deconnexion">
                <a class="deconnexion" href="connexion">Déconnexion</a>
            </button>
            <section class="ajout-activite-section">
                <a href="liste-employes"><button class="bouton-employe">Liste d'employés</button></a>
                <a href="liste-menu"><button class="bouton-menu">Section plats</button></a>
            </section>
            <p>Bonjour <strong><?= $utilisateur["prenom"] ?> <?= $utilisateur["nom"] ?></strong></p>
        </div>
    </main>
</body>

</html>