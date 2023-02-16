<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synthèse | Création de compte</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/menu.css">
    <link rel="stylesheet" href="public/css/navbar.css">
    <link rel="stylesheet" href="public/css/principal.css">
</head>

<body class="creation-compte">
    <main class="conteneur">
        <div class="conteneur-compte">
            <section class="section-activites">
                <?php if (isset($_GET["erreur"])) : ?>
                    <p class="erreur">Veuillez remplir tous les champs</p>
                <?php endif; ?>

                <?php if (isset($_GET["compte_cree"])) : ?>
                    <p>Votre compte a été créé!</p>
                <?php endif; ?>
                <form action="compte-creation-submit" method="post" enctype="multipart/form-data">
                    <div class="contenu-ajout-employe">
                        <h6>Ajouter un employé</h6>
                        <label>
                            <p>Prénom:</p>
                            <input type="text" name="prenom">
                        </label>
                        <label>
                            <p>Nom:</p>
                            <input type="text" name="nom">
                        </label>
                        <label>
                            <p>Courriel:</p>
                            <input type="email" name="courriel">
                        </label>
                        <label>
                            <p>Mot de passe:</p>
                            <input type="password" name="mot_de_passe">
                        </label>
                        <label>
                            <p class="status">Status: </p>
                            <select name="status_id" id="status" style="width:150px">
                                <?php foreach ($status as $status) : ?>
                                    <option value=<?= $status['id'] ?>><?= $status['nom'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="creer" type="submit">Soumettre</button>
                        </label>
                    </div>
                </form>
                <a class="retour" href="liste-employes"><button class="bouton-orange">retour</button></a>
            </section>
        </div>
    </main>
</body>

</html>