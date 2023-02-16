<?php

require_once("bases/Controller.php");
require_once("utils/Upload.php");
require_once("models/Utilisateurs.php");
require_once("models/Plats.php");
require_once("models/Categories.php");
require_once("models/Status.php");
require_once("models/Infolettre.php");

class SiteController extends Controller
{

    /**
     * Affiche l'accueil
     *
     * @return void
     */
    public function index()
    {
        $modele_plats = new Plats();
        $plats_creations = $modele_plats->platParCategorie(4);
        include("views/index.view.php");
    }

    /**
     * Affiche le menu Principal
     *
     * @return void
     */
    public function menuPrincipal()
    {
        $modele_plats = new Plats();
        $entrees = $modele_plats->platParCategorie(1);
        $plats_principaux = $modele_plats->platParCategorie(2);
        $desserts = $modele_plats->platParCategorie(3);
        include("views/menu_principal.view.php");
    }

    /**
     * Affiche formulaire de connexion
     *
     * @return void
     */
    public function connexion()
    {
        unset($_SESSION["utilisateur_id"]);
        include("views/connexion.view.php");
    }

    /**
     * Affiche le formulaire de création de compte
     *
     * @return void
     */
    public function creerCompte()
    {
        if (empty($_SESSION["utilisateur_id"])) {
            header("location:connexion?interdit=true");
            exit();
        }
        $modele_status = new Status();
        $status = $modele_status->tout();
        include("views/compte.view.php");
    }

    /**
     * Affiche liste d'employés
     *
     * @return void
     */
    public function menu()
    {
        if (empty($_SESSION["utilisateur_id"])) {
            header("location:connexion?interdit=true");
            exit();
        }

        // Récupérer les publications de l'utilisateur
        $modele_plats = new Plats();
        $plats = $modele_plats->toutLesPlats();

        include("views/menu.view.php");
    }

    /**
     * Affiche liste d'employés
     *
     * @return void
     */
    public function employes()
    {
        if (empty($_SESSION["utilisateur_id"])) {
            header("location:connexion?interdit=true");
            exit();
        }

        $modele_status = new Status();
        $status = $modele_status->tout();

        // Récupérer les publications de l'utilisateur
        $modele_utilisateurs = new Utilisateurs();
        $utilisateurs = $modele_utilisateurs->toutLesEmployes();


        include("views/employes.view.php");
    }

    /**
     * Ajouter un compte a l'infolettre
     *
     * @return void
     */
    public function creerInfolettreSubmit()
    {
        // Validation des champs
        if (isset($_POST["nom"]) && isset($_POST["courriel"])) {
            // Récupération des informations
            $nom = $_POST["nom"];
            $courriel = $_POST["courriel"];

            // Récupérer les publications de l'utilisateur
            $modele_infolettre = new Infolettre();
            $categories = $modele_infolettre->creer($nom, $courriel);
            header("location:index?success=1");
            exit();
        }

        include("views/index.view.php");
    }

    /**
     * Affiche le formulaire de création de compte
     *
     * @return void
     */
    public function creerActivite()
    {
        if (empty($_SESSION["utilisateur_id"])) {
            header("location:connexion?interdit=true");
            exit();
        }
        // Récupérer les publications de l'utilisateur
        $modele_categories = new Categories();
        $categories = $modele_categories->tout();

        include("views/ajout_activites.view.php");
    }


    /**
     * Traite les informations soumises lors de la création de compte
     *
     * @return void
     */
    public function creerCompteSubmit()
    {
        // Empêcher le navigateur de visiter la route sans soumettre de formulaire
        if (empty($_POST)) {
            header("location:compte-creation");
            exit();
        }

        // Validation des champs
        if (empty($_POST["prenom"]) || empty($_POST["nom"]) || empty($_POST["courriel"]) || empty($_POST["mot_de_passe"]) || empty($_POST["status_id"])) {
            header("location:compte-creation?erreur=1");
            exit();
        }

        // Récupération des informations
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $courriel = $_POST["courriel"];
        $mot_de_passe = $_POST["mot_de_passe"];
        $status = $_POST["status_id"];


        // Instanciation d'un modèle Utilisateurs
        $modele_utilisateurs = new Utilisateurs();

        // Création d'un utilisateur (insertion dans la BDD)
        $succes = $modele_utilisateurs->creer($prenom, $nom, $courriel, $mot_de_passe, $status);

        // Redirection        
        if ($succes) {
            header("location:compte-creation?compte_creer=1");
            exit();
        }
        header("location:compte-creation?erreur=1");
        exit();
    }

    /**
     * Traite les informations de connexion
     *
     * @return void
     */
    public function connecterSubmit()
    {
        // Empêcher le navigateur de visiter la route sans soumettre de formulaire
        if (empty($_POST)) {
            header("location:connexion");
            exit();
        }

        // Validation des paramètres POST reçus
        if (empty($_POST["courriel"]) || empty($_POST["mot_de_passe"])) {
            header("location:connexion?erreur=1");
            exit();
        }

        // Instanciation d'un modèle Utilisateurs
        $modele_utilisateurs = new Utilisateurs();

        // Vérification des informations
        if (!$modele_utilisateurs->verifier($_POST["courriel"], $_POST["mot_de_passe"])) {
            // Redirection si utilisateur absent ou mot de passe erroné
            header("location:connexion?erreur=1");
            exit();
        }

        // Redirection
        header("location:fil-activites");
        exit();
    }

    /**
     * Affiche le fil d'activités
     * 
     * La page d'administration contient les informations sur l'utilisateur et toutes les activités associées à cet utilisateur
     *
     * @return void
     */
    public function afficherFilActivites()
    {
        if (empty($_SESSION["utilisateur_id"])) {
            header("location:connexion?interdit=true");
            exit();
        }

        $id = $_SESSION["utilisateur_id"];

        // Récupérer l'utilisateur connecté
        $modele_utilisateurs = new Utilisateurs();
        $utilisateur = $modele_utilisateurs->parId($id);

        // Récupérer les publications de l'utilisateur
        $modele_plats = new Plats();
        $plats = $modele_plats->toutLesPlats();

        // Récupérer les publications de l'utilisateur
        // $modele_activites = new Activites();
        // $activites = $modele_activites->toutParUtilisateur($id);
        if ($utilisateur['status_id'] === "1")
            include("views/fil_activites.view.php");
        else
            include("views/menu.view.php");
    }


    /**
     * Traite les informations d'ajout d'une activité
     *
     * @return void
     */
    public function creerActiviteSubmit()
    {
        // Empêcher le navigateur de visiter la route sans soumettre de formulaire
        if (empty($_POST)) {
            header("location:activite-submit");
            exit();
        }

        // Validation des champs
        if (empty($_POST["titre"]) || empty($_POST["categorie_id"]) || empty($_POST["description"]) || empty($_POST["prix"])) {
            header("location:activite-submit?erreur=1");
            exit();
        }

        $titre = $_POST["titre"];
        $categorie = $_POST["categorie_id"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        // Traitement du média
        $upload = new Upload("media");

        // Si un media a été fourni, il est déplacé et on récupère le chemin dans la variable $media
        // Sinon (aucun media fourni), on place "null" dans cette variable
        $media = $upload->estValide() ?
            $upload->placerDans("public/uploads") :
            null;

        // Récupérer l'id de l'utilisateur
        $id = $_SESSION["utilisateur_id"];

        // Instancier le modèle Activités
        $modele_activites = new Plats();
        $succes = $modele_activites->creer($titre, $categorie, $id, $description, $prix, $media);

        if (!$succes) {
            header("location:liste-menu?erreur=1");
            exit();
        }

        header("location:liste-menu?succes=1");
        exit();
    }

    /**
     * Traite les informations de modification d'une activité
     *
     * @return void
     */
    public function platModificationSubmit()
    {

        // Empêcher le navigateur de visiter la route sans soumettre de formulaire
        if (empty($_POST)) {
            header("location:plat-modification-submit");
            exit();
        }

        // Validation des champs
        if (empty($_POST["titre"]) || empty($_POST["categorie_id"]) || empty($_POST["description"]) || empty($_POST["prix"])) {
            header("location:plat-modification-submit?erreur=1");
            exit();
        }

        $id = $_GET["id"];
        $titre = $_POST["titre"];
        $categorie_id = $_POST["categorie_id"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        // Traitement du média
        $upload = new Upload("media");

        // Si un media a été fourni, il est déplacé et on récupère le chemin dans la variable $media
        // Sinon (aucun media fourni), on place "null" dans cette variable
        $media = $upload->estValide() ?
            $upload->placerDans("public/uploads") :
            null;

        // Instancier le modèle Plat
        $modele_plats = new Plats();
        $succes = $modele_plats->modifier_activite($id, $titre, $categorie_id, $description, $prix, $media);

        if (!$succes) {
            header("location:liste-menu?erreur=1");
            exit();
        }

        header("location:liste-menu?succes=1");
        exit();
    }

    /**
     * Traite les informations de modification d'une activité
     *
     * @return void
     */
    public function utilisateurModificationSubmit()
    {

        $id = $_GET["id"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $courriel = $_POST["courriel"];
        $mot_de_passe = $_POST["mot_de_passe"];
        $status_id = $_POST["status_id"];

        // Instancier le modèle Plat
        $modele_utilisateurs = new Utilisateurs();
        $succes = $modele_utilisateurs->modifier_utilisateur($id, $prenom, $nom, $courriel, $mot_de_passe, $status_id);

        header("location:liste-employes?succes=1");
        exit();
    }


    /**
     * Supprime un plat spécifique
     */
    function supprimer_une_activite()
    {

        $activite_id = $_GET["id"];

        $modele_activites = new Plats();

        $succes = $modele_activites->supprimer_activite($activite_id);

        if ($succes) {
            header("location:liste-menu?succes-supprimer=1");
            exit();
        }
        header("location:liste-menu.php?erreur=1");
    }

    /**
     * Supprime une activité spécifique
     */
    function supprimer_un_employe()
    {

        $utilisateur_id = $_GET["id"];

        $modele_utilisateurs = new utilisateurs();

        $succes = $modele_utilisateurs->supprimer_employe($utilisateur_id);

        if ($succes) {
            header("location:liste-employes?succes-supprimer=1");
            exit();
        }
        header("location:liste-employes.php?erreur=1");
    }

    /**
     * Supprime un plat spécifique
     */
    function modifier_un_plat()
    {
        if (empty($_SESSION["utilisateur_id"])) {
            header("location:connexion?interdit=true");
            exit();
        }

        $plat_id = $_GET["id"];
        $modele_plats = new Plats();
        $plat = $modele_plats->platParId($plat_id);

        $modele_categories = new Categories();
        $categories = $modele_categories->tout();
        include("views/modification.view.php");
    }

    /**
     * Supprime un plat spécifique
     */
    function modifier_un_utilisateur()
    {
        if (empty($_SESSION["utilisateur_id"])) {
            header("location:connexion?interdit=true");
            exit();
        }
        $utilisateur_id = $_GET["id"];
        $modele_utilisateurs = new Utilisateurs();
        $utilisateur = $modele_utilisateurs->ParId($utilisateur_id);

        $modele_status = new status();
        $status = $modele_status->tout();

        include("views/modification_utilisateurs.view.php");
    }

    function deconnexion()
    {
        // Vérification de la connexion de l'utilisateur et destruction de la session
        if ($_SESSION["utilisateur"]) {
            $_SESSION = [];
            session_destroy();

            header("location:index?deconnexion_reussie");
            exit();
        }

        header("location:index.php");
        exit();
    }
}
