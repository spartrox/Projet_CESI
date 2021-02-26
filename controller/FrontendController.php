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
        // Permet d'appeler l'erreur et le message erreur, par défaut il est faux
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

                $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                
                // Déterminer les données récupérées depuis le formulaire, qui seront utilisées
                $donnees = [ $_POST["pseudo"], $_POST["email"], $mdp];

                // Insertion en autoIncrément dans la table 
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
            $d = $this->NewConnexion();
            
            //  si il n'y a pas d'erreurs, on passe à l'étape suivante 
            if($d["erreur"] == false){

            // Redirection sur la page d'accueil
            $this->redirect("/backend/Tableaudebord");

            }
        }
        // Injection des variables dans la vue
        $this -> set($d);
        $this->render("Connexion");

    }

    function  Contact()
    {
        /* Page: contact.php */
        $VotreAdresseMail="toto79230@hotmail.fr";//mettez ici votre adresse mail
        if(isset($_POST['envoyer'])) { // si le bouton "Envoyer" est appuyé
            //on vérifie que le champ mail est correctement rempli
            if(empty($_POST['mail'])) {
                echo "Le champ mail est vide";
            } else {
                //on vérifie que l'adresse est correcte
                if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['mail'])){
                    echo "L'adresse mail entrée est incorrecte";
                }else{
                    //on vérifie que le champ sujet est correctement rempli
                    if(empty($_POST['sujet'])) {
                        echo "Le champ sujet est vide";
                    }else{
                        //on vérifie que le champ message n'est pas vide
                        if(empty($_POST['message'])) {
                            echo "Le champ message est vide";
                        }else{
                            //tout est correctement renseigné, on envoi le mail
                            //on renseigne les entêtes de la fonction mail de PHP
                            $Entetes = "MIME-Version: 1.0\r\n";
                            $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                            $Entetes .= "From: Nom de votre site <".$_POST['mail'].">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
                            $Entetes .= "Reply-To: Nom de votre site <".$_POST['mail'].">\r\n";
                            //on prépare les champs:
                            $Mail=$_POST['mail']; 
                            $Sujet='=?UTF-8?B?'.base64_encode($_POST['sujet']).'?=';//Cet encodage (base64_encode) est fait pour permettre aux informations binaires d'être manipulées par les systèmes qui ne gèrent pas correctement les 8 bits (=?UTF-8?B? est une norme afin de transmettre correctement les caractères de la chaine)
                            $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");//htmlentities() converti tous les accents en entités HTML, ENT_QUOTES Convertit en + les guillemets doubles et les guillemets simples, en entités HTML
                            //en fin, on envoi le mail
                            if(mail($VotreAdresseMail,$Sujet,nl2br($Message),$Entetes)){//la fonction nl2br permet de conserver les sauts de ligne et la fonction base64_encode de conserver les accents dans le titre
                                echo "Le mail à été envoyé avec succès!";
                            } else {
                                echo "Une erreur est survenue, le mail n'a pas été envoyé";
                            }
                        }
                    }
                }
            }
        }

        $this->render("Contact");
    }

    // Cette fonction sera appelé dans la partie Inscription et sert à vérifier le pseudo pour savoir si il existe ou pas
    function CheckFormulaire(){

        $pseudo = $_POST["pseudo"];
        
        // Sert à charger le model
        $modmembre = $this->loadModel("membre");
        
        // Select table membre et vérification si le pseudo existe ou pas 
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

        $pseudo = $_POST["pseudo"];
        $password = $_POST["password"];

        // Sert à charger le model
        $modmembre = $this->loadModel("membre");
        
        //Select table membre et vérification si le pseudo et le mdp existe ou pas 
        $params = ["projection" => "member.*", "conditions" => "pseudo = '$pseudo' "];

        
        // Lance la requête
        $membre = $modmembre->findFirst($params); 



        // Par défaut c'est a false
        $d["erreur"] = false;

        // Si on n'a récupéré quelque chose on passe à l'étape suivante
        if($membre != null){

            // On vérifie que le pseudo et le MDP sont correcte
           if($pseudo == $membre ->pseudo && password_verify($password, $membre->password)){

            $_SESSION['id'] = $membre->id;
            $_SESSION['pseudo'] = $membre->pseudo;
            $_SESSION['type_account'] = $membre->type_account;


            } else{            
                // Si il y a un problème sa passe à true
                $d["erreur"] = true;
                $d["msgErreur"] = "Identifiants incorrect";
            }
        } else {
            // Si y il a un problème sa passe à true
            $d["erreur"] = true;
            $d["msgErreur"] = "Identifiants incorrect"; 
        }
        return $d;    
    }
}