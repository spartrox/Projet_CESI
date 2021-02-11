<?php
class FrontendController extends Controller
{
    private $modChamp = null;

    function Accueil()
    {
        $this->render("Accueil");
    }


    function Inscription()
    {
        // Permet d'appeler l'erreur et le message erreur par défaut il est faux
        $d["erreur"] = false;
        $d["msgErreur"] = false;
        
        // Permet de savoir si on a reçus un formulaire
        if (!empty($_POST)){ 

            // Appelle la fonction CheckFormulaire
            $d = $this->CheckFormulaire();
            
            //  si il n'y a pas d'erreurs, on passe à l'étape suivante 
            if($d["erreur"] == false){
                
                // Sert à charger le model
                $modmembre = $this->loadModel("membre");

                // Colonnes à utiliser de la BDD
                $colonnes = ["pseudo", "email", "password"];

                // Déterminer les données récupérées depuis le formulaire, qui seront utilisées
                $donnees = [ $_POST["pseudo"], $_POST["email"], $_POST["mdp"] ];

                //
                $modmembre->InsertAI($colonnes,$donnees);

                // Redirection sur la page Connexion
                $this->redirect("/frontend/Connexion");
            }
        }
        // Injection des variables dans la vue
        $this -> set($d);
        $this->render("Inscription");

    }
    
    function Connexion()
    {
        // Permet d'appeler l'erreur et le message erreur
        $d["erreur"] = false;
        $d["msgErreur"] = false;

        // Permet de savoir si on a reçus un formulaire
        if (!empty($_POST)){ 

            // Appelle la fonction CheckFormulaire
            $d = $this->CheckFormulaire();
            
            //  si il n'y a pas d'erreurs, on passe à l'étape suivante 
            if($d["erreur"] == false){
                
                // Sert à charger le model
                $modmembre = $this->loadModel("membre");

                // Colonnes à utiliser de la BDD
                $colonnes = ["pseudo", "email", "password"];

                // Déterminer les données récupérées depuis le formulaire, qui seront utilisées
                $donnees = [ $_POST["pseudo"], $_POST["email"], $_POST["mdp"] ];

                //
                $modmembre->InsertAI($colonnes,$donnees);

                // Redirection sur la page Connexion
                $this->redirect("/frontend/Connexion");

            // Redirection sur la page d'accueil
            //$this->redirect("/backend/Tableaudebord");
            }
        }
        // Injection des variables dans la vue
        $this -> set($d);
        $this->render("Connexion");

    }

    function  Contact()
    {
        $this->render("Contact");
    }

    // Cette fonction sera appelé dans la partie Inscription et sert à vérifier le pseudo pour savoir si il existe ou pas
    function CheckFormulaire(){

        $pseudo = $_POST["pseudo"];
        
        // Sert à charger le model
        $modmembre = $this->loadModel("membre");
        
        //Select table membre et vérification si le pseudo existe ou pas 
        $params = ["projection" => "member.pseudo","conditions" => "pseudo = '$pseudo'"];

        // Lance la requête
        $pseudoExiste = $modmembre->findFirst($params); 

        // Par défaut c'est a false
        $d["erreur"] = false;

        //différent de null
        if($pseudoExiste != null){

            // Si y il a un problème sa passe à true
            $d["erreur"] = true;
            $d["msgErreur"] = "Pseudo déja utilisé";

        } 
        return $d;
    }

    // Cette fonction sera appelé dans la partie Connexion et sert à vérifier l'email et le mdp pour la connexion
    function NewConnexion(){

        $pseudo = $_GET["pseudo"];
        $password = $_GET["password"];

        // Sert à charger le model
        $modmembre = $this->loadModel("membre");
        
        //Select table membre et vérification si le pseudo et le mdp existe ou pas 
        $params = ["projection" => "member.pseudo", "member.password", "conditions" => "pseudo = '$pseudo'", "password = '$password'"];

        // Lance la requête
        $newConnexion = $modmembre->findFirst($params); 

        // Par défaut c'est a false
        $d["erreur"] = false;

        //différent de null
        if($newConnexion == true){

            // Si y il a un problème sa passe à true
            $d["erreur"] = true;
            $d["msgErreur"] = "Votre identifiant ou votre mot de passe est incorrect ! ";

        } 
        return $d;
    }

}