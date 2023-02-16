<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synthèse | Connexion</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/principal.css">
</head>

<body class="connexion">
    <section class="login">
        <?php if (isset($_GET["deconnexion_reussie"])) : ?>
            <section class="alerte" role="alert">
                <div class="alert alert-info">
                    Vous êtes déconnectés! Merci!
                </div>
            </section>
        <?php endif; ?>

        <?php if (isset($_GET["interdit"])) : ?>
            <p class="erreur">Vous n'êtes pas autoriser. Veuillez vous connecter !</p>
        <?php endif; ?>

        <?php if (isset($_GET["erreur"])) : ?>
            <p class="erreur">Les informations de connexion sont incorrectes</p>
        <?php endif; ?>

        <form action="compte-connexion-submit" method="POST" class="connexion-form">
            <div class="connexion-contenu">
                <h1 class="connexion-titre">Connexion</h1>
                <p><strong>Courriel:</strong></p>
                <input type="text" name="courriel" class="input-courriel" required autofocus>
                <p><strong>Mot de passe:</strong></p>
                <input type="password" name="mot_de_passe" required>
                <button type="submit" style="width: 250px">Se connecter</button>
            </div>
        </form>
    </section>
</body>

</html>